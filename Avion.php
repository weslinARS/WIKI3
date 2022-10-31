<?php
require_once './Vehiculo.php';
interface combustibles{
    const Tcombustibles = ['JET-A','JET-B','MOGAS','AVGAS','BIOQUEROSENO'];
}
class Avion extends Vehiculo implements combustibles{
    private int $cantTurbinas; 
    private string $tipo = 'Avión';
    private float $velocidad = 0; 
    private string $tipoCombustible = ''  ; 
    public function __construct()
    {
        parent::__construct();
        $this->tipoCombustible = ''; 
    }
    public function set_turbinas($turb){
        if($this->esNumero($turb) == 1 ){
            $this->cantTurbinas = $turb; 
        }
    }
    public function set_tipoCombustible($comb){
        foreach (combustibles::Tcombustibles as $combustible){
            if(strtoupper($comb) == $combustible){
                $this->tipoCombustible = $comb; 
                return $this ; 
            }
        }
        throw new Exception("No es combustible valido"); 
    }
    public function get_tipoCombustible(){
        echo "Tipo combustible : ".strtoupper($this->tipoCombustible)."<br>";
    }
}
$avion1 = new  Avion; 
$avion1->setPropietario('Weslin','silva','56874120');
$avion1->set_tipoCombustible("jet-a");
$avion1->get_propietario(); 
$avion1->get_tipoCombustible() ;
