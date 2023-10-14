<?php
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
include("bd.php");
$consultas = array(
    "1" => "SELECT * FROM empleados",
    "2" => "SELECT * FROM departamentos",
    "3" => "SELECT * FROM departamentos INNER JOIN empleados ON departamentos.codDepto = empleados.codDepto WHERE empleados.cargoE = 'Secretaria'",
    "4" => "SELECT empleados.nomEmp, empleados.salEmp FROM empleados",
    "5" => "SELECT * FROM empleados WHERE cargoE = 'Vendedor' ORDER BY nomEmp ASC",
    "6" => "SELECT departamentos.ciudad, COUNT(ciudad) FROM departamentos GROUP BY ciudad",
    "7" => "SELECT empleados.nomEmp, empleados.cargoE, empleados.salEmp FROM empleados ORDER BY salEmp DESC",
    "8" => "SELECT salEmp, comisionE FROM empleados WHERE codDepto = 2000 ORDER BY comisionE",
    "9" => "SELECT empleados.*, departamentos.nombreDpto,departamentos.ciudad FROM empleados INNER JOIN departamentos ON empleados.codDepto = departamentos.codDepto",
    "10" => "SELECT empleados.codDepto, empleados.nomEmp,empleados.salEmp, empleados.salEmp + 5000 FROM empleados WHERE codDepto = 3000 ORDER BY empleados.nomEmp ASC",
    "11" => "SELECT nomEmp, salEmp, comisionE FROM empleados WHERE comisionE > salEmp",
    "12" => "SELECT nomEmp, salEmp, comisionE FROM empleados WHERE comisionE <= salEmp*0.3",
    "13" => "SELECT empleados.nomEmp, empleados.cargoE, empleados.salEmp FROM empleados",
    "14" => "SELECT SUM(empleados.salEmp) FROM empleados WHERE empleados.nDIEmp > '19.709.802'",
    "15" => "SELECT empleados.nomEmp FROM empleados WHERE LEFT(empleados.nomEmp, 1) BETWEEN 'J' AND 'Z'",
    "16" => "SELECT empleados.nDIEmp, empleados.nomEmp , empleados.salEmp, empleados.comisionE, empleados.salEmp + empleados.comisionE FROM empleados WHERE empleados.comisionE > 5000 ORDER BY empleados.nDIEmp ASC",
    "17" => "SELECT empleados.nDIEmp, empleados.nomEmp , empleados.salEmp, empleados.comisionE, empleados.salEmp + empleados.comisionE FROM empleados WHERE empleados.comisionE = 0 ORDER BY empleados.nDIEmp ASC",
    "18" => "SELECT * FROM empleados WHERE empleados.nomEmp NOT LIKE '%MA%'",
    "19" => "SELECT AVG(empleados.salEmp) FROM empleados",
    "20" => "SELECT MIN(empleados.fecNac) FROM empleados",
    "21" => "SELECT empleados.nomEmp, MIN(empleados.salEmp) FROM empleados;",
    "22" => "SELECT COUNT(*) FROM empleados WHERE empleados.salEmp < 30000",
    "23" => "SELECT departamentos.nombreDpto, COUNT(departamentos.nombreDpto) FROM departamentos GROUP BY nombreDpto"
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $consulta = $data['consulta'];
    $result = $conn->query($consultas[$consulta]);
    $respuesta = [];
    $encabezados = [];
    while ($row = $result->fetch_assoc()) {
        $respuesta[] = $row;
    }
    while ($fieldInfo = $result->fetch_field()) {
        $encabezados[] = $fieldInfo->name;
    }
    header('Content-type: application/json');
    echo json_encode(array("consulta" => $consultas[$consulta], "encabezados" => $encabezados, "respuesta" => $respuesta));
}
