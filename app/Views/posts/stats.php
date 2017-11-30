<section id="liste-commande">
    <div id="stats">
        <table class="tab-stat">
            <caption class="titre-tab-stat">Répartition Homme / Femme des commandes</caption>
            <tr>
                <td>Hommes</td>
                <td class="right"><?= $nb_mealMale?></td>
            </tr>
            <tr>
                <td>Femmes</td>
                <td class="right"><?= $nb_mealFemale ?></td>
            </tr>
        </table>
        <table class="tab-stat">
            <caption class="titre-tab-stat">Répartition des commandes par tranches d'ages</caption>
            <tr>
                <td>Moins de 18 ans</td>
                <td class="right"><?= $nb_agePerMeal18 ?></td>
            </tr>
            <tr>
                <td>De 18 à 26 ans</td>
                <td class="right"><?= $nb_agePerMeal1825 ?></td>
            </tr>
            <tr>
                <td>De 25 à 39 ans</td>
                <td class="right"><?= $nb_agePerMeal2539 ?></td>
            </tr>
            <tr>
                <td>De 40 à 55 ans</td>
                <td class="right"><?= $nb_agePerMeal4054 ?></td>
            </tr>
            <tr>
                <td>De 55 ans à plus</td>
                <td class="right"><?= $nb_agePerMeal55 ?></td>
            </tr>
        </table>
        <table class="tab-stat">
            <caption class="titre-tab-stat">Menus vendus</caption>
            <?php foreach($nb_orderPerMeals as $nb_orderPerMeal):?>
            <tr>
                <td><?= $nb_orderPerMeal->meal; ?></td>
                <td class="right"><?= $nb_orderPerMeal->Plats; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <table class="tab-stat">
            <caption class="titre-tab-stat">Horaires de ventes</caption>
            <?php foreach($nb_mealPerDeliveryTimes as $nb_mealPerDeliveryTime):?>
            <tr>
                <td><?= $nb_mealPerDeliveryTime->delivery_time; ?> </td>
                <td class="right"><?= $nb_mealPerDeliveryTime->Plats; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <table class="tab-stat">
            <caption class="titre-tab-stat">Ventes par entreprises</caption>
            <tr>
                <td class="center">Repas</td>
                <td class="center">Email</td>
                <td class="center">Nombres</td>
            </tr>
            <?php foreach($nb_mealPerBuyers as $nb_mealPerBuyer):?>
                <tr>
                    <td><?= $nb_mealPerBuyer->meal; ?></td>
                    <td><?= $nb_mealPerBuyer->email; ?></td>
                    <td class="right"><?= $nb_mealPerBuyer->Plats; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <table class="tab-stat">
            <caption class="titre-tab-stat">Ventes par entreprises</caption>
            <tr>
                <td class="center">Repas</td>
                <td class="center">Entre</td>
                <td class="center">Dessert</td>
            </tr>
            <?php foreach($nb_mealPerBuyers as $nb_mealPerBuyer):?>
                <tr>
                    <td><?= $nb_mealPerBuyer->meal; ?></td>
                    <td><?= $nb_entrePerMeals->entre; ?></td>
                    <td class="right"><?= $nb_mealPerBuyer->Plats; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>




    
<!--
    <?php foreach($nb_mealPerBuyers as $nb_mealPerBuyer):?>
        <h3>Repas <?= $nb_mealPerBuyer->meal; ?> : </h3>
        <h3>Email <?= $nb_mealPerBuyer->email; ?> : </h3>
        <h3>Nombre<?= $nb_mealPerBuyer->Plats; ?></h3>
    <?php endforeach; ?> -->

</section>