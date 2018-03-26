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

class WorkoutsTable extends Table
{

    public function addWorkouts($date, $end_date, $sport, $description, $lieu, $member_id, $contest_id)
    {
        $new = $this->newEntity();
        $new->date = $date;
        $new->end_date = $end_date;
        $new->location_name = $lieu;
        $new->description = $description;
        $new->sport = $sport;
        $new->member_id = $member_id;
        $new->contest_id = $contest_id;
        $this->save($new);
    }


    public function getAllWorkouts($id)
    {

        $all_workouts = $this
            ->find()
            ->select(['id', 'date', 'end_date', 'location_name', 'description', 'sport', 'contest_id'])
            ->order(array("date" => "DESC"))
            ->where(['member_id =' => $id]);

        return $all_workouts;
    }

    public function getWorkoutStatus()
    {

    }

    public function SupprimerSeance($IDseance)
    {

        $entity_seance = $this->get($IDseance);
        return $this->delete($entity_seance);


    }

    public function getMemberId($id_workout)
    {

        $id_member = $this
            ->find()
            ->select(['member_id'])

            ->where(['id =' => $id_workout])->first();

        return $id_member->member_id;



    }

    public function getParametres($id_workout)
    {

        $workout_param = $this
            ->find()

            ->where(['id =' => $id_workout])->first();

        return $workout_param;



    }

    public function getMembers()
    {
        $all_members = $this
            ->find()
            ->select(['member_id'])
            ->distinct(['member_id']);

        return $all_members;

    }

    public function getNumberWorkouts($members_table)
    {

        $query = $this
            ->find()
            ->where(['member_id ='  => $members_table])->toArray();
        $number = count($query);

        return $number;

    }



}