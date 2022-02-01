<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div>
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $article->getTitle() ?></h5>
            <p class="card-text"><?= $article->getSummary() ?></p>
            <a href="#" class="btn btn-primary"><?= $article->getAuthor()->getName() ?></a>
            <a href="#" class="btn btn-info"><?= $article->getEditor()->getName() ?></a>
        </div>
    </div>
</div>
<div>
    <?php if (!empty($aNotes)) : ?>
        <ul class="list-group">
            <?php foreach ($aNotes as $note) : ?>
                <li class="list-group-item"><?= $note->getComment() ?> <?= $note->getNote() ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<form action='<?= "/note/$sId" ?>' method="POST" id="form_controller">
    <label for="note">NOTE: </label>
    <input type="number" name="note" id="note" min="0" max="5">

    <label for="comment">COMMENTAIRE: </label>
    <input type="text" name="comment" id="comment">
    
    &nbsp;

    <input type="submit" value="Noter">
</form>

</body>
</html>
