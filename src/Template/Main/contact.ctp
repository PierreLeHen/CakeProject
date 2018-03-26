
<?php echo $this->Html->css('home.css');
if ($this->Session->read('Auth.User')) {
    echo $this->element('home');
} else {
    echo $this->element('footer_out');
}
?>

        <h1>Contact</h1>
  <figure class="ligne"></figure>
        <p>Si vous avez le moindre problème avec la page, veuillez nous contacter !</p>
        <p><a href="mailto:csportsupport@csport.com"></a></p>
