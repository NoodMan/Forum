<?php

namespace App\Controller;

use App\Entity\Article;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

final class ArticleController
{
    const NEEDS = [
        "title", "summary", "n_isbn", "author", "editor"
    ];

    public function show(string $sId)
    {
        $em = EntityManagerHelper::getEntityManager();
        $articleRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));
        $noteRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Note"));
        $article = $articleRepo->find( (int) $sId);
        $aNotes = $noteRepo->findBy(["article" => $sId]);

        include(__DIR__ . "/../Vues/Article/ShowArticle.php");
    }

    public function add()
    {
        $em = EntityManagerHelper::getEntityManager();
        $userRepo = new EntityRepository($em, new ClassMetadata("App\Entity\User"));
        $aUser = $userRepo->findAll();

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__ . "/../Vues/Article/add.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }

            $n_isbn = (int) $_POST["n_isbn"];
            try {                
                $author = $userRepo->find($_POST["author"]);
                $editor = $userRepo->find($_POST["editor"]);
            } catch (\Throwable $th) {
                $error = "Un probleme est survenu durant le recueil d'un utilisateur";
            }
            $cat = new Article($_POST["title"], $_POST["summary"], $n_isbn, $author, $editor);

            try {
                $em->persist($cat);
                $em->flush();
            } catch (\Throwable $th) {
                $error = "Un probleme est survenu durant l'ajout";
            }
          
        }

        include(__DIR__ . "/../Vues/Article/addArticle.php");
    }

    public function modify(string $sId)
    {  
        $em = EntityManagerHelper::getEntityManager();
        $articleRepository = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));
        $userRepository = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $article = $articleRepository->find($sId);
        $aUser = $userRepository->findAll();

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if(!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__."/../Vues/Article/modify.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }

            if ($_POST["title"] !== $article->getTitle()) {
                $article->setTitle($_POST["title"]);
            }
            if ( $_POST["summary"] !== $article->getSummary()) {
                $article->setSummary($_POST["summary"]);
            }
            if ( $_POST["n_isbn"] !== $article->getNIsbn()) {
                $article->setNIsbn((int)$_POST["n_isbn"]);
            }
            
            $userRepo = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

  
            $author = $userRepo->find((int)$_POST["author"]);
            if ($author) { 
                if ($article->getAuthor()->getId() !== (int)$_POST["author"]) {
                    $article->setAuthor($author);
                }
            }

            $editor = $userRepo->find((int)$_POST["editor"]);
            if ($editor) {
                if ($article->getEditor()->getId() !== (int)$_POST["editor"]) {
                    $article->setEditor($editor);
                }
                
                try {
                    $em->persist($article);
                    $em->flush();
                    $error = "Modifié avec succès";
                } catch (\Throwable $th) {
                    $error = "une erreur est survenue à la modification";
                }
            }
        }

        include_once(__DIR__."/../Vues/Article/ModifyArticle.php");
    }


    public function delete(string $id)
    { 
            $em = EntityManagerHelper::getEntityManager();
            $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));

            $article = $repository->find($id);

            $em->persist($article);
            $em->flush();

            echo "Article well delete";
        }
}





