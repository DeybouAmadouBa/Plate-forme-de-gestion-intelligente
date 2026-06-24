<?php
session_start();
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // requête SQL
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        // redirection selon le rôle
        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } elseif ($user['role'] == 'prof') {
            header("Location: prof.php");
        } else {
            header("Location: etudiant.php");
        }
        exit();

    } else {
        $message = "Email ou mot de passe incorrect";
    }
}
?><!DOCTYPE html><html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body><h1>Page de connexion</h1><?php if($message != ""){ ?><p style="color:red;"><?php echo $message; ?></p>
<?php } ?><form method="post"><input type="email" name="email" placeholder="Email" required>
<br><br>

<input type="password" name="password" placeholder="Mot de passe" required>
<br><br>

<button type="submit">Se connecter</button>

</form></body>
</html>