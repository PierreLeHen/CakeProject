  <?php
    if ($this->Session->read('Auth.User')){
    echo $this->element('classement');}
else {
        echo $this->element('classement_out');}
    ?>
<div><h2>Classement général</h2>
    <h3>Classer par :
        <?php
        echo $this->Form->create(null);
        echo $this->Form->select('classement', ["Pas couru", "Biceps", "Pompes", "Abdos", "Triceps", "Rameur"], ['multiple' => false]);
              echo $this->Form->submit("Trier", array("class" => "btn pagebtn float-right"));
              echo $this->Form->end();
              ?>
    </h3>
    <table>
        <tr>
            <th>Rang</th>
            <th>ID Membre</th>
            <th>Nombre <?php echo $log_type ?></th>

        </tr>


        <?php $cnt = 1; ?>


        <?php foreach ($classement_array as $row) {

            echo "<tr><td>" . $cnt . "</td><td>" . $row['member_id'] . "</td><td>" . $row['log_value'] . "</td></tr>";
            $cnt++;


        }
        ?>
    </table>
</div>
