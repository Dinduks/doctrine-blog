<?php 

// charger le fichier de config
require_once(__DIR__ . '/config/bootstrap.php');

// donner un titre à la page
$pageTitle = "Page d'accueil";

// afficher le header
require_once(__DIR__ . '/templates/header.php');

$posts = $em->getRepository('Post')->findAll();
?>

<article style="margin-bottom:4em;">
    <?php foreach ($posts as $i=>$post) : ?>
    <h1><?php echo $post->getTitle() ?></h1>
    <p><?php echo nl2br($post->getBody()) ?></p>
    <hr />
    <?php endforeach; ?>
</article>

<?php
// afficher le footer
require_once(__DIR__ . '/templates/footer.php');