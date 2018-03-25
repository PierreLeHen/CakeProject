<?php
echo $this->Html->css('home');?>

<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'icone','id'=>'home','data-toggle'=>'tooltip','title'=>'Deconnexion']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'moncompte'), ['class'=>'icone','id'=>'profil','data-toggle'=>'tooltip','title'=>'Mon Compte']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'devices'), ['class'=>'icone','id'=>'iot','data-toggle'=>'tooltip','title'=>'Mes Objets Connectés']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'seances'), ['class'=>'icone','id'=>'seance','data-toggle'=>'tooltip','title'=>'Mes Seances']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classsement'), ['class'=>'current','id'=>'current_classement','data-toggle'=>'tooltip','title'=>'Classements']); ?>
  <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classsement'), ['class'=>'icone','id'=>'badge','data-toggle'=>'tooltip','title'=>'Badges']); ?>
</nav>

