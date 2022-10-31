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
    public function __construct()
    {
        $this->anioFabric = 0 ; 
        $this->marca = ''; 
        $this->modelo = ''; 
        $this->matricula = ''; 
    }
    // ? METODOS SETTERS
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
        if (!is_numeric($anio)) {
            throw new Exception('debe ser numerico');
        } else {
            if ($anio < 1) {
                throw new Exception('debe ser un valor positivo');
            } else {
                $this->anioFabric = $anio;
            }
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
}
$v1 = new Vehiculo;
$v1->set_marca("TOYOTA");
$v1->get_marca();
$v1->set_anio(78);
