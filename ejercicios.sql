/* 1.Obtener los datos completos de los empleados. */
SELECT * FROM empleados;
/* 2.Obtener los datos completos de los departamentos. */
SELECT * FROM departamentos;
/* 3.Obtener los datos de los empleados y departamentos con cargo ‘Secretaria’. */
SELECT * FROM departamentos INNER JOIN empleados ON departamentos.codDepto = empleados.codDepto WHERE empleados.cargoE = 'Secretaria';
/* 4.Obtener el nombre y salario de los empleados. */
SELECT empleados.nomEmp, empleados.salEmp FROM empleados;
/* 5.Obtener los datos de los empleados vendedores, ordenado por nombre. */
SELECT * FROM empleados WHERE cargoE = 'Vendedor' ORDER BY nomEmp ASC;
/* 6.Contar la cantidad de ciudades distintas de los departamentos. */
SELECT  departamentos.ciudad, COUNT(ciudad) FROM departamentos GROUP BY ciudad;
/* 7.Obtener el nombre y cargo de todos los empleados, ordenado por salario de manera descendente. */
SELECT empleados.nomEmp, empleados.cargoE, empleados.salEmp FROM empleados ORDER BY salEmp DESC;
/* 8.Listar los salarios y comisiones de los empleados del departamento 2000, ordenado por comisión. */
SELECT salEmp, comisionE FROM empleados WHERE codDepto = 2000 ORDER BY comisionE;
/* 9.Listar todos los empleados con su departamento y la ciudad. */
SELECT empleados.*, departamentos.nombreDpto,departamentos.ciudad FROM empleados INNER JOIN departamentos ON empleados.codDepto = departamentos.codDepto;
/* 10.Obtener el valor total a pagar que resulta de sumar a los empleados del 
departamento 3000 una bonificación de 5.000, en orden alfabético del empleado. */
SELECT empleados.codDepto, empleados.nomEmp,empleados.salEmp, empleados.salEmp + 5000 FROM empleados WHERE codDepto = 3000 ORDER BY empleados.nomEmp ASC;
/* 11.Obtener la lista de los empleados que ganan una comisión superior a su sueldo. */
SELECT nomEmp, salEmp, comisionE FROM empleados WHERE comisionE > salEmp;
/* 12.Listar los empleados cuya comisión es menor o igual que el 30% de su sueldo. */
SELECT nomEmp, salEmp, comisionE FROM empleados WHERE comisionE <= salEmp*0.3;
/* 13.Elabore un listado donde para cada fila, figure ‘Nombre’ y ‘Cargo’ antes del valor respectivo para cada empleado. */
SELECT empleados.nomEmp, empleados.cargoE, empleados.salEmp FROM empleados;
/* 14.Hallar la suma total de los salarios de aquellos empleados cuyo número de documento de identidad es superior al ‘19.709.802’. */
SELECT SUM(empleados.salEmp) FROM empleados WHERE empleados.nDIEmp > "19.709.802";
/* 15.Muestra los empleados cuyo nombre empiece entre las letras J y Z (rango). */
SELECT empleados.nomEmp FROM empleados WHERE LEFT(empleados.nomEmp, 1) BETWEEN 'J' AND 'Z';
/*  16.Listar el salario, la comisión, el salario total (salario + comisión), documento de identidad del empleado y nombre, de aquellos empleados 
que tienen comisión superior a 5.000, ordenar el informe por el número del documento de identidad.*/
SELECT empleados.nDIEmp, empleados.nomEmp , empleados.salEmp, empleados.comisionE, empleados.salEmp + empleados.comisionE FROM empleados WHERE empleados.comisionE > 5000 ORDER BY empleados.nDIEmp;
/* 17.Obtener un listado similar al anterior, pero de aquellos empleados que NO tienen comisión. */
SELECT empleados.nDIEmp, empleados.nomEmp , empleados.salEmp, empleados.comisionE, empleados.salEmp + empleados.comisionE FROM empleados WHERE empleados.comisionE = 0 ORDER BY empleados.nDIEmp;
/* 18.Hallar los empleados cuyo nombre no contiene la cadena “MA”. */
SELECT * FROM empleados WHERE empleados.nomEmp NOT LIKE '%MA%';
/* 19. Hallar el promedio de los salarios de todos los empleados. */
SELECT AVG(empleados.salEmp) FROM empleados;
/* 20. Hallar el empleado de mayor edad. */
SELECT MIN(empleados.fecNac) FROM empleados;
/* 21. Hallar el salario menor de los empleados. */
SELECT MIN(empleados.salEmp) FROM empleados;
/* 22. Contar la cantidad de empleados que ganen menos de 30000. */
SELECT COUNT(*) FROM empleados WHERE empleados.salEmp < 30000;
/* 23. Liste la cantidad de departamentos que existen utilizando group by. */
SELECT departamentos.nombreDpto, COUNT(departamentos.nombreDpto) FROM departamentos GROUP BY nombreDpto;