<?php
    require 'models/modelProfil.php';
    function profildefaut()
    {
        require 'views/profilView.php';
    }

    //verification de la photo de profil
    function VerifProfil()
    {
        if(isset($_FILES['profil']) && !empty($_FILES['profil']['name'])){
            $max=2097152;
            $extensionValide=array('jpeg', 'jpg', 'gif', 'png');
            $error='correct';
            if($_FILES['profil']['size']<=$max){
                $extension=strtolower(substr(strrchr($_FILES['profil']['name'], '.'), 1));
                if(in_array($extension, $extensionValide)){
                    $chemin='public/user/profil/'.$_SESSION['auth']['id'].'.'.$extension;
                    $resultat=move_uploaded_file($_FILES['profil']['tmp_name'], $chemin);
                    if (!$resultat) {
                        $error='erreur durant l\'importation de la photo';
                    }
                }else{
                    $error='extension non valide';
                }
            }
            else{
                $error='taille trop grande';
            }
        }else{
            $error='correct';
        }
        return $error;
    }

    //mis à jours des informations de l'utilisateur dans la base de donnée
    function UpdateUser()
    {
        if(isset($_POST['update']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['sexe']) && !empty($_POST['date'])){
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $lieux=htmlspecialchars($_POST['lieux']);
            $extension=strtolower(substr(strrchr($_FILES['profil']['name'], '.'), 1));
            $error=verifProfil();
            if($error!='correct'){
                header('location: index.php?action=profil&id='.$_SESSION['auth']['id'].'&error='.$error);
            }else{
                $error='enregistrement réussit';
                update($_SESSION['auth']['id'], $nom, $prenom,$_POST['sexe'], $_POST['date'], $extension, $lieux);
                header('location: index.php?action=profil&id='.$_SESSION['auth']['id'].'&error='.$error);
            }
        }
        else{
            $error='les champs nom, prenom, sexe, date de naissance sonnt obligatoires';
            header('location: index.php?action=profil&id='.$_SESSION['auth']['id'].'&error='.$error);
        }
    }

