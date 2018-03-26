<?= $this->element('moncompte');?>
<?= $this->Html->css('moncompte.css') ?>

<body class="mycustomContainer">
    <section id="bloco" class="col-md-8 col-lg-6 col-sm-10 col-xs-10  " >
        <h1>Mon compte</h1>
    <figure id="ligne"></figure>
          <div class="row">
                <div class="log-lg-1">  
        <h2><?php echo $mail;?></h2>
          
            <?php
            if($user_img_ext == "none")
            {
                echo $this->Html->image('img_pp/default.jpg', array('width' => '200px'));
            }
            echo $this->Html->image('img_pp/'.$img.'.'.$user_img_ext, array('width' => '200px'));
            echo $this->Form->create(null, array('type' => 'file'));
            echo $this->Form->input('user_img', array('label' => 'Télécharger une image (.jpg, .jpeg, .png, .gif)','type' => 'file'));
            echo $this->Form->Submit('Modifier la photo',array('id'=>'submit'));
            echo $this->Form->end();
            echo $this->Form->postButton("Supprimer", ["controller" => "Main", "action" => "supprimerphotos/"]);
            ?>
            </div>
            <h2>Changer mon mot de passe</h2>

            <?php
            // https://getbootstrap.com/docs/4.0/components/forms/
            echo $this->Form->create();
            echo $this->Form->hidden('changepasswd', ['value' => 'changepasswd']);
            echo $this->Form->input("password", array("class" => "form-control", "placeholder" => "Nouveau mot de passe", "label" => "Mot de passe"));
            echo $this->Form->submit("Valider le nouveau mot de passe", array("class" => "btn pagebtn float-right",'id'=>'submit'));
            echo $this->Form->end(); ?>


        </div>
    </section></body>


