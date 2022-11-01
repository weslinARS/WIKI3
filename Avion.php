<?php
require_once './Vehiculo.php';
interface combustibles{
    const Tcombustibles = ['JET-A','JET-B','MOGAS','AVGAS','BIOQUEROSENO'];
}
class Avion extends Vehiculo implements combustibles{
    private int $cantTurbinas; 
    private float $velocidad = 0; 
    private string $tipoCombustible = ''  ; 
    public function __construct()
    {
        parent::__construct();
        $this->tipoCombustible = ''; 
        $this->cantTurbinas = 0 ; 
        $this->velocidad = 0; 
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
    
    public function set_cantTurbinas($turb){//*Para definir la cantidad de turbinas que tiene el avión
        if($this->esNumero($turb) ==  1  ){
            $this->cantTurbinas = $turb; 
        }
    }
    public function get_tipoCombustible(){
        echo "Tipo combustible : ".strtoupper($this->tipoCombustible)."<br>";
    }

    public function get_turbinas(){
        echo "Cantidad de turbinas  :".$this->cantTurbinas()."<br>"; 
    }
    public function getAtributosTotales(){
        parent::getAtributosTotales();
        $this->get_tipoCombustible(); 
        $this->get_turbinas(); 
    }

}

