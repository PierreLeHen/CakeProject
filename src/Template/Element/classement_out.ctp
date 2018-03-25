<?php
echo $this->Html->css('home');?>

<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'icone','id'=>'home','data-toggle'=>'tooltip','title'=>'Accueil']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'current','id'=>'current_classement','data-toggle'=>'tooltip','title'=>'Classements']); ?>
</nav>

