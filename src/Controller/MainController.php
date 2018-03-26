<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Error\Debugger;
use Cake\Routing\Router;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class MainController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        // $this->loadComponent('Main');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('register', 'inscriptions', 'activate', 'mailCheck');
    }

    public function index()
    {

        $this->loadModel("Members");
        $m = $this->Members->find();
        $this->set("m", $m->toArray());
    }

    public function moncompte()
    {
        $this->loadModel("Members");
        $mail_user = $this->Auth->user('email');
        $user_id = $this->Auth->user('id');
        $this->set('mail', $mail_user);
        $this->set('img', $user_id);
        $dos = new Folder(WWW_ROOT . 'img/img_pp');

        if ($this->request->is('post'))//si on a envoyé un formulaire
        {
            if (isset($this->request->data['changepasswd'])) {
                $new_password = $this->request->data('password');
                if ($this->Members->changePassword($user_id, $new_password)) {
                    $this->Flash->success(__('Password changed successfully !'));
                    return $this->redirect(['action' => 'moncompte']);
                } else {
                    $this->Flash->error(__('Impossible to change the password !'));
                }
            } else {
                $ext = strtolower(pathinfo($this->request->data['user_img']['name'], PATHINFO_EXTENSION));
                if (!empty($this->request->data['user_img']['tmp_name']) && in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                    $files = $dos->find($this->Auth->user("id") . '\.(?:jpg|jpeg|png|gif)$');
                    if (!empty($files)) {
                        foreach ($files as $file) {
                            $file = new File($dos->pwd() . DS . $file);
                            $file->delete();
                            $file->close();
                            $this->Flash->success(__("Picture changed successfully"));
                        }
                    }
                    move_uploaded_file($this->request->data['user_img']['tmp_name'], 'img/img_pp' . DS . $this->Auth->user("id") . '.' . $ext);
                } else {
                    $this->Flash->error(__('Impossible to change the picture !'));
                }
            }
        }
        $files = $dos->find($this->Auth->user("id") . '\.(?:jpg|jpeg|png|gif)$');
        if (empty($files)) {
            $user_img_ext = "none";
        } else {
            $user_img_ext = strtolower(pathinfo($files[0], PATHINFO_EXTENSION));
        }
        $this->set("user_img_ext", $user_img_ext);
        #$mail_array = $this->Members->getAllEmail();
        #$this->set("mail_array", $mail_array);

    }


    public function supprimerphotos()
    {
        $dos = new Folder(WWW_ROOT . 'img/img_pp');
        $files = $dos->find($this->Auth->user("id") . '\.(?:jpg|jpeg|png|gif)$');
        foreach ($files as $file) {
            $file = new File($dos->pwd() . DS . $file);
            $file->delete();
            $file->close();
        }
        return $this->redirect(['controller' => 'Main', 'action' => 'moncompte']);
    }

    ///Affichage des Objets Connectes
    public function devices()
    {
        $this->loadModel("Devices");

        //tableau des objets trusted
        $devices_trusted_array = $this->Devices->getAllDevicesTrusted($this->Auth->user('id'));
        $this->set("devices_trusted_array", $devices_trusted_array);

        //tableau des objets non authorized
        $devices_not_trusted_array = $this->Devices->getAllDevicesNotTrusted($this->Auth->user('id'));
        $this->set("devices_not_trusted_array", $devices_not_trusted_array);
    }

    public function SupprimerObjet($IDobjet)
    {
        $this->loadModel("Devices");
        $this->Devices->supprimerobjet($IDobjet);
        return $this->redirect(['controller' => 'Main', 'action' => 'devices']);


    }

    public function SupprimerSeance($IDseance)
    {
        $this->loadModel("Workouts");
        $this->loadModel("Logs");
        $this->Logs->supprimerleslogs($IDseance);
        $this->Workouts->supprimerseance($IDseance);

        return $this->redirect(['controller' => 'Main', 'action' => 'seances']);

    }

    public function SupprimerLog($IDlog)
    {
        $this->loadModel("Logs");
        $this->Logs->supprimerlog($IDlog);
        return $this->redirect(['controller' => 'Main', 'action' => 'seances']);

    }

    public function AutoriserObjet($IDobjet)
    {
        $this->loadModel("Devices");
        $this->Devices->autoriserobjet($IDobjet);
        return $this->redirect(['controller' => 'Main', 'action' => 'devices']);

    }

    public function register()
    {
        if ($this->request->is('post')) {                   ///On verifie que la méthode POST est bien recu
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);                ///On authentifie l'User pour cette session
                return $this->redirect($this->Auth->redirectUrl());             ///On le renvoie vers la page principale
            }
            $this->Flash->error(__('Mot de passe ou adresse mail incorrecte'));
        }
    }

    ///Création d'un nouvel utilisateur
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
        
        
        
        
        
         if($user->errors()){
                $error_msg = [];
                foreach( $user->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]    =   $error;
                        }
                    }else{
                        $error_msg[]    =   $errors;
                    }
                }

                if(!empty($error_msg)){
                    $this->Flash->error(
                        __("Please fix the following error(s):".implode("\n \r", $error_msg))
                    );
                }
       
    }
    }
    ///Deconnexion
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    public function inscriptions()
    {
        $rajout = 3;
        $this->loadModel('Members');
        if ($this->request->is('post'))//si on a envoyé un formulaire
        {
            $array = $this->request->getData();
            $rajout = $this->Members->add($array);
            $this->set('members', $rajout);
            if ($rajout == 1) {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                $this->redirect(['action' => 'register']);
            } else if ($rajout == 0) {
                $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
            }
        }


    }

    public function classement()
    {
        $this->loadModel("Logs");

        $log_type = "Pas couru";
        $classement_array = $this->Logs->getClass($log_type);

        if ($this->request->is("post")) {
            $member_id = $this->Auth->user('id');

            if ($this->request->data('classement') == 0)
                $log_type = "Pas couru";

            if ($this->request->data('classement') == 1)
                $log_type = "Biceps";

            if ($this->request->data('classement') == 2)
                $log_type = "Pompes";

            if ($this->request->data('classement') == 3)
                $log_type = "Abdos";

            if ($this->request->data('classement') == 4)
                $log_type = "Triceps";

            if ($this->request->data('classement') == 5)
                $log_type = "Rameur";
        
            $user_id = $this->Auth->user('id');
            $classement_array = $this->Logs->getClass($log_type);
            $this->set("classement_array", $classement_array);
            $this->set("log_type", $log_type);
             $this->set("user_id", $user_idw);
        }
        $this->set("classement_array", $classement_array);
        $this->set("log_type", $log_type);


    }

    public function seances()
    {
        $this->loadModel("Workouts");
        $this->loadModel("Logs");
        $workouts_array = $this->Workouts->getAllWorkouts($this->Auth->user('id'));
        $this->set("workouts_array", $workouts_array);
        $list = [];
        foreach ($workouts_array as $idw => $work) {
            $seanceLogs = $this->Logs->getLogs($work->id);
            $list[$idw] = ['workout' => $work, 'logs' => $seanceLogs];
        }
        $this->set("workouts_array", $list);

        $new = $this->Workouts->newEntity();
        if ($this->request->is("post")) {
            $time = \Cake\I18n\Time::now('Europe/Paris');
            $date = $time::create($this->request->data['date']['year'], $this->request->data['date']['month'], $this->request->data['date']['day'], $this->request->data['date']['hour'], $this->request->data['date']['minute']);
            $end_date = $time::create($this->request->data['end_date']['year'], $this->request->data['end_date']['month'], $this->request->data['end_date']['day'], $this->request->data['end_date']['hour'], $this->request->data['end_date']['minute']);
            $lieu = $this->request->data("location_name");
            $member_id = $this->Auth->user('id');

            if ($this->request->data('sport') == 0)
                $sport = "Pas couru";

            if ($this->request->data('sport') == 1)
                $sport = "Biceps";

            if ($this->request->data('sport') == 2)
                $sport = "Pompes";

            if ($this->request->data('sport') == 3)
                $sport = "Abdos";

            if ($this->request->data('sport') == 4)
                $sport = "Triceps";

            if ($this->request->data('sport') == 5)
                $sport = "Rameur";

            $description = $this->request->data('description');
            $contest_id = $this->request->data('contest');
            $this->Workouts->addWorkouts($date, $end_date, $sport, $description, $lieu, $member_id, $contest_id);
            $this->badges();

            $this->redirect(['controller' => 'Main', 'action' => 'seances']);


        }

        $this->set("new", $new);
    }

    public function addLog($workout_id)
    {
        $this->loadModel("Logs");

        $new = $this->Logs->newEntity();
        if ($this->request->is("post")) {
            $member_id = $this->Auth->user('id');

            if ($this->request->data('log_type') == 0)
                $log_type = "Pas couru";

            if ($this->request->data('log_type') == 1)
                $log_type = "Biceps";

            if ($this->request->data('log_type') == 2)
                $log_type = "Pompes";

            if ($this->request->data('log_type') == 3)
                $log_type = "Abdos";

            if ($this->request->data('log_type') == 4)
                $log_type = "Triceps";

            if ($this->request->data('log_type') == 5)
                $log_type = "Rameur";


            $log_value = $this->request->data('log_value');

            $this->Logs->addLogs($log_type, $log_value, $workout_id, $member_id);

            $this->set("new", $new);
        }
        $this->redirect(['controller' => 'Main', 'action' => 'seances']);
    }

    public function addEarning()
    {


    }

    public function badges()
    {

        $this->loadModel("Earnings");
        $this->loadModel("Logs");
        $this->loadModel("Workouts");


        $count_list = [];

        $list_members = $this->Workouts->getMembers();
        $this->set("members_array", $list_members);




        foreach ($list_members as $member) {

            $count = $this->Workouts->getNumberWorkouts($member->member_id);



            if($count<5 && $count>0)
            {

                $this->Earnings->setBadge($member->member_id, "badge1");
                echo("coucou1"); echo($count);


            }
            if($count>4)
            {

                $this->Earnings->setBadge($member->member_id, "badge2");
                echo("coucou2"); echo($count);




            }





        }




    }

    public function newDevice($id_member, $id_device, $description)
    {


        $this->loadModel("Devices");
        $this->Devices->addDevice($id_member, $id_device, $description);
        return $this->redirect(['controller' => 'Main', 'action' => 'devices']);
    }

    public function getParam($serial_device, $id_workout)
    {

        $this->loadModel("Devices");
        $this->loadModel("Workouts");
        $this->viewBuilder()->className('Json');
        $getidmember = $this->Workouts->getMemberId($id_workout);
        $check = $this->Devices->checkAuthorization($serial_device, $getidmember);
        if ($check == 1) {

            $Param = $this->Workouts->getParametres($id_workout);
            $this->set(array(
                'Param' => $Param, '_serialize' => array('Param')


            ));


        }
        if ($check == 0) {


        }


    }
        public function contact()
    {

    }
    public function mentions()
    {

    }
    public function equipe()
    {

    }
    public function faq()
    {

    }
     public function git()
    {

    }

    public function AddLogVal($serial_device, $id_workout, $id_member, $log_type, $log_value)
    {

        $this->loadModel("Devices");

        $this->loadModel("Logs");

        $check = $this->Devices->checkAuthorization($serial_device, $id_member);

        if ($check == 1) {

            $this->Logs->newlog($id_member, $log_type, $id_workout, $log_value, $serial_device);

            return $this->redirect(['controller' => 'Main', 'action' => 'seances']);

        }


    }



    /**
     * Activate method
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function mailCheck(){
    $user = $this->Users->newEntity();
    try {
      if($this->request->is('post')) {
        $uniquecode = substr(md5(microtime()),0,10); //generate random string
        $randomKey = substr(md5(microtime()),0,10);
            $this->request->data['otp'] = $uniquecode;
            $getUserEmail = $this->Request->data['email'];

            $user = $this->Users->patchEntity($user,$this->request->data);
            if($this->Users->save($user)){
              $bodyEmail = "You have successfully registered.";
              $bodyEmail .= "To active account please click on below link";
              $aLink = Router::url(array("controller"=>"users","action"=>"activate", $uniquecode, $randomKey),true);
              $bodyEmail .= '<p><br><br><a style="width:50%;color:#fff;text-decoration:none;background:#333;display:block;padding:10px;text-align:center;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;margin:10px auto " href="'.$aLink.'"> Please verify your email address </a></p>';
               if($this->Main->sendEmail(['to'=>$getUserEmail,'subject'=>'Registration Complete','title'=>'Registration Complete','body'=>$bodyEmail]))
               {
                  $this->Flash->success(__('Your account has been registered. please check your email address to activate your account'));
              return $this->redirect(['action' => 'mailCheck']);
                }else{
                  $this->Flash->error(__('Registration not completed. Please try again.'));
                  return $this->redirect(['action' => 'index']);
                }
            }else{
              $this->Flash->error(__('Unable to register your account.'));
            }
       }
    }catch (\Exception $e) {
       $this->Flash->error($e->getMessage());
       return $this->redirect(['action' => 'mailCheck']);
    }
    $this->set('user',$user);
    $this->set('page_title',__('Registeration'));
    }
                            ///Acrivation via le mail
    public function activate($getUniCode='', $randomKey='')
    {
       if(trim($getUniCode)!="" && $randomKey!="") {
         $getUniCode = filter_var($getUniCode, FILTER_SANITIZE_STRING);
         $getUser = $this->Users->find('all',['conditions'=> ['otp'=> $getUniCode,'status'=> 0]])->first();
         if($getUser) {
           $getUserId = $getUser->id;
           $updateActivate  = $this->Users->updateAll(['status'=> 1, 'otp'=> ''], ['id'=> $getUserId]);
           $this->Flash->success(__('Your account has been Activated successfully. please login'));
           return $this->redirect(['action' => 'mailCheck']);
         }
       }

    }
    */
}


