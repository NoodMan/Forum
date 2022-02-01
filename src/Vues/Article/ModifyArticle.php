<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        #form_controller {
            /* mise en forme formulaire*/
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            line-height: 3em;
        }

        .radius {
            border-radius: 10px;

        }
    </style>

    
</head>
<body>
    

<form action='<?= "/article/$sId" ?>' method="POST" id="form_controller" style="height: 100vh;">

    <label for="title">TITRE: </label>
    <input type="text" name="title" class="radius" id="title" value="<?= $article->getTitle() ?>">

    <label for="summary">RESUMÉ: </label>
    <textarea name="summary" class="radius" id="summary">
            <?= $article->getSummary() ?>
        </textarea>

    <label for="n_isbn">NUMERO DE PUCE: </label>
    <input type="number" name="n_isbn" class="radius" min="0" id="n_isbn" value="<?= $article->getNIsbn() ?>">

    <label for="author">AUTEUR</label>
    <select name="author" class="radius" id="author">
        <?php foreach ($aUser as $author) : ?>
            <?php if ($author->getId() === $article->getAuthor()->getId()) : ?>
                    <option value="<?= $author->getId() ?>" selected="selected"><?= $author->getName() ?></option>
            <?php else : ?>
                    <option value="<?= $author->getId() ?>"><?= $author->getName() ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
    </select>

    <label for="editor">EDITEUR</label>
    <select name="editor" class="radius" id="editor">
        <?php foreach ($aUser as $editor) : ?>
            <?php if ($editor->getId() === $article->getEditor()->getId()) : ?>
                    <option value="<?= $editor->getId() ?>" selected="selected"><?= $editor->getName() ?></option>
            <?php else : ?>
                    <option value="<?= $editor->getId() ?>"><?= $editor->getName() ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <input type="submit" class="radius" value="ENREGISTRER">
</form>

</body>
</html>