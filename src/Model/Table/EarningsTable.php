<?php
/**
 * Created by PhpStorm.
 * User: Adri
 * Date: 25/03/2018
 * Time: 20:45
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\I18n\Time;
use Cake\I18n\Date;

class EarningsTable extends Table
{

    public function addEarnings($date, $member_id, $sticker_id)
    {
        $new = $this->newEntity();
        $new->date = $date;
        $new->member_id = $member_id;
        $new->sticker_id = $sticker_id;
        $this->save($new);
    }


    public function getAllEarnings($id)
    {

        $all_earnings = $this
            ->find()
            ->select(['id', 'date', 'member_id', 'sticker_id'])
            ->order(array("date" => "DESC"))
            ->where(['member_id =' => $id]);

        return $all_earnings;
    }

    public function getMemberId($id_earning)
    {

        $id_member = $this
            ->find()
            ->select(['member_id'])

            ->where(['id =' => $id_earning])->first();

        return $id_member->member_id;



    }

    public function getParametres($id_earning)
    {

        $earning_param = $this
            ->find()

            ->where(['id =' => $id_earning])->first();

        return $earning_param;



    }


}