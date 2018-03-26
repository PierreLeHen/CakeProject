<?php
echo $this->Html->css('menu');?>

<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'current','id'=>'current_home']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'moncompte'), ['class'=>'icone','id'=>'profil']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'devices'), ['class'=>'icone','id'=>'iot']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'seances'), ['class'=>'icone','id'=>'seance']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'icone','id'=>'classement']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'icone','id'=>'curent_badge']); ?>
</nav>




