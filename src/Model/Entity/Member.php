<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Member
 extends Entity{
    

    // Make all fields mass assignable for now.
    protected $_accessible = [
        '*' => true,
        'id'=>false];
    
    protected function _setPassword($password)
    {
       if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
    

}

