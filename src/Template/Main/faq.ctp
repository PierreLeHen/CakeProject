
<?php echo $this->Html->css('home.css');
if ($this->Session->read('Auth.User')) {
    echo $this->element('home');
} else {
    echo $this->element('footer_out');
}
?>
        <h1>FAQ</h1>
        <figure class="ligne"></figure>
        <p>Cette page sert à répondre à vos questions les plus communes concernant l'utilisation du site.</p>
        <ul>
            <li>Comment je fais pour réserver une séance ?<br>Il suffit de cliquer sur l'onglet "séance" et d'en créer une.</li>
            <li>Comment faire pour se déconnecter ? <br>Il suffit de cliquer sur le bouton "déconnexion".</li>
            <li>Pourquoi la vie ? <br> Parce que la vie c'est cool (comme dirait Waleed Mouhali !)</li>
            <li>Votre site internet est vraiment beau ! Comment en faire un aussi beau ? <br> Pour cela, il faut vous adresser à Grégoire Démogé !</li>
        </ul>