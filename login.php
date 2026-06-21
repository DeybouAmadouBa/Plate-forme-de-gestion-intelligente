<?php
session_start();
include "db.php";

$message = "";

if(isset($_POST['email']) && isset($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['user'] = $email;

        header("Location: dashboard.php");
        exit();

    }else{

        $message = "Email ou mot de passe incorrect";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h1>Page de connexion</h1>

<?php if($message != ""){ ?>
<p style="color:red;"><?php echo $message; ?></p>
<?php } ?>

<form method="post">

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="password" placeholder="Mot de passe" required>
    <br><br>

    <button type="submit">Se connecter</button>

</form>

</body>
</html>