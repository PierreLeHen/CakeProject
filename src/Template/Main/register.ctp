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