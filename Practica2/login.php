<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST" action="inicio.php">
        <table>
            <tr>
                <td><label>User</label></td>
                <td><input type="text" name="txtUser" required></td>
            </tr>
            <tr>
                <td><label>pass</label></td>
                <td><input type="password" name="txtPass" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="checkbox" name="chkRecuerdame" value="1">
                    <label>Recuerdame</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Ingresar">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
