<?php
header('Access-Control-Allow-Origin: *');
include("bd.php");
$consignas = array(
    "Obtener los datos completos de los empleados.",
    "Obtener los datos completos de los departamentos.",
    "Obtener los datos de los empleados y departamentos con cargo Secretaria.",
    "Obtener el nombre y salario de los empleados.",
    "Obtener los datos de los empleados vendedores, ordenado por nombre.",
    "Contar la cantidad de ciudades distintas de los departamentos.",
    "Obtener el nombre y cargo de todos los empleados, ordenado por salario de manera descendente.",
    "Listar los salarios y comisiones de los empleados del departamento 2000, ordenado por comisión.",
    "Listar todos los empleados con su departamento y la ciudad.",
    "Obtener el valor total a pagar que resulta de sumar a los empleados del departamento 3000 una bonificación de 5.000, en orden alfabético del empleado.",
    "Obtener la lista de los empleados que ganan una comisión superior a su sueldo.",
    "Listar los empleados cuya comisión es menor o igual que el 30% de su sueldo.",
    "Elabore un listado donde para cada fila, figure ‘Nombre’ y ‘Cargo’ antes del valor respectivo para cada empleado.",
    "Hallar la suma total de los salarios de aquellos empleados cuyo número de documento de identidad es superior al ‘19.709.802’.",
    "Muestra los empleados cuyo nombre empiece entre las letras J y Z (rango).",
    "Listar el salario, la comisión, el salario total (salario + comisión), documento de identidad del empleado y nombre, de aquellos empleados que tienen comisión superior a 5.000, ordenar el informe por el número del documento de identidad.",
    "Obtener un listado similar al anterior, pero de aquellos empleados que NO tienen comisión.",
    "Hallar los empleados cuyo nombre no contiene la cadena “MA”.",
    "Hallar el promedio de los salarios de todos los empleados.",
    "Hallar el empleado de mayor edad.",
    "Hallar el salario menor de los empleados.",
    "Contar la cantidad de empleados que ganen menos de 30000.",
    "Liste la cantidad de departamentos que existen utilizando group by."
);
$resultDepartamentos = $conn->query("SELECT * FROM departamentos");
$resultEmpleados = $conn->query("SELECT * FROM empleados");
$empleados = [];
$departamentos = [];

if ($resultEmpleados->num_rows > 0) {
    while ($row = $resultEmpleados->fetch_assoc()) {
        $empleados[] = $row;
    }
}

if ($resultDepartamentos->num_rows > 0) {
    while ($row = $resultDepartamentos->fetch_assoc()) {
        $departamentos[] = $row;
    }
}
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Clase 19</h1>
    <p class="text-center">Por alguna razon esto funciona en localhost pero no aca 😔 (la bd esta bien configurada y trae solo algunos), asi que en caso de que no cargue puse una imagen de la consulta 😃<br>
        Repo: <a href="https://github.com/argentina-programa-2/clase-19" target="_blank">clase 19</a> </p>

    <div class="buttons d-flex justify-content-center">
        <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#tablaEmpleados">
            Ver Tabla Empleados
        </button>
        <div class="modal fade" id="tablaEmpleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Empleados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-auto">
                            <thead class="table-dark">
                                <tr>
                                    <th class='text-center' scope="col">ID</th>
                                    <th class='text-center' scope="col">Nombre</th>
                                    <th class='text-center' scope="col">Sexo</th>
                                    <th class='text-center' scope="col">F. Nac.</th>
                                    <th class='text-center' scope="col">F. Incorp.</th>
                                    <th class='text-center' scope="col">Salario</th>
                                    <th class='text-center' scope="col">Comision</th>
                                    <th class='text-center' scope="col">Cargo</th>
                                    <th class='text-center' scope="col">JefeID</th>
                                    <th class='text-center' scope="col">Cod. Dpto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($empleados) > 0) {
                                    for ($i = 0; $i < count($empleados); $i++) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $empleados[$i]['nDIEmp'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['nomEmp'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['sexEmp'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['fecNac'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['fecIncorporacion'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['salEmp'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['comisionE'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['cargoE'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['jefeID'] . "</td>";
                                        echo "<td class='text-center'>" . $empleados[$i]['codDepto'] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#tablaDepartamentos">
            Ver Tabla Departamentos
        </button>
        <div class="modal fade" id="tablaDepartamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Departamentos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-auto">
                            <thead class="table-dark">
                                <tr>
                                    <th class='text-center' scope="col">Cod. Dpto</th>
                                    <th class='text-center' scope="col">Nombre</th>
                                    <th class='text-center' scope="col">Ciudad</th>
                                    <th class='text-center' scope="col">Cod. Director</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($departamentos) > 0) {
                                    for ($i = 0; $i < count($departamentos); $i++) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $departamentos[$i]['codDepto'] . "</td>";
                                        echo "<td class='text-center'>" . $departamentos[$i]['nombreDpto'] . "</td>";
                                        echo "<td class='text-center'>" . $departamentos[$i]['ciudad'] . "</td>";
                                        echo "<td class='text-center'>" . $departamentos[$i]['codDirector'] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="container">
        <div class="accordion" id="accordionExample">

            <?php for ($i = 0; $i < count($consignas); $i++) { ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $i + 1; ?>" aria-expanded="true" aria-controls="collapseOne">
                            Ejercicio <?php echo $i + 1; ?>
                        </button>
                    </h2>
                    <div id="collapseOne<?php echo $i + 1; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo $consignas[$i]; ?>
                            <form class="formConsulta <?php echo $i + 1; ?>" method="POST">
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRespuesta<?php echo $i + 1; ?>">
                                    Consultar
                                </button>
                            </form>
                            <div class="modal fade" id="modalRespuesta<?php echo $i + 1; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ejercicio <?php echo $i + 1; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="consulta-<?php echo $i + 1; ?>"></p>
                                            <div class="imagen-consulta-<?php echo $i + 1; ?>"></div>
                                            <table class="table m-auto">
                                                <thead class="table-dark">
                                                    <tr class="thead-<?php echo $i + 1; ?>">
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody-<?php echo $i + 1; ?>">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script async>
        const formConsulta = document.querySelectorAll(".formConsulta");
        formConsulta.forEach(async (form) => {
            form.addEventListener("submit", async (e) => {
                e.preventDefault();
                const consulta = e.target.classList[1];

                const res = await axios.post("./traerConsulta.php", {
                    consulta: consulta
                })
                const data = await res.data;
                console.log(data);
                if (data) {
                    const thead = document.querySelector(`.thead-${consulta}`)
                    const sql = document.querySelector(`.consulta-${consulta}`)
                    let tbody = document.querySelector(`.tbody-${consulta}`)
                    thead.innerHTML = ""
                    tbody.innerHTML = ""
                    sql.innerHTML = ""
                    sql.innerHTML = data.consulta
                    data.encabezados.forEach(head => {
                        thead.innerHTML += `<th class='text-center' scope="col">${head}</th>`
                    })
                    data.respuesta.forEach((resp, index) => {
                        let tbodyTemp = `<tr>`
                        data.encabezados.forEach(head => {
                            tbodyTemp += `<td class='text-center'>${resp[head]}</td>`
                        })
                        tbodyTemp += `</tr>`
                        tbody.innerHTML += tbodyTemp
                    })
                } else {
                    const div = document.querySelector(`.imagen-consulta-${consulta}`)

                    div.innerHTML = `<img src="./imagenes/${consulta}.png" />`
                }
            })
        })
    </script>
</body>

</html>