<?php

class Utilidades extends Model{
    function limpiar($limpio)
  			{
  				$limpio = htmlspecialchars($limpio); //quita caracteres de html
  				$limpio = trim($limpio); //quita espacios
  				$limpi0 = stripcslashes($limpio); //quitar barras invertidas
  				return $limpio;
  			}

        function limiteCaracteres($cadena, $caracterMaximo){
          $c = substr($cadena, 0, $caracterMaximo);
          return $c;
        }


        public function llenarCombo($tabla)
        {
            $this->query("select * from $tabla");
            $r = $this->resultSet();
            return $r;
        }

    public function llenar_combo_tiposregistros($renglon)
    {
        $this->query("select * from tipos_registros where renglon = :renglon");
        $this->bind(':renglon', $renglon);
        $r = $this->resultSet();
        return $r;
    }

    function verificar_session()
    {
        if(!isset($_SESSION['codigo_usuario']))
        {
              header('location:' . ROOT_PATH. "login");
        }
    }

    function cerrar_session()
    {
        if(isset($_POST['salir']))
        {
            session_destroy();
            header('location:' . ROOT_PATH. "login");
        }
    }

}


 ?>
