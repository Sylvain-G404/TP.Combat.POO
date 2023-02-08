<?php

include "config/db.php";

include "partials/header.php";

?>


<section class="connection">
    <form action="class/PersonnagesManager.php" method="POST">
        <table>
            <tr>
                <td> <label for="nom">Votre Pseudo :</label></td>
                <td> <input type="text" id="nom" name="nom" id="nom" class="nom"> </td>
            </tr>
            <br /><br />
            <tr>
                <td>
                    <label for="personnage">choisies votre Class</label>
                </td>
                <td>
                    <select class="personnage" name="personnage" id="personnage">
                        <option name="mage" value="">Mage</option>
                        <option name="archer" value="">Archer</option>
                        <option name="thank" value="">Thank</option>
                        <option name="guerrier" value="">Guerrier</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input onclick="enregistrerNouveauPersonnage()" type="button" class="btn-Inscription" value="Valider"></td>
                <td></td>
            </tr>
        </table>
    </form>
</section>












<?php include "partials/footer.php"; ?>