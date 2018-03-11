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



    public function register(){
        $rajout=3;
        $this->loadModel('Contact');
        if($this->request->is('post'))//si on a envoyé un formulaire
        {
            $array= $this->request->getData();
            $rajout=$this->Players->add($array);
            $this->set('Contact',$rajout);
            if( $rajout==1)
            {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                $this->redirect(['action' => 'login']);
            }else if ($rajout==0){
                $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
            }
        }
    }




}