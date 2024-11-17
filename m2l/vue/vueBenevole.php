<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class='texteBenevole'>
			<h1><span>Information</span></h1>

			<div class="flex-table">
    <div class="flex-row">
        <div class="flex-cell">Nom</div>
        
        <div class="flex-cell">Prénom</div>
        <div class="flex-cell">Login</div>
        <div class="flex-cell">Type Utilisateur</div>
        <div class="flex-cell">Ligue</div>
        <div class="flex-cell">Club</div>
        <div class="flex-cell">Fonction</div>
    </div>
    <?php

    if (isset($benevoles) && count($benevoles) > 0) {
        foreach ($benevoles as $row) {
            echo "<div class='flex-row'>";
            echo "<div class='flex-cell'>" . htmlspecialchars($row['nom']) . "</div>";
            echo "<div class='flex-cell'>" . htmlspecialchars($row['prenom']) . "</div>";
            echo "<div class='flex-cell'>" . htmlspecialchars($row['login']) . "</div>";
            echo "<div class='flex-cell'>" . htmlspecialchars($row['typeUser']) . "</div>";
            echo "<div class='flex-cell'>" . htmlspecialchars($row['ligue']) . "</div>";
            echo "<div class='flex-cell'>" . htmlspecialchars($row['club']) . "</div>";
            echo "<div class='flex-cell'>" . htmlspecialchars($row['fonction']) . "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='flex-row'><div class='flex-cell' colspan='7'>Aucun utilisateur trouvé</div></div>";
    }
	?>
			</div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>