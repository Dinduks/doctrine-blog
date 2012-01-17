<?php

require_once(__DIR__ . '/config/bootstrap.php');

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}

if ($_POST) { // si le formulaire est envoyé
    $id    = $_POST['id'];
    $title = $_POST['title'];
    $body  = $_POST['body'];
    
    $post = $em->find('Post', $_GET['id']);
    $post->setTitle($title);
    $post->setBody($body);
    
    $em->persist($post);
    $em->flush();
    
    header('Location: /index.php');
} else if (isset($_GET['id'])) { // si on ne fait que visiter la page
    $post = $em->find('Post', $_GET['id']);
} else {
    header('Location: /index.php');
}

$pageTitle = "Modifier l'article";
require_once(__DIR__ . '/templates/header.php');
?>

<h2>Modifier le contenu</h2>
<form action="" method="POST">
    <p>
        <label>Titre</label>
        <input type="title" name="title" id="title" value="<?php echo $post->getTitle() ?>" />
    </p>
    <p>
        <label>Contenu</label>
        <textarea name="body" cols="" rows="15"><?php echo $post->getBody() ?></textarea>
    </p>
    <p>
        <input type="hidden" name="id" value="<?php echo $post->getId() ?>" />
        <input type="submit" name="submit" id="submit" value="Éditer" class="btn primary" />
    </p>
</form>

<?php
require_once(__DIR__ . '/templates/footer.php');