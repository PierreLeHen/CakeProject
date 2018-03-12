<!DOCTYPE html>
<html>
<head>
</head>
    <body>
        <h1>Séances</h1>
        <h2>Liste des séances réalisées</h2>
        <?php
        // https://getbootstrap.com/docs/4.0/components/forms/
        echo $this->Form->create();
        echo $this->Form->input("description", array("class" => "form-control", "placeholder" => "Description", "label" => "Description"));
        echo $this->Form->select('exercice', ["Course", "Biceps", "Pompes", "Abdos", "Triceps", "Rameur"], ['multiple' => false, 'class' => 'form-control']);
        echo $this->Form->input("lieu", array("class" => "form-control", "placeholder" => "Entrez un lieu", "label" => "Lieu"));
        echo $this->Form->input("date", array("class" => "form-control", "type" => "datetime", "label" => "Début"));
        echo $this->Form->input("end_date", array("class" => "form-control", "type" => "datetime", "label" => "Fin"));
        echo $this->Form->submit("Add", array("class" => "btn pagebtn float-right"));
        echo $this->Form->end();

        if (isset($error)) {
            echo "$error";
        } ?>
    </body>
</html>
