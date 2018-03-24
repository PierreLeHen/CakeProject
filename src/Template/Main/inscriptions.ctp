<?= $this->element('menu');?>
<html>
    <head>
        <title>Inscription</title>
    </head>
    <body>
      <!-- This is my custom box that display the title on a page. You can set it inline. -->
            <div class="" id="loginForm">
                <?= $this->Flash->render() ?>
                <?php
                 echo $this->Form->create('Inscription');
                 echo $this->Form->control('email');
                 echo $this->Form->control('password');
                 echo $this->Form->control('password_match',['type'=>'password']);
                 echo $this->Form->button('> S\'inscrire <',array('formnovalidate' => true));
                 echo $this->Form->end();
                ?>
            </div>
        </div>
    </body>
</html>



