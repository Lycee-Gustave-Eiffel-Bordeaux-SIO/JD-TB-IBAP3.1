<div class="conteneur">
    <header>
        <?php include 'haut.php'; ?>
    </header>

    <link href="../styles/m2l.css">

    <main>
        <div class="formations">
		<h2>Tableau des Formations</h2>
            <div class="container">
                <div class="item"><b>ID Formation</b></div>
                <div class="item"><b>Intitulé Formation</b></div>
                <div class="item"><b>Descriptif Formation</b></div>
                <div class="item"><b>Durée Formation</b></div>
                <div class="item"><b>Date Ouverture Inscriptions</b></div>
                <div class="item"><b>Date Clôture Inscriptions</b></div>
                <div class="item"><b>Effectif Maximum</b></div>
                <div class="item"><b>Effectif Actuel</b></div>
                <div class="item"><b>Inscription / Desinscription</b></div>
                <div class="item"><b>Information état</b></div>
            </div>    

        <?php
        echo $toRender;
        ?>

        </div>
    </main>
</body>

    <footer>
        <?php include 'bas.php'; ?>
    </footer>
</div>
