<?php 
require 'assets/funciones.php';
include '../Controllers/dbConexion.php';
$permisos = ['Profesor', 'Administrador'];
permisos($permisos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./resource/mortarboard-sec.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/login.css?v=<?php echo time(); ?>">
    <!-- para la fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300&display=swap" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>SEC | Semestres</title>
    <style>
        body {
            /* al lado estaba - div */
            font-size: small !important;
            background-color: #ebecf1;
        }
    </style>
</head>
<body>
    <header class="header">
        <?php
        define('ROOT_PATH', __DIR__ . '\\');
        include ROOT_PATH . 'assets\nav_bar.php';
        if (isset($_GET['err'])) {
            include './error.php';
        } else {
        }
        ?>
    </header>
    <!-- Agregar opcion de activar y desactivar semestre, solo activar el que vaya a servir -->
    <div class="container mt-4 cart-info bg-white">
    <h1>Registro de Modificaciones y Eliminaciones de Calificacion</h1>
    <div class="table-responsive">
        
    <table class="table table-striped text-center">
        <!-- Si se trabaja cada semestre de cda ciclo con las fechas de inicio y fin entonces usamos el id que nos mandan
        desde la pagina de ciclos y obtenemos los semestres relacionados a ese ciclo -->
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Calificacion</th>
                <th>Materia</th>
                <th>Parcial</th>
                <th>Usuario Responsable</th>
                <th>Tipo</th>
                <th>Fecha de Modificacion</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
                $consulta = "SELECT registrocalificacion.id 'idreg', calificacion, materias.nombre 'mater', parcial.nombre 'par', usuario, tipo, fecha_modi FROM registrocalificacion INNER JOIN materias ON materias.id = idMateria INNER JOIN parcial ON parcial.id = idParcial;";
                $lista_sem = $conn->prepare($consulta);
                $lista_sem->execute();
                $lista_sem = $lista_sem->fetchAll();

                foreach ($lista_sem as $registro) {
                    echo '<tr>';
                        echo '<td>'.$registro['idreg'].'</td>';
                        echo '<td>'.$registro['calificacion'].'</td>';
                        echo '<td>'.$registro['mater'].'</td>';
                        echo '<td>'.$registro['par'].'</td>';
                        echo '<td>'.$registro['usuario'].'</td>';
                        echo '<td>'.$registro['tipo'].'</td>';
                        echo '<td>'.$registro['fecha_modi'].'</td>';
                        /* echo '<td> <a href="matricular.php">Calificaciones</a> <td>'; */
                    echo '</tr>';
                }
                
            ?>
                <!-- isset para verificar que exista la variable ver que se envio dle ciclo -->
        </tbody>
    </table>
    </div>
    </div>

    <div class="container mt-4 cart-info bg-white">
        <h1>Registro de las Actualizaciones de Calificacion</h1>
    <div class="table-responsive">
        
        <table class="table table-striped text-center">
            <!-- Si se trabaja cada semestre de cda ciclo con las fechas de inicio y fin entonces usamos el id que nos mandan
            desde la pagina de ciclos y obtenemos los semestres relacionados a ese ciclo -->
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Vieja Calificacion</th>
                    <th>Nueva Calificacion</th>
                    <th>Materia</th>
                    <th>Parcial</th>
                    <th>Usuario Responsable</th>
                    <th>Fecha de la Actualizacion</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    $consulta = "SELECT updatecalificacion.id 'idupd', oldcalificacion, newcalificacion, materias.nombre 'mater', parcial.nombre 'par', usuario, fecha FROM updatecalificacion INNER JOIN materias ON materias.id = idMateria INNER JOIN parcial ON parcial.id = idParcial;";
                    $lista_sem = $conn->prepare($consulta);
                    $lista_sem->execute();
                    $lista_sem = $lista_sem->fetchAll();
    
                    foreach ($lista_sem as $registro) {
                        echo '<tr>';
                            echo '<td>'.$registro['idupd'].'</td>';
                            echo '<td>'.$registro['oldcalificacion'].'</td>';
                            echo '<td>'.$registro['newcalificacion'].'</td>';
                            echo '<td>'.$registro['mater'].'</td>';
                            echo '<td>'.$registro['par'].'</td>';
                            echo '<td>'.$registro['usuario'].'</td>';
                            echo '<td>'.$registro['fecha'].'</td>';
                            /* echo '<td> <a href="matricular.php">Calificaciones</a> <td>'; */
                        echo '</tr>';
                    }
                    
                ?>
                    <!-- isset para verificar que exista la variable ver que se envio dle ciclo -->
            </tbody>
        </table>
        </div>
    </div>

    <?php
    include ROOT_PATH . "assets\\footer.php";
    ?>
</body>
</html>