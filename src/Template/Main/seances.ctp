<!DOCTYPE html>
<html>
<head>
</head>
    <body>
        <h1>Séances</h1>
        <?php
        // https://getbootstrap.com/docs/4.0/components/forms/
        echo $this->Form->create($new);
        echo $this->Form->input("description", array("class" => "form-control", "placeholder" => "Description", "label" => "Description"));
        echo $this->Form->select('sport', ["Course", "Biceps", "Pompes", "Abdos", "Triceps", "Rameur"], ['multiple' => false, 'class' => 'form-control']);
        echo $this->Form->input("location_name", array("class" => "form-control", "placeholder" => "Entrez un lieu", "label" => "Lieu"));
        echo $this->Form->input("date", array("class" => "form-control", "type" => "datetime", "label" => "Début"));
        echo $this->Form->input("end_date", array("class" => "form-control", "type" => "datetime", "label" => "Fin"));
        echo $this->Form->submit("Ajouter séance", array("class" => "btn pagebtn float-right","controller"=>"Main", "action"=>"ajouterseance/"));
        echo $this->Form->end();

        if (isset($error)) {
            echo "$error";
        } ?>

        <div> <h2>Liste des séances réalisées</h2>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Exercice</th>
                    <th>Lieu</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                </tr>
                <?php foreach ($new as $row){

                    echo "<tr><td>".$row['description']."</td><td>".$row['exercice']."</td><td>".$row['lieu']."</td><td>".$row['date']."</td><td>".(int)$row['end_date']."</td><td>";

                }
                ?>
            </table>
        </div>

    </body>
</html>
