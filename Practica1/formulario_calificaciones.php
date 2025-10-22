<?php
    $alumnos = ["Luis","Angel","Veronica","Joseline","Alitxel","Citlali","Julian","Iker","Elian","Osvaldo"];
    $calificaciones = ["0","1","2","3","4","5","6","7","8","9","10","NP"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PracticaCalificaciones</title>
</head>
<body>
    <h1>Mis alumnos</h1>
    <form method="POST" action="reporte_estadisticas.php">
    <table border>
        <tr>
            <th>Nombre</th>
            <th>Calificación</th>
        </tr>
        <?php  foreach($alumnos as $alumno):?>
        <tr>
            <td>
                <label><?php echo $alumno ?></label>
            </td>
            <td>
                <select name="cbo<?php echo $alumno ?>">
                    <?php foreach ($calificaciones as $calif): ?>
                    <option><?php echo $calif ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <input type="submit"></input>
</form>
</body>
</html>
