<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 03/03/2018
 * Time: 22:31
 */

namespace App\Model\Table;

use Cake\ORM\Table;

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


}