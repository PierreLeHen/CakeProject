<?= $this->element('devices');?>
<section id="bloco" class="col-md-8 col-lg-6 col-sm-10 col-xs-10  " >
<body class="mycustomContainer">
<h1>Objets connectés</h1>
       <figure id="ligne"></figure>
<div>
    <h2>Objets autorisés</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Member ID</th>
            <th>Serial</th>
            <th>Description</th>
            <th>Trusted</th>
            <th>Gestion</th>

        </tr>
        <?php foreach ($devices_trusted_array as $row) {

            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['member_id'] . "</td><td>" . $row['serial'] . "</td><td>" . $row['description'] . "</td><td>" . $row['trusted'] . "</td><td>" . $this->Form->postButton("Supprimer", ["controller" => "Main", "action" => "SupprimerObjet/" . $row->id]) . "</td></tr>";
        }
        ?>
    </table>
</div>

<div><h2>Objets en attentes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Member ID</th>
            <th>Serial</th>
            <th>Description</th>
            <th>Trusted</th>
            <th> Autorisation</th>
            <th> Gestion</th>
        </tr>

        <?php foreach ($devices_not_trusted_array as $row) {

            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['member_id'] . "</td><td>" . $row['serial'] . "</td><td>" . $row['description'] . "</td><td>" . (int)$row['trusted'] . "</td><td>" . $this->Form->postButton("Autoriser", ["controller" => "Main", "action" => "AutoriserObjet/" . $row->id]) . "</td><td>" . $this->Form->postButton("Supprimer", ["controller" => "Main", "action" => "SupprimerObjet/" . $row->id]) . "</td></tr>";

        }
        ?>
    </table>
</div>
</body>
</section>


