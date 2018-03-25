<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 03/03/2018
 * Time: 22:31
 */

namespace App\Model\Table;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class MembersTable extends Table
{
    /*
     * Getter pour récupérer tous les membres dans un tableau
     */
    public function getAllEmail()
    {

        $all_members = $this
            ->find()
            ->select(['email']);
        return $all_members;
    }


// In a table class
    public function buildRules(RulesChecker $rules)
    {
// A single field.
        $rules->add($rules->isUnique(['email']));

// A list of fields
        $rules->add($rules->isUnique(
            ['username', 'account_id'],
            'This username & account_id combination has already been used.'
        ));
        return $rules;
    }
    public function validationDefault(Validator $validator)
    {
        $validator->add('password', 'length', ['rule' => ['lengthBetween', 6, 10,]]);
        $validator -> sameAs('password_match','password','Passwords not equal.');
        return $validator
            ->notEmpty('email', "Un email est nécessaire")
            ->notEmpty('password', 'Un mot de passe est nécessaire');
    }

    public function add($array) {
        $value=0;
        $member= $this->newEntity();//crée un objet vide
        $player= $this->patchEntity($member,$array);
        if ($this->save($player)) {
            $value=1;
            return $value;
        }else return $value ;
    }

    public function changermdp($resultatFormulaire, $player)
    {
        $currentplayer = $this->get($player);
        $currentplayer->password = $resultatFormulaire['password'];
        $this->save($currentplayer); //sauvegarde du nouveau mdp
    }

    public function imposermdp($mdp, $player)
    {
        $currentplayer = $this->get($player);
        $currentplayer->password = $mdp;
        $this->save($currentplayer); //sauvegarde du nouveau mdp
    }

    public function changePassword($member_id, $new_password)
    {
        $member_array=$this->findById($member_id)->toArray();
        $member= $member_array[0];

        $member->password=$new_password;
        return $this->save($member);
    }

}