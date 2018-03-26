<?php
echo $this->Html->css('menu');?>
<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'icone','id'=>'home','data-toggle'=>'tooltip','title'=>'Accueil']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'icone','id'=>'classement','data-toggle'=>'tooltip','title'=>'Classements']); ?>
  <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'badges'), ['class'=>'current','id'=>'current_badge','data-toggle'=>'tooltip','title'=>'Badge']); ?>
</nav>