<?php
include_once 'JuegoDados.php';

class Main {
    public $jugador1;
    public $jugador2;
    //crea un constructor para recibir los nombres y pasarlos a el main
    public function __construct($nombre1, $nombre2) {
      echo $this->jugador1 = "Primer jugador: " . $nombre1 . "<br>";
      echo $this->jugador2 = "Segundo jugador: " . $nombre2 . "<br>";
      
    }
  
    public function main(): void {
      // Crear un nuevo juego y elegir los nombres de los jugadores
      $juego = new JuegoDados($this->jugador1, $this->jugador2);
      // Iniciar el juego
      $juego->iniciarJuego();
      // Determinar el vencedor
      $vencedor = $juego->vencedor;
  
      if ($vencedor != null) {
        echo "<br>El ganador es el <b>" .$vencedor->nombre."</b>";
      } else {
        echo '¡El juego ha terminado en empate!';
      }
    }
  }
  
  $main = new Main($_POST["nombre1"], $_POST["nombre2"]);//recibe los datos del formularin con post
  $main->main();
  
  ?>
