<?php
   ob_start();
   session_start();
?>

<html>
<head>
    <title>LOGIN</title>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Usuario: <input type="text" name="username">
    Contraseña: <input type="text" name="password">
    <input type="submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_username = 'usuario1';
    $_password = '123123123';

    if($username === $_username && $password === $_password) {
        echo 'Login';
        $_SESSION['usuario'] = $_username;
        header("Location: form.php");
    } else {
        echo 'Usuario o contraseña incorrecto.';
    }
}
?>

</body>
</html>