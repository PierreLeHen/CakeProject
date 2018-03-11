<?php
namespace App\Controller;

use App\Controller\AppController;

class MainController extends AppController
{
    public function index()
    {

        $this->loadModel("Members");
        $m = $this->Members->find();
        $this->set("m", $m->toArray());

    }

    public function moncompte()
    {

        $this->loadModel("Members");
        $mail_array = $this->Members->getAllEmail();
        $this->set("mail_array", $mail_array);

    }

    public function devices()
    {
        $this->loadModel("Devices");

        //tableau des objets trusted
        $devices_trusted_array = $this->Devices->getAllDevicesTrusted();
        $this->set("devices_trusted_array", $devices_trusted_array);

        //tableau des objets non authorized
        $devices_not_trusted_array = $this->Devices->getAllDevicesNotTrusted();
        $this->set("devices_not_trusted_array", $devices_not_trusted_array);
    }

