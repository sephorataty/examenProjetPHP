<?php
//require_once("../index.php");
$adherents=all_adherent();
?>
<div class="conteneur">
    <div class="classe">
        <table>
            <tr>
                <th>ID</th>
                <th>NOM & PRENOM</th>
               
            </tr>
            <?php foreach ($adherents as $value):?>
                <tr>
                    <td><?= $value['id'] ?></td> 
                    <td><?= $value['nom']." ".$value["prenom"] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>