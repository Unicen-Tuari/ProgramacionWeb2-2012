<?php
define(ESPACIO, '&nbsp');
define(TAB, '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp');

include_once './clases/Empresa.php';
include_once './clases/EmpresaCapacitadora.php';
include_once './clases/EmpresaTextil.php';
include_once './clases/Perfil.php';
include_once './clases/Curso.php';
include_once './clases/Persona.php';
include_once './clases/Alumno.php';
include_once './clases/Curso.php';

$empresaCapacitadora = new EmpresaCapacitadora("Tupar Capacitaciones", 1);

$empresaTextil        = new EmpresaTextil("Tupar Textil", 1);


$cursoOrganizacionMetodos   = new Curso(0, "Organización y métodos");
$cursoSeguridadHigiene      = new Curso(1, "Seguridad e Higiene");
$cursoRepositor             = new Curso(2, "Repositor");
$cursoAtenciónClientes      = new Curso(3, "Atención a clientes");
$cursoTesoreria             = new Curso(4, "Tesoreria");
$cursoCajero                = new Curso(5, "Cajero/a");


$perfilRepositor = new Perfil(1, "Repositor");
$perfilRepositor->addCurso($cursoOrganizacionMetodos);
$perfilRepositor->addCurso($cursoSeguridadHigiene);
$perfilRepositor->addCurso($cursoRepositor);
  
$perfilRecepcion = new Perfil(2, "Recepción");
$perfilRecepcion->addCurso($cursoOrganizacionMetodos);
$perfilRecepcion->addCurso($cursoSeguridadHigiene);
$perfilRecepcion->addCurso($cursoAtenciónClientes);

$perfilCajas = new Perfil(3, "Cajero/a");
$perfilCajas->addCurso($cursoOrganizacionMetodos);
$perfilCajas->addCurso($cursoSeguridadHigiene);
$perfilCajas->addCurso($cursoAtenciónClientes);
$perfilCajas->addCurso($cursoCajero);

$perfilTesoreria = new Perfil(4, "Tesoreria");
$perfilTesoreria->addCurso($cursoOrganizacionMetodos);
$perfilTesoreria->addCurso($cursoSeguridadHigiene);
$perfilTesoreria->addCurso($cursoAtenciónClientes);
$perfilTesoreria->addCurso($cursoCajero);
$perfilTesoreria->addCurso($cursoTesoreria);

$empresaCapacitadora->addPerfil($perfilRepositor);
$empresaCapacitadora->addPerfil($perfilRecepcion);
$empresaCapacitadora->addPerfil($perfilCajas);
$empresaCapacitadora->addPerfil($perfilTesoreria);


$empresaTextil->addPerfil($perfilRepositor);

$empresaCapacitadora->listarPerfiles();
$empresaTextil->listarPerfiles();


$alberto = new Alumno(new Persona("Alberto N. Rodríguez", "16.848.457"));
$alberto->addPerfil($perfilRecepcion, "Certificado");
$alberto->addPerfil($perfilCajas, "Inscripto");

$maria = new Alumno(new Persona("Maria F. Perez", "16.111.123"));
$maria->addPerfil($perfilRecepcion, "Certificado");
$maria->addPerfil($perfilCajas, "Certificado");
$maria->addPerfil($perfilTesoreria, "Inscripto");


$empresaCapacitadora->addAlumno($alberto);
$empresaCapacitadora->addAlumno($maria);
$empresaCapacitadora->listarAlumnos();  

        
?>