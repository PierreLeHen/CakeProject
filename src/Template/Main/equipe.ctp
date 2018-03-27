
<?php echo $this->Html->css('home.css');
if ($this->Session->read('Auth.User')) {
    echo $this->element('home');
} else {
    echo $this->element('footer_out');
}
?>  
        <h1>L'équipe</h1>
          <figure class="ligne"></figure>
        <p>Notre équipe est composée de 4 étudiants en école d'ingénieurs tous dans la majeure OCRES (Objets Connectés, Réseaux Et Services).</p>
        <p>Le but de ce projet web est de réaliser un site web de gestion d'activité sportive, l'objectif étant de rendre le sport plus attractif en nous mettant en relation avec nos amis à travers une interface simple et esthétique.</p>
        <p>Ainsi, nous avons au sein de l'équipe : </p>
        <table>
            <tr><td>Grégoire Démogé, "le PGM"</td>
                <td><?php echo $this->Html->image('jb3.jpg', array('width'=>'200px'))?></td></tr>
            <tr><td>Arnaud Juin De Faucal, "le Pro"</td>
                <td><?php  echo $this->Html->image('jb1.jpg', array('width'=>'200px'))?></td></tr>
            <tr><td>Pierre Lehen, "Pierrot le thug"</td>
                <td><?php  echo $this->Html->image('jb4.jpg', array('width'=>'200px'))?></td></tr>
            <tr><td>Adrien Marchand, "le mec sympa qui rédige cette page"</td>
                <td><?php  echo $this->Html->image('jb2.jpg', array('width'=>'200px'))?></td></tr>
        </table>
    
