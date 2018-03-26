<div><h1>Badges</h1>
    <h3>Trier par :
        <?php
        echo $this->Form->create(null);
        echo $this->Form->select('classbadges', ["1ère séance enregistrée", "5ème séance enregistrée", "1er match enregistré", "Abdos en béton", "Marathonien"], ['multiple' => false]);
        echo $this->Form->submit("Trier", array("class" => "btn pagebtn float-right"));
        echo $this->Form->end();
        ?>
    </h3>
    <table>
        <tr>
            <th>ID Membre</th>

        </tr>

        <?php foreach ($classbadges_array as $row) {

            echo "<tr><td>" . $row['member_id'];
        }
        ?>
    </table>
</div>
