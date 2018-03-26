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

    if($badge == "badge1")
    {

        $new->sticker_id = 1;
    }

    if($badge == "badge2")
    {

        $new->sticker_id = 2;
    }



    $this->save($new);




}


}