<?php
// Simulación de datos desde la base de datos
$ciudadesPorPais = array(
    1 => array("Ciudad 1A", "Ciudad 1B", "Ciudad 1C"),
    2 => array("Ciudad 2A", "Ciudad 2B", "Ciudad 2C"),
    // Agrega más ciudades aquí
);

if (isset($_GET['pais_id'])) {
    $paisId = $_GET['pais_id'];
    $ciudades = $ciudadesPorPais[$paisId];

    echo json_encode($ciudades);
}
?>
