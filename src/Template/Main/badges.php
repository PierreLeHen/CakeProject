<?= $this->element('earnings');?>
<div><h2>Badges</h2>
    <h3>Classer par :
        <?php
        echo $this->Form->create(null);
        echo $this->Form->select('badges', ["1ère séance enregistrée", "5ème séance enregistrée", "1er match enregistré", "Abdos en béton", "Marathonien"], ['multiple' => false]);
        echo $this->Form->submit("Trier", array("class" => "btn pagebtn float-right"));
        echo $this->Form->end();
        ?>
    </h3>
    <table>
        <tr>
            <th>Badge</th>
            <th>Membre</th>

        </tr>



        <?php foreach ($badges_array as $row) {

            echo "<tr><td>" .  $row['member_id'] . "</td><td>" . $row[''] . "</td></tr>";
            $cnt++;

        }
        ?>
    </table>
</div>
