<?php 
require_once "./Vehiculo.php";
require_once "./Avion.php";

$vehivulo1 = new Vehiculo; 
$vehivulo1->setPropiedades('TOYOTA','GR Corolla',2022);
$vehivulo1->setPropietario('Weslin','Silva','341265','LE2145');
$vehivulo1 -> set_CantPasajero(5);
$vehivulo1->getAtributosTotales();

$Avion1 = new Avion; 
$Avion1->setPropiedades('Lockheed Martin','HC-130',2015);
$Avion1->setPropietario('Copa Airlines');
$Avion1->set_cantTurbinas(-120);
$Avion1->set_CantPasajero(400);
$Avion1->set_tipoCombustible('Jet-A');
var_dump($Avion1);
$Avion1->getAtributosTotales(); 