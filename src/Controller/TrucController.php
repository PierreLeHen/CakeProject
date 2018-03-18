<?php
namespace App\Controller;

use App\Controller\AppController;

class TrucController extends AppController
{
    public function index()
    {

        $this->loadModel("Members");
        $m = $this->Members->find();
        $this->set("m", $m->toArray());

    }

    public function machin()
    {

        $this->loadModel("Members");
        $m = $this->Members->find();
        $this->set("m", $m->toArray());

    }




}