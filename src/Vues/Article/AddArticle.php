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
    

    </div>
    <form action="/article" method="POST" id="form_controller" style="height: 100vh;">

        <label for="title">TITRE: </label>
        <input type="text" class="radius" name="title" id="title">

        <label for="summary">RESUMÉ: </label>
        <textarea  name="summary" class="radius" id="summary"></textarea>

        <label for="n_isbn">NUMERO ISNB </label>
        <input type="number" class="radius" name="n_isbn" min="0" id="n_isbn">

        <label for="author">AUTEUR</label>
        <select name="author" class="radius" id="author">
            <?php foreach ($aUser as $user) :?>
                    <option value="<?=$user->getId()?>"><?=$user->getName()?></option>
            <?php endforeach; ?>
        </select>

        <label for="editor">EDITEUR</label>
        <select name="editor" class="radius" id="editor">
            <?php foreach ($aUser as $user) :?>
                    <option value="<?=$user->getId()?>"><?=$user->getName()?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" class="radius" value="ENREGISTRER">
    </form>

    </body>
</html>