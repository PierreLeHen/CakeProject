<?= $this->element('seances'); ?>
<body class="mycustomContainer">
<section id="bloco" class="col-md-8 col-lg-6 col-sm-10 col-xs-10  ">
    <h1>Séances</h1>
    <h2><?php echo \Cake\I18n\Time::now('Europe/Paris') ?></h2>
    <figure id="ligne"></figure>

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
        echo $this->Form->radio('contest', ["Pas match", "Match"]);
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


            foreach ($workouts_array as $row) {
                //$seanceid = $row['id'];

                $workout = $row['workout'];
                $match = "";
                if ($workout->contest_id != 0) {
                    $match = " - Match";
                }
                $logs = [];
                foreach ($row['logs'] as $log) {
                    $logs[] = $log->log_type . " : " . $log->log_value . " : " . $this->Form->postLink("X", ["controller" => "Main", "action" => "SupprimerLog/" . $log->id]);
                }

                echo "<tr><td>" . $workout->description . " " . $match . "</td>" .
                    "<td>" . $workout->sport . "</td>" .
                    "<td>" . $workout->location_name . "</td>" .
                    "<td>" . $workout->date . "</td>" .
                    "<td>" . $workout->end_date . "</td>" .
                    "<td>" . $this->Html->nestedList($logs);

                echo "<details><summary>Ajouter un relevé</summary>";
                echo $this->Form->create(null, array('url' => array('controller' => 'Main', 'action' => 'addLog/' . $workout->id . '/' . $workout->date)));
                echo $this->Form->select('log_type', ["Pas couru", "Biceps", "Pompes", "Abdos", "Triceps", "Rameur"], ['multiple' => false, 'class' => 'form-control']);
                echo $this->Form->input('log_value', array('class' => 'form-control', 'placeholder' => 'Valeur', 'label' => 'Valeur'));
                echo $this->Form->submit("Ajouter relevé", array("class" => "btn pagebtn float-right"));
                echo $this->Form->end();
                echo "</details>";
                echo "</td><td>";
                if ($timenow < $workout->date) {
                    echo "Séance prévue";

                } elseif ($timenow > $workout->date && $timenow < $workout->end_date) {
                    echo "Séance en cours";

                } elseif ($workout->end_date == $workout->date && $timenow > $workout->end_date) {
                    echo "Séance manquée";

                } elseif ($workout->end_date != $workout->date && $timenow > $workout->end_date) {
                    echo "Séance réalisée";
                }
                echo $this->Form->postButton("Supprimer", ["controller" => "Main", "action" => "SupprimerSeance/" . $workout->id]) . "</td></tr>";

            }
            ?>
        </table>
    </div>
    <html>
    <head>
        <title></title>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqgya6hvq6zu3Z2xeT5xEGPPi5pY2ize4&callback=initMap"></script>
    </head>
    <body>

    <?php
    //I want to search this location in google map
    $location = "Kigali Rwanda";
    ?>

    <script>
        var myMap;
        var myLatlng = new google.maps.LatLng(52.518903284520796, -1.450427753967233);
        var myLatlng = new google.maps.LatLng(52.0, -1.450427753967233);

        function initialize() {
            var mapOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            }
            myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: myMap,
                title: 'Name Of Business',
                icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <div id="map" style="width:500px; height: 500px;">

    </div>


    </body>
    </html>
</section>
