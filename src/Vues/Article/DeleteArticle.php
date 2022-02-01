<?php include __DIR__ . "/../Header.php"; ?>
<div> <?= $article->getTitle() ?> a bien été supprimé </div>
<div>Vous allez être redirigé ...</div>
<script>
    setTimeout(()=> {
        window.location.href = "/articles";
    }, 2000)
</script>
<?php include __DIR__ . "/../Footer.php";

