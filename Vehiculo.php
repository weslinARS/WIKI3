<?php


function excepcionPerson($error)
{
    echo $error->getMessage() . PHP_EOL;
}
set_exception_handler('excepcionPerson');
class Vehiculo
{
    private string $matricula;
    private string $marca;
    private string $modelo;
    private int $anioFabric;
    private string $nomPropie;
    private string $apellidoPropie;
    private string $DNI;
    private int $cantPasajero;

    public function __construct()
    {
        $this->anioFabric = 0;
        $this->marca = '';
        $this->modelo = '';
        $this->matricula = '';
        $this->nomPropie = '';
        $this->apellidoPropie = '';
        $this->DNI = '';
        $this->cantPasajero = 0;
    }
    private function esNumero($dato) // para evaluar que el dato ingresado sea correctamente un numero 
    {
        if (!is_numeric($dato)) {
            throw new Exception('debe ser numerico');
        } else {
            if ($dato < 1) {
                throw new Exception('debe ser un valor positivo');
            } else {
                return 1;
            }
        }
    }
    // ? METODOS SETTERS
    public function __call($name, $arguments)
    {
        if ($name = 'setPropietario') {
            if (count($arguments) == 1) {
                $this->nomPropie = $arguments[0];
            }
            if (count($arguments) == 2) {
                $this->nomPropie = $arguments[0];
                $this->apellidoPropie = $arguments[1];
            }
            if (count($arguments) == 3) {
                $this->nomPropie = $arguments[0];
                $this->apellidoPropie = $arguments[1];
                $this->DNI = $arguments[2];
            }
        }
    }
    public function setPropiedades($marca, $model, $matric, $anio)
    {
        $this->marca = $marca;
        $this->modelo = $model;
        $this->matricula = $matric;
        if ($this->esNumero($anio) == 1) {
            $this->anioFabric = $anio;
        }
    }
    public function set_matricula(string $matr)
    {
        $this->matricula = $matr;
    }
    public function set_marca(string $Marca)
    {
        $this->marca = $Marca;
    }
    public function set_modelo(string $Modelo)
    {
        $this->modelo = $Modelo;
    }
    public function set_anio($anio) // Función set con restriciones 
    {
        if ($this->esNumero($anio) == 1) {
            $this->anioFabric = $anio;
        }
    }
    function set_CantPasajero($cantPasajero)
    {
        if ($this->esNumero($cantPasajero) == 1) {
            $this->cantPasajero = $cantPasajero;
        }
    }
    // ? METODOS GETTERS
    public function get_matricula()
    {
        echo "matricula -> " . $this->matricula . "<br>";
    }
    public function get_marca()
    {
        echo "Marca -> " . $this->marca . "<br>";
    }
    public function get_modelo()
    {
        echo "Modelo -> " . $this->modelo . "<br>";
    }
    public function get_anio()
    {
        echo "Año de fabricación -> " . $this->anioFabric . "<br>";
    }
    public function get_propietario()
    {
        echo 'Nombre propietario: ' . ($this->nomPropie != '' ? $this->nomPropie : 'No añadido') . "<br>";
        echo 'Apellido Propietario: ' . ($this->apellidoPropie != '' ? $this->apellidoPropie : 'No añadido') . "<br>";
        echo 'DNI: ' . ($this->DNI != '' ? $this->DNI : 'No añadido') . "<br>";
    }
    //* METODOS GENERALES
    public function tipoTransporte(){
        if($this->cantPasajero != 0){
            if($this->cantPasajero <= 5){
                echo "Este vehiculo es privado <br>";
            }else{
                echo "Este vehiculo es público <br>";
            }
        }else{
            throw new Exception('No se definio la cantidad de pasajeros ');
        }
    }
    public function tipoVehiculo(){
        if($this->cantPasajero != 0){
            if($this -> cantPasajero <= 100){
                echo "AUTOBUS. <br>";
            }elseif($this->cantPasajero > 100 && $this->cantPasajero <= 555){
                echo "AVION. <br>";
            }
            elseif($this-> cantPasajero > 555 &&  $this->cantPasajero <= 30000){
                echo "BARCO. <br>";
            }
        }else{
            throw new Exception('No se definio la cantidad de pasajeros ');
        }
    }
}
$v1 = new Vehiculo;
$v1->set_marca("TOYOTA");
$v1->set_anio("2022");
$v1->tipoTransporte(); 
$v1->tipoVehiculo(); 
$v1->get_marca();
$v1->get_anio();
$v1->setPropietario('weslin', 'silva');
$v1->get_propietario();
