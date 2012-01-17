<?php 

require_once(__DIR__ . '/config/bootstrap.php');

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}

if ($_POST) {
    $category = new Category();
    $category->setName($_POST['name']);

    $em->persist($category);
    $em->flush();
    
    header('Location: /index.php');
}

$pageTitle = "Nouvelle catégorie";
require_once(__DIR__ . '/templates/header.php');
?>

<form action="" method="POST">
    <p>
        <label>Nom</label>
        <input type="text" name="name" id="name" value="" />
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Ajouter" />
    </p>
</form>

<?php
require_once(__DIR__ . '/templates/footer.php');