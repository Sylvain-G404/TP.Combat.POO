<?php

include "config/db.php";

class PersonnagesManager {

    private $nom;
    

    public function __construct($nom) {
        $this->nom = $nom;
    }
    public function enregistrerNouveauPersonnage() {
        if (
            isset($_POST["pseudo"]) && !empty($_POST["pseudo"]) &&
            isset($_POST["personnage"]) && !empty($_POST["personnage"])
        ) {
            $pdostmnt = $connection->prepare("INSERT INTO utilisateurs(pseudo, personnage) VALUES (?,?)");
            $isSucces = $pdostmnt->execute([
                $_POST["pseudo"],
                $_POST["personnage"]
            ]);
        
            if($isSucces) {
                header('Location: listeCombat.php?success=Vous ete bien enregitrer, Bon jeux ;p');
            } else {
                header('Location: index.php?error=Erreur lors de l\'enregistrement !');
            }
        } else {
            header('Location: index.php?error=Le formulaire n\'est pas valide !');    
        }
    }

    public function modifierPersonnage() {
        if (
            isset($_GET['nom_id']) && !empty($_GET['nom_id'])
        ) {
            // Modification de la date supp le T
            $idNom = $_GET['nom_id'];
            $pdostmnt = $pdo->prepare('UPDATE utilisateurs SET nom = ? WHERE id = ?');
            $isSuccess =  $pdostmnt->execute([
                $idNom
            ]);
        
            if ($isSuccess) {
                $idNom = $_POST['nom_id'];
                header('Location: ../liste-rendezvous.php?success=Le rendez vous à bien été modifié par la date suivante: ' . $date . '! id_rdv = ' . $idRdv);    
            } else {
                header('Location: ../ajout-rendezvous.php?error=Erreur lors de l\'enregistrement du rendez vous !');    
            }
            
            //rediriger vers une page
        } else {
            header('Location: ../ajout-rendezvous.php?error=Le formulaire n\'est pas valide !');    
        }
    }

    public function supprimerPersonnage() {
        if (
            isset($_GET['nom_id']) && !empty($_GET['nom_id'])
        ) {
            $pdostmnt = $pdo->prepare('DELETE FROM utilisateurs WHERE nom_id = ?');
            $isSuccess =  $pdostmnt->execute([
                $_GET['nom_id']
            ]);
        
            if ($isSuccess) {
                header('Location: ?&success=Le rendez-vous à été supprimé !');    
            } else {
                header('Location: ?error=La suppression a échouée');    
            }
        } else {
            header('Location: ?error=Je ne sais pas qui supprimer');    
        }
    }

    public function selectionnerPersonnage()

    public function CompterNombrePersonnages()

    public function recupererListePersonnages() {
        
        echo (" 
            <table>
                <thead>
                    <th>Id</th>
                    <th>Pseudo/th>
                    <th>Personnage/th>
                </thead>
                <tbody>
                    <?php foreach ($utilisateurs as $utilisateur) {?>
                        <tr>
                            <td><?= $utilisateur['nom']?></td>
                            <td><?= $utilisateur['personnage']?></td>
                            <td>
                                <a class="btn" href=" ?nom_id=<?=$utilisateur['id']?>">Voir</a>
                                <a></a>
                                <a class="btn red" href=" ?personnage_id=<?=$utilisateur['id']?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            ")
    }
    public function PersonnageExiste() {
        $search = "%" . $_GET['search'] . "%";
        $utilisateurStmnt = $pdo->prepare('SELECT * FROM utilisateurs WHERE nom LIKE :search OR nom LIKE :search');
        $utilisateurStmnt->execute(array(':search' => $search));

        
    }
}