<?php
$rayons= all_rayon();

?>

<div class="conteneur">
    <div class="classe">
        <table>
            <tr>
                <th>numero</th>
                <th>categories</th>
                
            </tr>
            <?php foreach ($rayons as $value):?>
                <tr>
                    <td><?= $value['id']?></td> 
                    <td><?= $value['categorie'] ?></td>
                    
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>