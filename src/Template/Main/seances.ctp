<h1>Séances</h1> <h2><?php echo \Cake\I18n\Time::now() ?></h2>

<details>
    <Summary>Commencer une nouvelle séance</Summary>
    <?php
    // https://getbootstrap.com/docs/4.0/components/forms/
    echo $this->Form->create($new);
    echo $this->Form->input("description", array("class" => "form-control", "placeholder" => "Description", "label" => "Description"));
    echo $this->Form->select('sport', ["Pas couru", "Biceps", "Pompes", "Abdos", "Triceps", "Rameur"], ['multiple' => false, 'class' => 'form-control']);
    echo $this->Form->input("location_name", array("class" => "form-control", "placeholder" => "Entrez un lieu", "label" => "Lieu"));
    echo $this->Form->input("date", array("class" => "form-control", "type" => "datetime", "label" => "Début"));
    echo $this->Form->input("end_date", array("class" => "form-control", "type" => "datetime", "label" => "Fin"));
    echo $this->Form->submit("Ajouter séance", array("class" => "btn pagebtn float-right", "controller" => "Main", "action" => "ajouterseance/"));
    echo $this->Form->end();

    if (isset($error)) {
        echo "$error";
    } ?>
</details>

<div>
    <h2>Liste des séances</h2>
    <table>
        <tr>
            <th>Description</th>
            <th>Exercice</th>
            <th>Lieu</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Relevés</th>
            <th>Gestion</th>
        </tr>
        <?php

        $timenow = \Cake\I18n\Time::now();


        foreach ($workouts_array as $row)
        {
            //$seanceid = $row['id'];
            $workout = $row['workout'];
            $logs=[];
            foreach ($row['logs'] as $log)
            {
                $logs[]=$log->log_type." : ".$log->log_value. " : ". $this->Form->postLink("X", ["controller" => "Main", "action" => "SupprimerLog/" . $log->id]);
            }

            echo "<tr><td>" . $workout->description . "</td>" .
                "<td>" . $workout->sport . "</td>" .
                "<td>" . $workout->location_name . "</td>" .
                "<td>" . $workout->date . "</td>" .
                "<td>" . $workout->end_date . "</td>" .
                "<td>" . $this->Html->nestedList($logs);

            echo "<details><summary>Ajouter un relevé</summary>";
            echo $this->Form->create(null, array('url' => array('controller' => 'Main', 'action' => 'addLog/'. $workout->id . '/' . $workout->date)));
            echo $this->Form->select('log_type', ["Pas couru", "Biceps", "Pompes", "Abdos", "Triceps", "Rameur"], ['multiple' => false, 'class' => 'form-control']);
            echo $this->Form->input('log_value', array('class' => 'form-control', 'placeholder' => 'Valeur', 'label' => 'Valeur'));
            echo $this->Form->submit("Ajouter relevé", array("class" => "btn pagebtn float-right"));
            echo $this->Form->end();
            echo "</details>";
            echo "</td><td>";
                if($timenow < $workout->date)
                {
                    echo "Séance prévue";

                }elseif($timenow > $workout->date && $timenow < $workout->end_date)
                {
                    echo "Séance en cours";

                }elseif ($workout->end_date == $workout->date && $timenow > $workout->end_date)
                {
                    echo "Séance manquée";

                }elseif ($workout->end_date != $workout->date && $timenow > $workout->end_date)
                {
                    echo "Séance réalisée";
                }
            echo  $this->Form->postButton("Supprimer", ["controller" => "Main", "action" => "SupprimerSeance/" . $workout->id]) . "</td></tr>";

        }
        ?>
    </table>
</div>
