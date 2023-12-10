
<?php
    
  
    $nombre = $_POST['nombre1'];     //lo referenciamos por el name del input
    

    if($nombre == ''){
        echo json_encode('Rellene el nombre, por favor.');
    } else {
        function getDatosJson (){
            return json_decode(file_get_contents(__DIR__ .'/data.json'), true); //traes un Array con Arrays de datos (Array multidimensional)
        }
        function getDatosByFirstName($nombre) {
            $datos = getDatosJson();
            $contador = 0;
            $flag = 0;
            while($contador < count($datos) && $flag != 1){
                foreach($datos as $dato){
                    if ($dato['first_name'] == $nombre){
                        $flag = 1;
                    } else {
                           $contador++;
                    }
                } 
            }
            if ($flag == 1){
                return json_encode('ERROR. El nombre no es correcto.');
            }else {
                return json_encode('NAME Correct');
            }
        }
        echo getDatosByFirstName($nombre);
    }

?>