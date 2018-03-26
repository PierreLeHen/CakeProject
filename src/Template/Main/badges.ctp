<section id="bloco" class="col-md-8 col-lg-6 col-sm-10 col-xs-10  ">
<div><h1>Badges</h1>
    <h3>Trier par :
        <?php
        echo $this->Form->create(null);
        echo $this->Form->select('badges', ["1ère séance enregistrée", "5ème séance enregistrée", "1er match enregistré", "Abdos en béton", "Marathonien"], ['multiple' => false]);
        echo $this->Form->submit("Trier", array("class" => "btn pagebtn float-right"));
        echo $this->Form->end();
        ?>
    </h3>
    <?php if($badge == 1)
    {
        echo $this->Html->image('award/cup1.png', array('width' => '50px'));
        echo "<p>1ère séance enregistrée</p><p>Ce badge s'obtient en enregistrant une séance !</p>";
    }
    if($badge == 2)
    {
        echo $this->Html->image('award/cup2.png', array('width' => '50px'));
        echo "<p>5ème séance enregistrée</p><p>Ce badge s'obtient en enregistrant une 5ème séance !</p>";
    }
    if($badge == 3)
    {
        echo $this->Html->image('award/cup3.png', array('width' => '50px'));
        echo "<p>1er match enregistré</p><p>Ce badge s'obtient en enregistrant un match !</p>";
    }
    if($badge == 4)
    {
        echo $this->Html->image('award/ribon1.png', array('width' => '50px'));
        echo "<p>Abdos en béton</p><p>Ce badge s'obtient en réalisant 1000 abdominaux !</p>";
    }
    if($badge == 5)
    {
        echo $this->Html->image('award/ribon2.png', array('width' => '50px'));
        echo "<p>Marathonien</p><p>Ce badge s'obtient en réalisant 42000 pas !</p>";
    }?>
    <table>
        <tr>
            <th>ID Membre</th>

        </tr>

        <?php foreach ($badges_array as $row) {

            echo "<tr><td>" . $row['member_id'];
        }
        ?>
    </table>
</div>
</section>