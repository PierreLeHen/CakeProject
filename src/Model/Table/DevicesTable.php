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
    public function getAllDevicesTrusted($id)
    {

        $all_trusted_devices = $this
            ->find()
            ->where(['trusted =' => 1,'member_id =' => $id]);
        return $all_trusted_devices;
    }

    public function getAllDevicesNotTrusted($id)
    {

        $all_not_trusted_devices = $this
            ->find()
            ->select(['id','member_id','serial','description','trusted'])
            ->where(['trusted =' => 0,'member_id =' => $id]);
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

    public function addDevice($id_member, $id_device, $description)
    {

        $new = $this->newEntity();
        $new->member_id = $id_member;
        $new->serial = $id_device;
        $new->description = $description;
        $new->trusted = 0;

        $this->save($new);
    }

    public function checkAuthorization($serial_device, $id)
    {

        $check = $this
            ->find()
            ->select(['trusted'])
            ->where(['serial =' => $serial_device,'member_id =' => $id])->first();
        return $check->trusted;

     
        
        
    }



}