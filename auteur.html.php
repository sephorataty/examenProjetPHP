<?php
$auteurs= all_auteur();
?>

<div class="conteneur">
    <div class="classe">
        <table>
            <tr>
                <th>prenom et nom</th>
                <th>profession</th>
                <th>oeuvres</th>
            </tr>
            <?php foreach ($auteurs as $value):?>
                <tr>
                    <td><?= $value['prenom']." ".$value['nom']?></td> 
                    <td><?= $value['profession'] ?></td>
                    <td>
                        <?php echo (implode(",",$value['oeuvre'])) ?>
                    </td>
                    
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>