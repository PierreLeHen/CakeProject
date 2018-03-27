<?php echo $this->Html->css('home.css');

if ($this->Session->read('Auth.User')) {
    echo $this->element('badge');
} else {
    echo $this->element('badge_out');
}
?>


<div class="mycustomContainer">    
    <section id="bloco" class="col-md-8 col-lg-6 col-sm-10 col-xs-10  ">
        <div><h1>Badges</h1>
            <figure id="ligne"></figure>
            <h3>Trier par : </h3>
                <?php
                echo $this->Form->create(null);
                echo $this->Form->select('badges', ["1ère séance enregistrée", "5ème séance enregistrée", "1er match enregistré", "Relevé en chef !", "Super Sportif !"], ['multiple' => false]);
                echo $this->Form->submit("Actualiser", array("class" => "btn pagebtn float-right",'id'=>'submit'));
                echo $this->Form->end();
                ?>
           

            <?php if($badge == 1)
{
    echo "<p>1ère séance enregistrée</p><p>Ce badge s'obtient en enregistrant une séance !</p>";
}
            if($badge == 2)
            {
                echo "<p>5ème séance enregistrée</p><p>Ce badge s'obtient en enregistrant une 5ème séance !</p>";
            }
            if($badge == 3)
            {
                echo "<p>1er match enregistré</p><p>Ce badge s'obtient en enregistrant un match !</p>";
            }
            if($badge == 4)
            {
                echo "<p>Relevé en chef !</p><p>Ce badge s'obtient en réalisant en enregistrant un relevé !</p>";
            }
            if($badge == 5)
            {
                echo "<p>Super Sportif !</p><p>Ce badge s'obtient en enregistrant 5 relevés !</p>";
            }?>

            <?php foreach ($badges_array as $row) {

    $id = $row["member_id"];
    $tmp = "img_pp/$id.jpg";
    if ($user_id == $id) {
        echo $this->Html->image('user.png', array('width' => '50px'));
    }
    echo '<article class="tuile">
			<!-- IMAGE DE LA TUILE -->
	' . $this->Html->image($tmp, array('width' => '200', 'class' => 'imgtuile')) . '
			<div class="rect ">
				<!-- NOM DU JOUEUR DE LA TUILE-->
                <h2 class="joueur">ID : ' . $id . '</h2>

				<!-- Classement-->
				<p class="classement">' ?>  <?php if($badge == 1)
                {
                    echo $this->Html->image('award/cup1.png', array('width' => '50px'));
                }
    if($badge == 2)
    {
        echo $this->Html->image('award/cup2.png', array('width' => '50px'));
    }
    if($badge == 3)
    {
        echo $this->Html->image('award/cup3.png', array('width' => '50px'));

    }
    if($badge == 4)
    {
        echo $this->Html->image('award/ribon1.png', array('width' => '50px'));

    }
    if($badge == 5)
    {
        echo $this->Html->image('award/ribon2.png', array('width' => '50px'));
    }?> <?php echo '</p>
				<!-- ELO DU JOUEUR-->

			</div>
		</article>';




}
            ?>

        </div>
    </section>
</div>