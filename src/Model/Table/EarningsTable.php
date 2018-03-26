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

    public function setBadge($memberID, $badge)
    {


        $new = $this->newEntity();
        $new->date = Time::now('Europe/Paris');
        $new->member_id = $memberID;

        if ($badge == "badge1") {

            $new->sticker_id = 1;
        }

        if ($badge == "badge2") {

            $new->sticker_id = 2;
        }
        if ($badge == "badge3") {

            $new->sticker_id = 3;
        }
        if ($badge == "badge4") {

            $new->sticker_id = 4;
        }
        if ($badge == "badge5") {

            $new->sticker_id = 5;
        }
        $this->save($new);
    }

    public function getAllBadges()
    {

        $all_badges = $this
            ->find()
            ->select(['id_member']);

        return $all_badges;
    }

    public function getClass($badge)
    {

        $badges = $this->find();
        $badges->select(['member_id','badge'])
            ->group('member_id')
            ->where(['badge =' => $badge]);

        return $badges;

    }


}