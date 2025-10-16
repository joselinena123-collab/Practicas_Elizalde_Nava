<?php
    $alumnos = ["Luis","Angel","Veronica","Joseline","Alitxel","Citlali","Julian","Iker","Elian","Osvaldo"];
    
    
    $calificaciones = [];
    $alumnosNP = [];
    $sumaCalif = 0;
    $totalAlumnos = 0;
    $aprobados = 0;
    $reprobados = 0;
    $peorCalif = 11;
    $alumnosPeorCalif = [];
    $areaOportunidad = [];
    
    foreach($alumnos as $alumno) {
        $calif = $_REQUEST["cbo" . $alumno];
        
        if($calif == "NP") {
            $alumnosNP[] = $alumno;
        } else {
            $califNumerica = intval($calif);
            $calificaciones[$alumno] = $califNumerica;
            $sumaCalif += $califNumerica;
            $totalAlumnos++;
            
            if($califNumerica >= 6) {
                $aprobados++;
            } else {
                $reprobados++;
            }
            
            if($califNumerica < $peorCalif) {
                $peorCalif = $califNumerica;
                $alumnosPeorCalif = [$alumno];
            } elseif($califNumerica == $peorCalif) {
                $alumnosPeorCalif[] = $alumno;
            }
            
            if($califNumerica == 6 || $califNumerica == 7) {
                $areaOportunidad[] = $alumno;
            }
        }
    }
    
    $aprovechamiento = $totalAlumnos > 0 ? round($sumaCalif / $totalAlumnos, 2) : 0;
    $porcentajeAprobados = $totalAlumnos > 0 ? round(($aprobados / $totalAlumnos) * 100, 2) : 0;
    $porcentajeReprobados = $totalAlumnos > 0 ? round(($reprobados / $totalAlumnos) * 100, 2) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas del Grupo</title>
</head>
<body>
    <h1>Estadísticas del Grupo</h1>
    
    <h2>Aprovechamiento General</h2>
    <p><strong><?php echo $aprovechamiento; ?></strong></p>
    
    <hr>
    
    <h2>Porcentaje de Aprobados y Reprobados</h2>
    <p><strong>Aprobados:</strong> <?php echo $porcentajeAprobados; ?></p>
    <p><strong>Reprobados:</strong> <?php echo $porcentajeReprobados; ?> </p>
    
    <hr>
    
    <h2>Peor Calificación</h2>
    <p><strong><?php echo $peorCalif < 11 ? $peorCalif : 'N/A'; ?></strong></p>
    <?php if(count($alumnosPeorCalif) > 0): ?>
    <p><strong>Alumno(s) con esta calificación:</strong></p>
    <ul>
        <?php foreach($alumnosPeorCalif as $alumno): ?>
        <li><?php echo $alumno; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <hr>
    
    <h2>Alumnos en "Área de Oportunidad"</h2>
    <?php if(count($areaOportunidad) > 0): ?>
    <ul>
        <?php foreach($areaOportunidad as $alumno): ?>
        <li><?php echo $alumno; ?> - Calificación: <?php echo $calificaciones[$alumno]; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>No hay alumnos en área de oportunidad</p>
    <?php endif; ?>
    
    <hr>
    
    <?php if(count($alumnosNP) > 0): ?>
    <h2>Alumnos sin calificación (NP)</h2>
    <ul>
        <?php foreach($alumnosNP as $alumno): ?>
        <li><?php echo $alumno; ?></li>
        <?php endforeach; ?>
    </ul>
    <hr>
    <?php endif; ?>
    
    <br>
    <a href="formulario_calificaciones.php">Volver a capturar calificaciones</a>
</body>
</html>