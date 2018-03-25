<<<<<<< HEAD
<?= $this->element('home');?>
<?php
echo $this->Html->css('login.css');?>
<body>
   <article class="col-md-7 col-lg-5 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-1 col-xs-offset-1 col-sm-offset-1 " >
      <h1 >CAP - SPORT</h1>
      <hr color="white" size="15" width="75%">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      <?php
      echo $this->Html->css('login',['class'=>'myform']); 
      echo $this->Form->create('Inscription',['label'=>'','div' => false]);
      echo $this->Form->control('email',['class'=>'login','placeholder'=>'login','label'=>'','div' => false]); 
      echo $this->Form->control('password',['class'=>'login','label'=>'','div' => false]); 
      echo $this->Form->button('Se connecter',['id'=>'submit']); 
      echo $this->Form->end();?>
      <?= $this->Flash->render() ?>
      <div id="preform">
         <a id="gotoinscription"
            <?php echo $this->Html->link("Vous n'êtes pas inscrits ? Inscrivez vous ! ",['controller' => 'Main', 'action'=> 'inscriptions']); ?>
            </a>
         <a id="gotoinscription"
            <?php echo $this->Html->link("Mot de Passe oublié ?",['controller' => 'Main', 'action'=> 'inscriptions']); ?>
            </a>
      </div>
   </article>	
</body>

=======
<?= $this->element('home'); ?>
<body>
<article class="col-md-7 col-lg-5 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-1 col-xs-offset-1 col-sm-offset-1 ">
    <h1> CAP-SPORT</h1>
    <hr color="white" size="10" width="75%">
    <p>Bienvenue sur Cap-Sport ! Le site web pour enregistrer ses séances sportives par excellence ! Connectez-vous pour
        commencer
        <br>Cap-Sport est un projet web réalisé par des étudiants de l'ECE Paris pour leur cours de technologie web.</p>
    <?php
    echo $this->Html->css('login', ['class' => 'myform']);;
    echo $this->Form->create('Inscription', ['label' => '', 'div' => false]);
    echo $this->Form->control('email', ['class' => 'login', 'placeholder' => 'login', 'label' => '', 'div' => false]);
    echo $this->Form->control('password', ['class' => 'login', 'label' => '', 'div' => false]);
    echo $this->Form->button('Se connecter', ['id' => 'submit']);
    echo $this->Form->end(); ?>
    <?= $this->Flash->render() ?>
</article>

</body>
>>>>>>> a2c247ab477e6038bacdaf0cede6b3c81a37abd3
