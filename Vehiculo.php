<?php


function excepcionPerson($error) // funcion para mostar correctamente los errores en el proceso del llamado a los métodos de los objetos 
{
    echo $error->getMessage() . PHP_EOL;
}
set_exception_handler('excepcionPerson');
class Vehiculo // creacion de una superClase Vehículo
{
    // * declaración de los atributos  con el modificador de accesp private para la superclase Vehículo()
    private string $matricula;
    private string $marca;
    private string $modelo;
    private int $anioFabric;
    private string $nomPropie;
    private string $apellidoPropie;
    private string $DNI;
    private int $cantPasajero;

    //* definicion de un constructor para inicializar los atributos del objeto
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
    // * método privado para 
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
    public function __call($name, $arguments) // Establece las propiedades para el propietario del vehiculo utilizando sobrecarga de métodos
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
            if (count($arguments) == 4) {
                $this->nomPropie = $arguments[0];
                $this->apellidoPropie = $arguments[1];
                $this->DNI = $arguments[2];
                $this->matricula = $arguments[3];
            }
        }
    }
    public function setPropiedades($marca, $model, $anio) // método setter para las propiedades de un auto 
    {
        $this->marca = $marca;
        $this->modelo = $model;
        if ($this->esNumero($anio) == 1) {
            $this->anioFabric = $anio;
        }
    }
    public function set_matricula(string $matr) // método setter para la la propiedad matricula 
    {
        $this->matricula = $matr;
    }
    public function set_marca(string $Marca) // método setter para la propiedad marca del vehículo
    {
        $this->marca = $Marca;
    }
    public function set_modelo(string $Modelo)// método setter para la propiedad modelo  del vehículo
    {
        $this->modelo = $Modelo;
    }
    public function set_anio($anio) // Función set con restriciones 
    {
        if ($this->esNumero($anio) == 1) {
            $this->anioFabric = $anio;
        }
    }
    function set_CantPasajero($cantPasajero) //funcion setter para la cantidad de pasajeros con restricciones 
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
    public function get_CantPasajero()
    {
        echo "Cantidad de pasajeros : " . $this->cantPasajero;
    }
    public function getAtributosTotales()
    {
        echo "<hr>";
        $this->tipoVehiculo();
        echo "<h3 style = 'color: blue;'>Propietario</h3>";
        $this->get_propietario();
        echo "<h3 style = 'color: blue;'>Información Vehículo</h3>";
        $this->get_marca();
        $this->get_modelo();
        $this->get_anio();
        if ($this->matricula != '') {
            $this->get_matricula();
        }
        $this->tipoTransporte();
    }
    //* METODOS GENERALES
    public function tipoTransporte()
    {
        if ($this->cantPasajero != 0) {
            if ($this->cantPasajero <= 5) {
                echo "<span style='color : red ; '>Este vehiculo es privado</span> <br>";
            } else {
                echo "<span style='color : red ; '>Este vehiculo es público</span> <br>";
            }
        } else {
            throw new Exception('No se definio la cantidad de pasajeros ');
        }
    }
    public function tipoVehiculo()
    {
        if ($this->cantPasajero != 0) {
            if ($this->cantPasajero <= 5) {
                echo "<span style='color: tomato; '>Coche</span> <br>";
            } else if ($this->cantPasajero > 5 && $this->cantPasajero <= 100) {
                echo "<span style='color: tomato; '>Autobus</span> <br>";
            } elseif ($this->cantPasajero > 100 && $this->cantPasajero <= 555) {
                echo "<span style='color: tomato; '>Avión</span> <br>";
            } elseif ($this->cantPasajero > 555 &&  $this->cantPasajero <= 30000) {
                echo "<span style='color: tomato; '>Barco</span> <br>";
            }
        } else {
            throw new Exception('No se definio la cantidad de pasajeros ');
        }
    }
}
