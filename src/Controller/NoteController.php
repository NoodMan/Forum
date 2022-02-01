<?php

namespace App\Controller;

use App\Entity\Note;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Router\Router;


class NoteController
{
    const NEEDS = [
        "note", "comment"
    ];

    public function add( string $artricleId)
    {
        $em = EntityManagerHelper::getEntityManager();
        $userRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));
        $noteRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Note"));
        $article = $userRepo->find((int) $artricleId);

        if(!$article) {
            exit("aucun artcile trouvé");
        }

        if (!empty($_POST)) { 
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__ . "/../Vues/Article/AddArticle.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }

            $note = new Note($_POST["comment"], (int)$_POST["note"], $article);
            $em->persist($note);
            $em->flush();
            $getNote = $noteRepo->findBy(["article" => $article->getId(), "comment" => $_POST["comment"], "note" => (int)$_POST["note"]]);
            $article->addNote($getNote[0]);

            try {
                $em->persist($article);
                $em->flush();
            } catch (\Throwable $th) {
                $error = "Un probleme est survenu durant l'ajout";
            }
          
        }

        Router::redirect("articles/$articleId");
        
    }
}