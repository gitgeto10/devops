<h1>Article List</h1>
<ul>
<?php foreach ($articles as $article): ?>
    <li><?= $article['ref'] ?> - <?= $article['nom'] ?> - Prix: <?= $article['prixUnitaire'] ?> - Quantité: <?= $article['qte'] ?></li>
<?php endforeach; ?>
</ul>
