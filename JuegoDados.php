<?php
require_once 'Jugador.php';
require_once 'Dado.php';
require_once 'Jugada.php';

class JuegoDados {

    public int $cantidadJugadas;
    public int $marcadorJugador1;
    public int $marcadorJugador2;
    private bool $bandJugador;
    public Jugador $jugador1;
    public Jugador $jugador2;
    public Jugador $vencedor;
    public Dado $dado1;
    public Dado $dado2;

    public function __construct(string $nombreJugador1, string $nombreJugador2)
    {
        $this->jugador1 = new Jugador();
        $this->jugador1->nombre = $nombreJugador1;
        $this->jugador2 = new Jugador();
        $this->jugador2->nombre = $nombreJugador2;
    }

    public function elegirPrimerLanzador(): void
    {
        if (mt_rand(1, 2) == 1) {
            $this->bandJugador = true;
        } else {
            $this->bandJugador = false;
        }
    }

    public function iniciarJugada(): void
    {
        $jugadaActual = new Jugada();
        if ($this->bandJugador) {
            $jugadaActual->iniciarJugada($this->jugador1, $this->jugador2,
                    $this->dado1, $this->dado2);
        }
        else {
            $jugadaActual->iniciarJugada($this->jugador2, $this->jugador1,
                    $this->dado1, $this->dado2);
        }

        $this->marcadorJugador1 = $this->marcadorJugador1 + $this->jugador1->puntoGanado;
        $this->marcadorJugador2 = $this->marcadorJugador2 + $this->jugador2->puntoGanado;
    }

    public function iniciarJuego(): void
    {
        //Crear dados, inicializar variables
        $this->dado1 = new Dado();
        $this->dado2 = new Dado();

        $this->cantidadJugadas = 0;
        $this->marcadorJugador1 = 0;
        $this->marcadorJugador2 = 0;

        $this->elegirPrimerLanzador();

        //Ciclo infinito de juego
        do {
            $this->iniciarJugada();
            $this->cantidadJugadas++;
        } while( ($this->marcadorJugador1 != 5) && ($this->marcadorJugador2 != 5) );
        //Determina ganador
        $this->vencedor = $this->determinarVencedor();
    }

    public function determinarVencedor(): Jugador
    {
        //caso empate
        if (($this->marcadorJugador1 == 5) && ($this->marcadorJugador2 == 5))
            return null;

        //ganó el jugador 1
        if ($this->marcadorJugador1 == 5) {
                return $this->jugador1;
            }
            else { //ganó el jugador 1
                if ($this->marcadorJugador2 == 5) {
                    return $this->jugador2;
                }
            }
        return null;
    }

}





