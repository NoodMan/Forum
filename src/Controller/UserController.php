<?php

namespace App\Controller;


use App\Entity\User;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

final class UserController
{
    const NEEDS = [
        "name", "email"
    ];

    public function add()
    {
        $em = EntityManagerHelper::getEntityManager();
    
        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__ . "/../Vues/User/AddUser.php");
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
            }

            $user = new User($_POST["name"], $_POST["email"]);

            $em->persist($user);
            $em->flush();

            echo "Thank you for your registration...";
        }

        include(__DIR__ . "/../Vues/User/AddUser.php");
       // die();
    }


    public function modify(string $id)
    {
        $em = EntityManagerHelper::getEntityManager();
        $userRepository = new EntityRepository($em, new ClassMetadata("App\Entity\User"));
        
        $user = $userRepository->find((int) $id);
        
        
        if (!empty($_POST)) {
           
            foreach (self::NEEDS as $value) {
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "Des paramètres sont manquant";
                    include __DIR__ . "/../Vues/User/ModifyUser.php";
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
            }

        
            $user->setName($_POST["name"]);
            $user->setEmail($_POST["email"]);
            

            $entityManager->persist($user);
            $entityManager->flush();    
        }
        include (__DIR__ . "/../Vues/User/ModifyUser.php");   
    }
    
    public function delete(string $id)
    { 
            $em = EntityManagerHelper::getEntityManager();
            $repository = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

            $user = $repository->find($id);

            $em->remove($user);
            $em->flush();

            include (__DIR__ . "/../Vues/User/deleteuser.php"); // fonctionne grace a Amelie
        }
    }      
