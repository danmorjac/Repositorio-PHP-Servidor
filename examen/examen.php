<?php
// Datos generales para la aplicación web:
$servidor = "127.0.0.1"; // "localhost"
$usuario_bd = "root"; // Usuario Administrador de MySQL
$clave_bd = ""; // Clave del Usuario Administrador de MySQL
$basedatos = "filmoteca";

// Definir la estructura de las tablas y los datos para insertar
$tablas = [
    'usuarios' => [
        'estructura' => 'usuario CHAR(15) PRIMARY KEY NOT NULL, clave CHAR(15) NOT NULL, tipo CHAR(15) NOT NULL',
        'registros' => [
            ['felipe', 'feli', 'registrado'],
            ['ana', 'anita', 'registrado'],
            ['joan', 'admin', 'administrador'],
        ],
    ],
    'opiniones' => [
        'estructura' => 'id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, usuario CHAR(15) NOT NULL, fechahora DATETIME NOT NULL, nombre CHAR(50) NOT NULL, opinion TEXT NOT NULL',
        'registros' => [
            [null, 'felipe', '2009-01-25 12:30:12', 'Blade Runner 2049', 'Buenos efectos especiales.\nAunque nada más...'],
            [null, 'ana', '2009-02-10 14:10:00', 'Matrix', 'Magnifica.\nLo mejor que he visto de Larry i Andy Wachowski'],
        ],
    ],
];

// Inicialmente intentaremos conectar con el servidor MySQL instalado en el servidor web.
$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);

if (!$conexion) {
    echo "ERROR: Imposible establecer conexión con el servidor (puede que esté desactivado o que no se encuentre en el servidor $servidor).<br>\n";
} else {
    echo "Conexión realizada con el servidor.<br>\n";

    // Intentamos crear la base de datos y seleccionarla para trabajar en ella.
    echo "Creando y seleccionando la base de datos $basedatos...<br>\n";
    $resultado = mysqli_query($conexion, "CREATE DATABASE IF NOT EXISTS $basedatos");
    $resultado = mysqli_select_db($conexion, $basedatos);

    if ($resultado) {
        echo "Base de datos $basedatos creada y seleccionada.<br>\n";

        // Procesar cada tabla
        foreach ($tablas as $nombreTabla => $infoTabla) {
            echo "Creando la tabla $nombreTabla...<br>\n";
            $sql_creartabla = "CREATE TABLE $nombreTabla (" . $infoTabla['estructura'] . ")";
            $resultado = mysqli_query($conexion, $sql_creartabla);

            if ($resultado) {
                echo "Tabla $nombreTabla creada.<br>\n";

                // Insertar registros en la tabla
                if (isset($infoTabla['registros']) && is_array($infoTabla['registros'])) {
                    $sql_insertarregistros = "INSERT INTO $nombreTabla VALUES ";

                    foreach ($infoTabla['registros'] as $registro) {
                        // Agregar comillas a los valores y tratar 'NULL' como NULL
                        $registro = array_map(function ($value) use ($conexion) {
                            return ($value === null) ? 'NULL' : "'" . mysqli_real_escape_string($conexion, $value) . "'";
                        }, $registro);

                        $sql_insertarregistros .= '(' . implode(',', $registro) . '),';
                    }
                    // Eliminar la coma extra al final
                    $sql_insertarregistros = rtrim($sql_insertarregistros, ',');

                    $resultado = mysqli_query($conexion, $sql_insertarregistros);

                    if ($resultado) {
                        echo "Registros insertados satisfactoriamente en la tabla $nombreTabla.<br>\n";
                    } else {
                        echo "ERROR: Imposible insertar registros iniciales en la tabla $nombreTabla (puede que ya existan esos registros o que no se tengan los permisos).<br>\n";
                    }
                }
            } else {
                echo "ERROR: Imposible crear la tabla $nombreTabla (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
            }
        }
    } else {
        echo "ERROR: Imposible seleccionar la base de datos $basedatos (puede que no exista o que no se tenga permiso para usarla).<br>\n";
    }

    // Cerrar la conexión con el servidor
    echo "Cerrando la conexión con el servidor...<br>\n";
    mysqli_close($conexion);
}

echo "Fin del programa.<br>\n";
?>