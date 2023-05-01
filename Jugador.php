<?php
require_once 'Dado.php';

class Jugador {
    public string $nombre;
    public int $puntoGanado;

    public function lanzaDados(Dado $dado1, Dado $dado2): int
    {
        $dado1->lanzar();
        $dado2->lanzar();
        return ($dado1->puntos + $dado2->puntos);
    }
  
}
