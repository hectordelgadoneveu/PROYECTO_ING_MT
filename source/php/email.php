<?php
    //https://www.youtube.com/watch?v=TtKPhnJDIL0
    //VARIABLES DE SESION

    session_start();

    //$enviar= $_POST['submitButton'];
    //rescate de variables:
    $nombre = $_GET['name'];
    $asunto = $_GET['asunto'];
    $email = $_GET['email'];
    $mensaje = $_GET['mensaje_correo'];


    //metodo de envio de correo
    //if(isset($_POST['submit'])){
        if(!empty($_GET['name']) && !empty($_GET['asunto']) && !empty($_GET['email']) && !empty($_GET['mensaje_correo'])){
            //rescate de variables:
            $nombre = $_GET['name'];
            $asunto = $_GET['asunto'];
            $email = $_GET['email'];
            $mensaje = $_GET['mensaje_correo'];

            //construccion de correo:
            $header = "From: noreply@example.com" . "\r\n";
            $header.= "Reply-To: noreply@exmaple.com" . "\r\n";
            $header.= "Enviado desde PACKFILE- Ussers" . "\r\n";
            $header.= "X-Mailer: PHP/" . phpversion();

            $mensajecompleto = $mensaje . "\n Datos de Usuario: \n Nombre de usuario: ". $_SESSION['nombreUsuario'] . "\nEmail: " . $_SESSION['correoUsuario'];
            $asuntofinal = "PACK-FILE: " . $asunto;
            $mail = @mail($email,$asuntofinal,$mensajecompleto,$header);

            if($mail){
                echo "<script>alert('Gracias por enviarnos mensaje, un administrador se pondrá pronto en contacto contigo')</script>";
                echo "<script> setTimeout(\"location.href='../vistasusser/ayuda.php'\",100)</script>";
            }else{
                    //mensaje de alerta en caso de no hbaerse enviado correo
                echo '<script language = javascript>
                        alert("No se ha podido enviar el correo, intente mas tarde.")
                </script>';



                echo '<script language = javascript> 
                            window.location.href = "../vistasusser/ayuda.php";
                    </script>';
            }
        }else{

            //mensaje de alerta en caso de recbir variables vacias
            echo '<script language = javascript>
                    alert("No se ha podido enviar el correo debido a formulario")
            </script>';


            echo '<script language = javascript> 
                        window.location.href = "../vistasusser/ayuda.php";
                </script>';
        }
    //}

?>