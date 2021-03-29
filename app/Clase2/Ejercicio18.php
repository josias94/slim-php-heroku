<?php
/*
Rivola Josias
Aplicación Nº 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.
*/
require("Ejercicio17.php");

class Garage{
    
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;
    
    function __construct($razSocial, $pxH = null){
        $this->_razonSocial = $razSocial;
        if($pxH != null){
            $this->_precioPorHora = $pxH;
        }
        else{
            $this->_precioPorHora = 15;
        }        
        $this->_autos = [];
    }
	
    function MostrarGarage(){
        echo ("Razon social: $this->_razonSocial<br>
               Precio por hora: $this->_precioPorHora<br><br>");
        foreach ($this->_autos as $i => $auto){
            echo("Auto $i:<br>");            
            echo(Auto::MostrarAuto($auto)."<br>");
        }
    }

    function Equals($auto){
        foreach ($this->_autos as $value){
            // if($auto->Equals($value))//Solo compara por marca
            if($auto === $value)
            {
                return true;
            }
        }
        return false;
    }

    function Add($auto){
        if(!$this->Equals($auto)){
            array_push($this->_autos, $auto);
        }
        else{
            echo "El auto ya esta en el garage<br>";
        }        
    }

    function Remove($auto){              
        if($this->Equals($auto)){            
            $i = array_search($auto, $this->_autos, true);
            if($i){
                unset($this->_autos[$i]);
            }                    
        }
        else{
            echo "El auto no esta en el garage<br>";
        } 
    }
}
?>