<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
</head>
<body>
    

    </div>
    <form action='<?= "/note/$sId" ?>' method="POST" id="form_controller" style="height: 100vh;">
      

        <label for="note">Note</label>
        <input type="number" name="note" min="0" max="5" id="note">

        <label for="comment">Commentaire</label>
        <input type="text" name="comment" min="0" max="5" id="comment">

       

        <input type="submit" value="ENREGISTRER LA NOTE">
    </form>

    </body>
</html>