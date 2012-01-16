<?php 

require_once('./config/bootstrap.php');

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}


if (isset($_GET['id'])) {
    $post = $em->getRepository('Post')->findOneById($_GET['id']);
    $em->remove($post);
    $em->flush();
}

header('Location: /index.php');