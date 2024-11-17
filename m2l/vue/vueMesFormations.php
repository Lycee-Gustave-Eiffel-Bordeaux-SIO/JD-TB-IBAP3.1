<div class="conteneur">
    <header>
        <?php include 'haut.php'; ?>
    </header>

    <link href="../styles/m2l.css">

    <main>
        <div class="formations">
            <h2>Mes Formations</h2>
            <div class="container">
                <!-- En-tête du tableau -->
                <div class="item"><b>ID Formation</b></div>
                <div class="item"><b>Intitulé Formation</b></div>
                <div class="item"><b>Descriptif Formation</b></div>
                <div class="item"><b>Durée Formation</b></div>
                <div class="item"><b>Date Ouverture Inscriptions</b></div>
                <div class="item"><b>Date Clôture Inscriptions</b></div>
                <div class="item"><b>Effectif Maximum</b></div>
                <div class="item"><b>Effectif Actuel</b></div>
                <div class="item"><b>État</b></div>
            </div>

            <!-- Affichage des formations inscrites -->
            <?php 
                echo $toRender; 
            ?>
        </div>
    </main>

    <footer>
        <?php include 'bas.php'; ?>
    </footer>
</div>
