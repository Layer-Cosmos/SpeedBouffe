<section id="liste-commande">
    <i class="fa fa-spinner loading" aria-hidden="true"></i>
    <article class="commande">
        <h3>[003]</h3>
        <ul class="info-commande js-fade fade-in is-paused">
            <li><i class="fa fa-user" aria-hidden="true"></i><span class="gras"> Nom du client :</span> </li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i> <span class="gras">Commande :</span> </li>
            <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i><span class="gras"> Prix :</span> </li>
            <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="gras">Durée :</span> [Chronometre qui s'immobilise quand la commande est faite.]</li>
        </ul>
    </article>

    <?php foreach($nonTreatedOrders as $nonTreatedOrder):?>
    <article class="commande">
        <h3>[003]</h3>
        <ul class="info-commande">
            <li><i class="fa fa-user" aria-hidden="true"></i><span class="gras"> Nom du client : <?php var_dump($nonTreatedOrder); ?></span> </li>
            <li><i class="fa fa-cutlery" aria-hidden="true"></i> <span class="gras">Commande :</span> </li>
            <li><i class="fa fa-credit-card-alt" aria-hidden="true"></i><span class="gras"> Prix :</span> </li>
            <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="gras">Durée :</span> [Chronometre qui s'immobilise quand la commande est faite.]</li>
        </ul>
    </article>
    <?php endforeach; ?>
</section>