<?php
class Dado {
    public $puntos;

    /**
     * Este método simula el lanzamiento de un dado, mediante la función random
     * y asignando el valor al atributo puntos
     */
    public function lanzar(){
        //Simular el lanzamiento
        $this->puntos = mt_rand(1,6);
    }
}

/*
//Ciclo de vida de objetos

//Crear objeto
$miDado = new Dado();
//Usar objeto
$miDado->lanzar();
echo "Puntos obtenidos: ". $miDado->puntos;
//Destruirlo
$miDado = null;
*/
?>

