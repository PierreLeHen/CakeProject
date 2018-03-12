<?php
/**
 * Created by PhpStorm.
 * User: Adri
 * Date: 12/03/2018
 * Time: 17:08
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\I18n\Time;
use Cake\I18n\Date;

class WorkoutsTable extends Table {

    public function addWorkouts($date, $end_date,$sport,$description,$lieu,$member_id){
        $new = $this -> newEntity();
        $new->date = $date;
        $new->end_date = $end_date;
        $new->location_name = $lieu;
        $new->description = $description;
        $new->sport = $sport;
        $new->member_id = $member_id;
        $this->save($new);
    }


    public function getAllWorkouts()
    {

        $all_workouts = $this
            ->find()
            ->select(['date','end_date','location_name','description','sport']);

        return $all_workouts;
    }


}