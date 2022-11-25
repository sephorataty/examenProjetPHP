<?php
//require_once("../index.php");
$ouvrages=find_auteur_by_ouvrage();
?>
<div class="conteneur">
    <div class="classe">
        <table>
            <tr>
                <th>code</th>
                <th>titre</th>
                <th>date edition</th>
                <th>auteur</th>
                <th>rayon</th>
            </tr>
            <?php foreach ($ouvrages as $value):?>
                <tr>
                    <td><?= $value['code'] ?></td> 
                    <td><?= $value['titre'] ?></td>
                    <td><?= $value['date_edition'] ?></td>
                    <td><?= $value['auteur'] ?></td>
                    <td><?= $value['rayon'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>