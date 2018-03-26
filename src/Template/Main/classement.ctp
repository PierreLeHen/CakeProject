<?php echo $this->Html->css('home.css');
if ($this->Session->read('Auth.User')) {
    echo $this->element('classement');
} else {
    echo $this->element('classement_out');
}
?>

<section id="bloco" class="col-md-8 col-lg-6 col-sm-10 col-xs-10  ">
    <h1> Classement</h1>

    <!-- figure c'est la ligne sous le classement -->
    <figure id="ligne"></figure>
    <h3>Classer par :
        <?php
        echo $this->Form->create(null);
        echo $this->Form->select('classement', ["Pas couru", "Biceps", "Pompes", "Abdos", "Triceps", "Rameur"], ['multiple' => false]);
        echo $this->Form->submit("Actualiser", array("class" => "btn pagebtn float-right"));
        echo $this->Form->end();
        ?>
    </h3>
    <?php $cnt = 1;
    foreach ($classement_array as $row) {
        $id = $row["member_id"];
        $tmp = "img_pp/$id.jpg";
        if ($user_id == $id) {
            echo $this->Html->image('user.png', array('width' => '50px'));
        }
        echo '<article class="tuile">
			<!-- IMAGE DE LA TUILE -->
	' . $this->Html->image($tmp, array('width' => '200px', 'class' => 'imgtuile')) . '
			<div class="rect ">
				<!-- NOM DU JOUEUR DE LA TUILE-->
                <p class="joueur">ID : ' . $id . '</p>

				<!-- Classement-->
				<p class="classement">' . $cnt . '</p>
				<!-- ELO DU JOUEUR-->
				<div class="elo">Palmarès : ' . $row["log_value"] . '   ' . $log_type . ' </div>
			</div>
		</article>';

        $cnt++;

    }
    ?>
</section>




