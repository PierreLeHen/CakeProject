<?= $this->Html->css('login.css') ?>
<?= $this->element('home');?>
<body>
  <article class="col-md-7 col-lg-5 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-1 col-xs-offset-1 col-sm-offset-1 " >
    <h1 >CAP - SPORT - INSCRIPTIONS</h1>
    <figure id="ligne_login"></figure>
      <p>Bienvenue sur Cap-Sport ! Le site web pour enregistrer ses séances sportives par excellence ! Connectez-vous pour
          commencer</p>
      <?php
    echo $this->Form->create('Inscription');
    echo $this->Form->control('email',['class'=>'login']);
    echo $this->Form->control('password',['type'=>'password','class'=>'login','label'=>'Mot de Passe (6 caractères minimum)','div' => false]);
    echo $this->Form->control('password_match',['type'=>'password','class'=>'login','label'=>'Confirmez le Mot de Passe','div' => false]);
    echo $this->Form->button('S\'inscrire',['id'=>'submit'],array('formnovalidate' => true));
    echo $this->Form->end();
    ?>
    <?= $this->Flash->render() ?>
  </article>	

</body>

