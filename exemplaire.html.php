<?php
$exemplaires= find_exemplaires();

?>

<div class="conteneur">
    <div class="classe">
        <table>
            <tr>
                <th>oeuvres</th>
                <th>codes</th>
                <th>date d'enregistrement</th>
            </tr>
            <?php foreach ($exemplaires as $value):?>
                <tr>
                    <td><?= $value['ouvrage']?></td> 
                    <td><?= $value['code'] ?></td>
                    <td><?= $value['dateE'] ?></td>
                    
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>