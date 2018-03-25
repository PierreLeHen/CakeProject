<?= $this->element('moncompte');?>
<h1>Mon compte</h1>

<div>
    <?php
    if($user_img_ext == "none")
    {
        echo $this->Html->image('img_pp/default.jpg', array('width' => '200px'));
    }
    echo $this->Html->image('img_pp/'.$img.'.'.$user_img_ext, array('width' => '200px'));
    echo $mail;
    echo $this->Form->create(null, array('type' => 'file'));
    echo $this->Form->input('user_img', array('label' => 'Télécharger une image (.jpg, .jpeg, .png, .gif)','type' => 'file'));
    echo $this->Form->Submit('Modifier la photo');
    echo $this->Form->end();
    echo $this->Form->postButton("Supprimer", ["controller" => "Main", "action" => "supprimerphotos/"]);
    ?>

    <h2>Changer mon mot de passe</h2>

    <?php
    // https://getbootstrap.com/docs/4.0/components/forms/
    echo $this->Form->create();
    echo $this->Form->hidden('changepasswd', ['value' => 'changepasswd']);
    echo $this->Form->input("password", array("class" => "form-control", "placeholder" => "Nouveau mot de passe", "label" => "Mot de passe"));
    echo $this->Form->submit("Valider le nouveau mot de passe", array("class" => "btn pagebtn float-right"));
    echo $this->Form->end(); ?>


</div>


