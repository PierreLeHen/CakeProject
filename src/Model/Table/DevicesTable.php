<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 03/03/2018
 * Time: 22:31
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class DevicesTable extends Table
{

    /*
     * Getter pour récupérer tous les devices dans deux tableaux
     */
    public function getAllDevicesTrusted()
    {

        $all_trusted_devices = $this
            ->find()
            ->select(['id','member_id','serial','description','trusted'])
            ->where(['trusted =' => 1]);
        return $all_trusted_devices;
    }

    public function getAllDevicesNotTrusted()
    {

        $all_not_trusted_devices = $this
            ->find()
            ->select(['id','member_id','serial','description','trusted'])
            ->where(['trusted =' => 0]);
        return $all_not_trusted_devices;
    }


    public function supprimerobjet($IDobjet)
    {

        $entity_device = $this->get($IDobjet);
        return $this->delete($entity_device);


    }

    public function autoriserobjet($IDobjet)
    {
        $asking_device = $this->get($IDobjet);
        $asking_device->trusted = 1;
        return $this->save($asking_device);


    }



}