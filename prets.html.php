<?php
$prets= find_prets();

?>

<div class="conteneur">
    <div class="classe">
        <table>
            <tr>
                <th>oeuvres</th>
                <th>adherents</th>
                <th>date d'enregistrement</th>
                <th>date de retour prévu</th>
                <th>date de retour réel</th>
                <th>statut</th>
            </tr>
            <?php foreach ($prets as $value):?>
                <tr>
                    <td><?= $value['ouvrage']?></td> 
                    <td><?= $value['adherent'] ?></td>
                    <td><?= $value['date_obtenu'] ?></td>
                    <td><?= $value['dater_prev'] ?></td>
                    <td><?= $value['dater_reel'] ?></td>
                    <td><?= $value['statut'] ?></td>
                    
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>