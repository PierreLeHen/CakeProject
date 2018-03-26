<?= $this->Html->css('login.css') ?>
<?= $this->element('home');?>
<body>
  <article class="col-md-7 col-lg-5 col-sm-10 col-xs-10 col-md-offset-2 col-lg-offset-1 col-xs-offset-1 col-sm-offset-1 " >
    <h1 >CAP - SPORT - INSCRIPTIONS</h1>
    <figure id="ligne_login"></figure>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> 
    <?php
    echo $this->Form->create('Inscription');
    echo $this->Form->control('email',['class'=>'login']);
    echo $this->Form->control('password',['type'=>'password','class'=>'login','label'=>'Mot de Passe (6 caracteres minimum)','div' => false]);
    echo $this->Form->control('password_match',['type'=>'password','class'=>'login','label'=>'Confirmez le Mot de Passe','div' => false]);
    echo $this->Form->button('S\'inscrire',['id'=>'submit'],array('formnovalidate' => true));
    echo $this->Form->end();
    ?>
    <?= $this->Flash->render() ?>
  </article>	

</body>

