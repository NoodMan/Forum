<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add user</title>

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
    <form action="/user" method="POST" id="form_controller" style="height: 100vh;">

        <label for="name">NOM: </label>
        <input type="text" class="radius" name="name" id="name">

        <label for="email">EMAIL: </label>
        <input type="text" class="radius" name="email" id="email">

        <input type="submit" class="radius" value="ENREGISTRER">
    </form>
    </body>
</html>
