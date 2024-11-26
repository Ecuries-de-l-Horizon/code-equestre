<?php
    include('bdd.php');

    //$id = $_POST['id_cavalier'];
    $nom_cav = $_POST['nom_cav'];
    $prenom_cav = $_POST['prenom_cav'];
    $numlicence = $_POST['numlicence'];
    $photo = $_POST['photo'];
    $datena = $_POST['datena'];
    $idgalop = $_POST['idgalop'];

    

    if(isset($_POST['select'])){
        $choix1 = $_POST['select'];
        echo($choix1);
    }else{
        $choix1 = 0;
    }
    if(isset($_POST['select2'])){
        $choix2 = $_POST['select2'];
        echo($choix2);
    }else{
        $choix2 = 0;
    }
    if($choix1 === 0 && $choix2 === 0){
        include('cavalier.class.php');
        $protptype = new Cavalier(0,$nom_cav,$prenom_cav,$numlicence, $photo, $datena, $idgalop);
        $protptype->cavalier_ajout($nom_cav,$prenom_cav,$numlicence, $photo, $datena, $idgalop, $con);
    }

    if($choix1 == "res"&& $choix2 == "prop"){
        include("prop&res.class.php");

        $nom_res = $_POST['nomres'];
        $prenom_res = $_POST['prenomres'];
        $rue_res = $_POST['rueres'];
        $cp_res = $_POST['cpres'];
        $tel_res = $_POST['telres'];
        $email_res = $_POST['emailres'];
        $mdp_res = $_POST['mdpres'];
        $assurance = $_POST['assurance'];
        
        $protptype = new Prop_res(0,$nom_cav,$prenom_cav,$numlicence, $photo, $datena,$idgalop, $nom_res,$prenom_res,$rue_res,$cp_res,$tel_res,$email_res,$mdp_res,$assurance);
        $protptype->pr_ajout($nom_cav,$prenom_cav,$numlicence, $photo, $datena,$idgalop, $nom_res, $prenom_res, $rue_res, $cp_res, $tel_res, $email_res, $mdp_res, $assurance,$con);
    }else{
        if($choix1 == "res"){
            include("responsable.class.php");

            $nom_res = $_POST['nomres'];
            $prenom_res = $_POST['prenomres'];
            $rue_res = $_POST['rueres'];
            $cp_res = $_POST['cpres'];
            $tel_res = $_POST['telres'];
            $email_res = $_POST['emailres'];
            $mdp_res = $_POST['mdpres'];

            $protptype = new Responsable(0,$nom_cav,$prenom_cav,$numlicence, $photo, $datena,$idgalop, $nom_res,$prenom_res,$rue_res,$cp_res,$tel_res,$email_res,$mdp_res);
            $protptype->res_ajout($nom_cav,$prenom_cav,$numlicence, $photo, $datena,$idgalop, $nom_res, $prenom_res, $rue_res, $cp_res, $tel_res, $email_res, $mdp_res, $con);
        };
        if($choix2 == "prop"){
            include("proprietaire.class.php");

            $assurance = $_POST['assurance'];

            $protptype = new Proprietaire(0,$nom_cav,$prenom_cav,$numlicence, $photo, $datena,$idgalop, $assurance);
            $protptype->prop_ajout($nom_cav,$prenom_cav,$numlicence, $photo, $datena,$assurance,$idgalop, $con);
        };
    }