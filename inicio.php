<?php
    $userCorrecto = "admin";
    $passCorrecto = "1234";
    $user = $_REQUEST["txtUser"];
    $pass = $_REQUEST["txtPass"];
    
    
    if($user == $userCorrecto && $pass == $passCorrecto) {
        if(isset($_REQUEST["chkRecuerdame"])) {
            setcookie("usuario", $user, time() + (86400 * 30));
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1>bienvenido</h1>
    <h2><?php echo $user; ?></h2>
    
    <br><br>
    <a href="login.php">Cerrar Sesión</a>
</body>
</html>

<?php
    } else {
        header("Location: error.php");
    }
?>