<?php

require_once('./config/bootstrap.php');

$pageTitle = "Se connecter";
require_once('./templates/header.php');

if (isset($_SESSION['user'])) {
    header('Location: /index.php');
}

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = $em->getRepository('User')->findOneBy(array(
        'username' => $username,
        'password' => md5($password),
    ));
    
    if (is_null($user)) {
        $formErrors = 'Utilisateur non trouvé!';
    } else {
        $_SESSION['user'] = $user;
        header('Location: /index.php');
    }
}
?>

<p style="color:red;font-weight:bold;"><?php echo @$formErrors ?></p>

<form action="" method="POST">
    <p>
        <label>Nom d'utilisateur</label>
        <input type="text" name="username" id="" value="" />
    </p>
    <p>
        <label>Mot de passe</label>
        <input type="password" name="password" id="" value="" />
    </p>
    <p>
        <a href="/register.php" class="btn danger">S'inscrire</a>
        <input type="submit" name="submit" id="" value="Login!" 
               class="btn primary"/>
    </p>
</form>

<?php
require_once('./templates/footer.php');