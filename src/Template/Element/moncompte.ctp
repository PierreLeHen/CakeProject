<?php
echo $this->Html->css('home');?>

<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'icone','id'=>'home']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'moncompte'), ['class'=>'current','id'=>'current_profil']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'devices'), ['class'=>'icone','id'=>'iot']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'seances'), ['class'=>'icone','id'=>'seance']); ?>
  <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classsement'), ['class'=>'icone','id'=>'classement']); ?>
</nav>




