
<?php echo $this->Html->css('home.css');
if ($this->Session->read('Auth.User')) {
    echo $this->element('home');
} else {
    echo $this->element('footer_out');
}
?>
    <body>
           

        <h1>Mentions légales</h1>
           <figure class="ligne"></figure>
        <p>Vous êtes en train de visiter le Site Internet de CSPORT. Les mentions légales qui suivent s’appliquent à tout internaute visitant ce site.</p>
        <h2>Propriété intellectuelle</h2>
        <p>L’ensemble du contenu de ce Site (textes, éléments graphiques, logiciels, etc.) est la propriété exclusive de CSPORT ou de ses prestataires techniques ou fait l’objet d’une autorisation d’utilisation et est protégé au titre de la législation applicable en matière de droit d’auteur.</p>
          <?= $this->Html->image('ece.jpg');?>

    </body>
</html>