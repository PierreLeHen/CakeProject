
<div> <h2>Classement des pas courus</h2>
    <table>
        <tr>
            <th>Rang</th>
            <th>member ID</th>
            <th>Nombre de pas courus</th>

        </tr>


        <?php $cnt = 1;?>


        <?php foreach ($classPas_array as $row){

            echo "<tr><td>".$cnt."</td><td>".$row['member_id']."</td><td>".$row['log_value']."</td></tr>";
            $cnt++;




        }
        ?>
    </table>
</div>
