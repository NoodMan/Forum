<?php

namespace App\Controllers;

use App\Helpers\EntityHelpers as EH;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;



class LoginController
{

    const NEEDS = [
        'mail',
        'password'
    ];

        public function login()
        {
            if (empty($_POST)){
                include "./src/Vues/Session/Login.php";
            }
            if (!empty($_POST)){
                foreach (self::NEEDS as $value){
                    if (!array_key_exists($value, $_POST))  {
                        echo "La valeur n'existe pas!!";
                        die();
                    }   
                    $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                    if (!$_POST[$value] === "") {
                        echo "Champs obligatoire";
                        die();
                    }
            }
            $entityManager = EH::getRequireEntityManager();
            $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\User")); 

            $alogin = $repository->findBy(['mail'=>$_POST['mail']]);

            if (empty($login)) {
                echo "Tu n'existe pas désoler mais tu rassure toi tu peux toujours nous rejoindre, inscrit toi vite!!";
               // header // rajouter un chemin pour la l'inscription
                die();
            }
            if (password_verify($_POST['password'], $alogin[0]->getPassword() === false)){
                echo "Mot de passe incorrect";
                die();
            }
            $_SESSION ['mail'] = $_POST['mail'];
            $_SESSION ['prenom'] = $alogin[0]->getPrenom();
            $_SESSION['type'] = strtolower(str_replace("App_Entity\\","",get_class($alogin[0])));    
        }            

        header("location: http://localhost:8888/src/Vues/Session/Login.php"); // lien à verifier
    }  
}