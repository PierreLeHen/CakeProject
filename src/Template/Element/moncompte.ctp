<?php
echo $this->Html->css('menu');?>


<nav>
 <!-- barre de navigation à droite -->
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'logout'), ['class'=>'icone','id'=>'home','data-toggle'=>'tooltip','title'=>'Deconnexion']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'moncompte'), ['class'=>'current','id'=>'current_profil','data-toggle'=>'tooltip','title'=>'Mon Compte']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'devices'), ['class'=>'icone','id'=>'iot','data-toggle'=>'tooltip','title'=>'Mes Objets Connectés']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'seances'), ['class'=>'icone','id'=>'seance','data-toggle'=>'tooltip','title'=>'Mes Seances']); ?>
 <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'icone','id'=>'classement','data-toggle'=>'tooltip','title'=>'Classements']); ?>
  <?php echo $this->Html->link("", array('controller' => 'Main', 'action'=> 'classement'), ['class'=>'icone','id'=>'badge','data-toggle'=>'tooltip','title'=>'Badges']); ?>
</nav>
