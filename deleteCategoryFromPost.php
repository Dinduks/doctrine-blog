<?php 

require_once(__DIR__ . '/config/bootstrap.php');

$postId = $_GET['post_id'];
$categoryId = $_GET['category_id'];

$post = $em->find('Post', $postId);
$category = $em->find('Category', $categoryId);

$post->getCategories()->removeElement($category);

$em->flush();

header('Location: /index.php');