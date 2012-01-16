<?php

require_once('./config/bootstrap.php');

$pageTitle = "S'enregister";
require_once('./templates/header.php');

if (isset($_SESSION['user'])) {
    header('Location: /index.php');
} 

if ($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = new User();
    $user->setEmail($email);
    $user->setUsername($username);
    $user->setPassword(md5($password));
    
    $em->persist($user);
    $em->flush();
    
    header('Location: /login.php');
}
?>

<form action="" method="post">
    <p>
        <label>Nom d'utilisateur</label>
        <input type="text" name="username" id="username" value="" />
    </p>
    <p>
        <label>Adresse email</label>
        <input type="text" name="email" id="email" value="" />
    <p>
        <label>Mot de passe</label>
        <input type="password" name="password" id="" value="" />
    </p>
    <p>
        <input type="submit" name="submit" id="" value="Inscription" />
    </p>
</form>

<?php
require_once('./templates/footer.php');