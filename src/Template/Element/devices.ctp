<?php
echo $this->Html->css('home');?>

<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'icone','id'=>'home']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'moncompte'), ['class'=>'icone','id'=>'profil']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'devices'), ['class'=>'current','id'=>'current_iot']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'seances'), ['class'=>'icone','id'=>'seance']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'icone','id'=>'classement']); ?>
</nav>




