<div class="conteneur">
    <header>
        <?php include 'haut.php'; ?>
    </header>

    <link href="../styles/m2l.css">

    <main>
        <div class="formations">
		<h2>Tableau des Formations Administrateur</h2>
            <div class="container">
                <div class="item"><b>ID Formation</b></div>
                <div class="item"><b>Intitulé Formation</b></div>
                <div class="item"><b>Descriptif Formation</b></div>
                <div class="item"><b>Durée Formation</b></div>
                <div class="item"><b>Date Ouverture Inscriptions</b></div>
                <div class="item"><b>Date Clôture Inscriptions</b></div>
                <div class="item"><b>Effectif Maximum</b></div>
                <div class="item"><b>Effectif Actuel</b></div>
            </div>    

        <?php
        echo $toRender;
        ?>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <!-- Boutons pour les actions sur les formations -->
        <div class="container">
            <button class="button" onclick="toggleAddForm()">Ajouter une Formation</button>
            <button class="button" onclick="toggleDeleteForm()">Supprimer une Formation</button>
            <button class="button" onclick="toggleEditForm()">Modifier une Formation</button>
        </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------->        

        <!-- Formulaire pour AJOUTER une nouvelle formation -->
        <div class="container">
            <div id="addForm" style="display: none; margin-top: 20px;">
                <form action="index.php?m2lMP=ajouter_formation" method="POST">
                    <div class="form-group">
                        <label for="intitule">Intitulé de la Formation :</label>
                        <input type="text" id="intitule" name="intitule" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <input type="text" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="duree">Durée (en heures) :</label>
                        <input type="number" id="duree" name="duree" required>
                    </div>
                    <div class="form-group">
                        <label for="date_ouverture">Date Ouverture Inscriptions :</label>
                        <input type="date" id="date_ouverture" name="date_ouverture" required>
                    </div>
                    <div class="form-group">
                        <label for="date_cloture">Date Clôture Inscriptions :</label>
                        <input type="date" id="date_cloture" name="date_cloture" required>
                    </div>
                    <div class="form-group">
                        <label for="effectif_max">Effectif Maximum :</label>
                        <input type="number" id="effectif_max" name="effectif_max" required>
                    </div>
                    <button type="submit">Enregistrer la Formation</button>
                </form>
            </div>

<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------> 

            <!-- Formulaire pour SUPPRIMER une formation -->
            <div id="deleteForm" style="display: none; margin-top: 20px;">
                <form action="index.php?m2lMP=supprimer_formation" method="POST">
                    <div class="form-group">
                        <label for="id_delete">ID de la Formation à Supprimer :</label>
                        <input type="number" id="id_delete" name="id_delete" required>
                    </div>
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?');">Supprimer la Formation</button>
                </form>
            </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

            <!-- Formulaire pour MODIFIER une formation -->
            <div id="editForm" style="display: none; margin-top: 20px;">
                <form action="index.php?m2lMP=modifier_formation" method="POST">
                    <div class="form-group">
                        <label for="id_edit">ID de la Formation à Modifier :</label>
                        <input type="number" id="id_edit" name="idForma" required>
                    </div>
                    <div class="form-group">
                        <label for="intitule_edit">Intitulé de la Formation :</label>
                        <input type="text" id="intitule_edit" name="intitule" required>
                    </div>
                    <div class="form-group">
                        <label for="description_edit">Description :</label>
                        <input type="text" id="description_edit" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="duree_edit">Durée (en heures) :</label>
                        <input type="number" id="duree_edit" name="duree" required>
                    </div>
                    <div class="form-group">
                        <label for="date_ouverture_edit">Date Ouverture Inscriptions :</label>
                        <input type="date" id="date_ouverture_edit" name="date_ouverture" required>
                    </div>
                    <div class="form-group">
                        <label for="date_cloture_edit">Date Clôture Inscriptions :</label>
                        <input type="date" id="date_cloture_edit" name="date_cloture" required>
                    </div>
                    <div class="form-group">
                        <label for="effectif_max_edit">Effectif Maximum :</label>
                        <input type="number" id="effectif_max_edit" name="effectif_max" required>
                    </div>
                    <button type="submit">Modifier la Formation</button>
                </form>
            </div>
        </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <script>
            // Fonctions pour afficher ou masquer les formulaires
            function toggleAddForm() {
                document.getElementById("addForm").style.display = "block";
                document.getElementById("deleteForm").style.display = "none";
                document.getElementById("editForm").style.display = "none";
            }

            function toggleDeleteForm() {
                document.getElementById("addForm").style.display = "none";
                document.getElementById("deleteForm").style.display = "block";
                document.getElementById("editForm").style.display = "none";
            }

            function toggleEditForm() {
                document.getElementById("addForm").style.display = "none";
                document.getElementById("deleteForm").style.display = "none";
                document.getElementById("editForm").style.display = "block";
            }
        </script>

        </div>

        
    </main>
</body>

    <footer>
        <?php include 'bas.php'; ?>
    </footer>
</div>
