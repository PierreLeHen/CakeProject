<div> <h2>Liste des objets connectés autorisés à faire des modifications sur le compte<h2>
<table>
<tr>
       <th>ID</th>
       <th>Member ID</th>
       <th>Serial</th>
       <th>Description</th>
       <th>Trusted</th>
   </tr>
<?php foreach ($devices_trusted_array as $row){

    echo "<tr><td>".$row['id']."</td><td>".$row['member_id']."</td><td>".$row['serial']."</td><td>".$row['description']."</td><td>".$row['trusted']."</td><tr>";}

?>
</table>
</div>

<div> <h2>Liste des objets connectés non autorisés à faire des modifications sur le compte</h2>
<table>
<tr>
       <th>ID</th>
       <th>Member ID</th>
       <th>Serial</th>
       <th>Description</th>
       <th>Trusted</th>
   </tr>

<?php foreach ($devices_not_trusted_array as $row){

    echo "<tr><td>".$row['id']."</td><td>".$row['member_id']."</td><td>".$row['serial']."</td><td>".$row['description']."</td><td>".$row['trusted']."</td><tr>";}
?>
</table>
</div>

