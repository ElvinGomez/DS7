<?php
    session_start();
    if(isset($_SESSION["usuario"])) {
        $user =  $_SESSION["usuario"];
        if($user === '' || !$user) {
            header("Location: index.php");
        }
    }
?>

<body style="margin: 0; padding: 0">
    <div style="display: flex; justify-content: flex-end">
        <h1><?php echo $user ?></h1>
    </div>
    <div>
        <form method="post" action="result.php">
            Nombre: <input type="text" name="name">
            Apellido: <input type="text" name="lastname">
            Sueldo bruto: <input type="text" name="salary">
                <input type="submit">
        </form>
    </div>
</body>