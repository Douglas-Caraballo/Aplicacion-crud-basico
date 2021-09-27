<?php

class UsuariosC{

    public function RegistrarUsuarioC(){
        if (isset($_POST["usuarioTR"])){
            $datosc= array("usuario"=>$_POST["usuarioTR"], "contraseña"=>$_POST["contraseñaTR"],
            "permiso"=>$_POST["permisoTR"]);

            $tablaBD="usuario";

            $respuesta= UsuariosM::RegistrarUsuarioM($datosc, $tablaBD);

            if($respuesta=="Bien"){
                header("location:index.php?ruta=exito");
            }else{
                echo "Error!!!";
            }
        }
    }

    public function RegistrarImagenC(){
        if (isset($_POST["usuarioIR"]) && $_POST["usuarioIR"] > 0){
            $datosc = array("usuario"=>$_POST["usuarioIR"]);
            echo "  fsdfsdfdsffs";
            print_r($_FILES["imagenIR"]);

            if($_FILES["imagenIR"]["error"]>0){
                echo "Error al cargar la imagen";
            }else{
                $permitido= array("image/png", "image/jpg", "image/jpeg");
                if(in_array($_FILES["imagenIR"]["type"],$permitido)){

                    $rutaimg= './files/'. $_POST["usuarioIR"].'/';
                    $archivo = $rutaimg.$_FILES["imagenIR"]["name"];

                    if(!file_exists($rutaimg)){
                        mkdir($rutaimg);
                    }
                    if(!file_exists($archivo)){
                        $resultado = @move_uploaded_file($_FILES["imagenIR"]["tmp_name"], $archivo);
                        if($resultado){
                            echo "Foto guardada";
                        }else{
                            echo "ERROOOR!!! NO SE PUDO GUARDAR";
                        }
                    }else{
                        echo "Archivo ya existe";
                    }

                }else{
                    echo "Archivo no permitido";
                }
            }
            $tablaBD = "Imagenes";

            $respuesta = UsuariosM::RegistrarImagenM($datosc, $tablaBD, $archivo);

            if($respuesta == "Bien"){
                header("location:index.php?ruta=exito");
            }else{
                echo "Error al guardar en la base de datos";
            }
        }
    }

    public function BuscarUsuariosC(){
        if(isset($_POST["UsuarioB"])){
            $datosc = array("usuario"=>$_POST["UsuarioB"]);
            $tablaBDprimary = "usuario";
            $tablaBDsecond = "Imagenes";

            $respuesta = UsuariosM::BuscarUsuariosM($datosc, $tablaBDprimary, $tablaBDsecond);

            foreach($respuesta as $key =>$value){
                echo '<div class="user-search">
                        <figure class="user-search__figure">
                            <img class="user-search__figure__img" src="'.$value["ruta"].'">
                        </figure>
                        <p class="user-search__name">'.$value["usuario"].'</p>
                    </div>';
            }
        }
    }

}