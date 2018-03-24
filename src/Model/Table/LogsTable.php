<?php
/**
 * Created by PhpStorm.
 * User: Adri
 * Date: 16/03/2018
 * Time: 11:03
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\I18n\Time;
use Cake\I18n\Date;

class LogsTable extends Table
{

    public function addLogs($log_type, $log_value, $workout_id, $member_id)
    {
        $new = $this->newEntity();
        $new->date = Time::now();
        $new->location_latitude = 0;
        $new->location_logitude = 0;
        $new->log_type = $log_type;
        $new->log_value = $log_value;
        $new->device_id = 0;
        $new->workout_id = $workout_id;
        $new->member_id = $member_id;
        $this->save($new);
    }


    public function getAllLogs()
    {

        $all_logs = $this
            ->find()
            ->select(['log_type', 'log_value']);

        return $all_logs;
    }

    public function SupprimerLog($IDlog)
    {

        $entity_log = $this->get($IDlog);
        return $this->delete($entity_log);

    }

    public function Supprimerleslogs($IDworkout)
    {

        return $this->deleteAll(['workout_id' => $IDworkout]);

    }

    public function getLogs($workoutid)
    {
        $all_logs = $this
            ->find()
            ->select(['id','log_type', 'log_value'])->where(['workout_id =' => $workoutid]);

        return $all_logs;
    }

    public function getClass($log_type)
    {

        $classement = $this->find();
            $classement->select(['member_id','log_value' => $classement->func()->SUM('log_value')])
            ->group('member_id')
            ->where(['log_type =' => $log_type])
            ->order(['log_value' => 'DESC']);

        return $classement;

    }

    public function getlogid($id_member,$log_type,$id_workout)
    {

        $log = $this->find();
        $log->select(['id'])
            ->where(['member_id =' => $id_member,'log_type =' => $log_type, 'workout_id = '=>$id_workout])->first();

        return $log;
    }

    public function changelogvalue($logid,$log_value)

    {

        $logtochange_array= $this->findById($logid)->toArray();
        $logtochange=$logtochange_array[0];
       $logtochange->log_value += $log_value;
        return $this->save($logtochange);

    }


}