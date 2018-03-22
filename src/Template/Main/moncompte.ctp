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
    echo $this->Form->input('user_img', array('label' => 'Télécharger une image (.jpg, .jpeg. png)','type' => 'file'));
    echo $this->Form->Submit('Modifier la photo');
    echo $this->Form->end();
    echo $this->Form->postButton("Supprimer", ["controller" => "Main", "action" => "supprimerphotos/"]);
    ?>
</div>

