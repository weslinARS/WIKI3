<?php
require_once './Vehiculo.php';
interface combustibles{ // interfaz con los tipos de combustibles para un Avion()
    const Tcombustibles = ['JET-A','JET-B','MOGAS','AVGAS','BIOQUEROSENO'];
}
class Avion extends Vehiculo implements combustibles{ // sub clase Avion que hereda de la superclase e implementa la interfaz combustible 
    //* declaracion 
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
    public function set_tipoCombustible($comb){ // se tipo de combustibles con restricciones para validar la insercion correcta del dato
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

