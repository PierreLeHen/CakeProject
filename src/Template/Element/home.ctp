<?php
echo $this->Html->css('menu');?>

<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'current','id'=>'current_home']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'icone','id'=>'classement','data-toggle'=>'tooltip','title'=>'Classements']);?>
  <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'badges'), ['class'=>'icone','id'=>'badge','data-toggle'=>'tooltip','title'=>'Badges']); ?>
 
</nav>

