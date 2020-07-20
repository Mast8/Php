<?php
    session_start();
    require_once '../conn.php';
    require_once '../geters.php';
    
    include 'controldocente.php';
    

    if(isset($_POST['registrar'])){

        // Consulta para comprobar si el correo electrónico ya existe.
        $checkEmail = "SELECT * FROM usuario WHERE CORREO = '$_POST[email]' ";
        // Variable $result hold the connection data and the query
        $result = $conn-> query($checkEmail);
        // Variable $count hold the result of the query
        $count = mysqli_num_rows($result);

        
        if ($count == 1) {
            print "<script>alert(\"Ese correo ya esta registrado.\");window.location='formaux.php';</script>";
        } else {
            $docente = $_SESSION['idD'];
            $nombres = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $codaux = $_POST['cod_aux'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            //$materia = $_POST['materia'];
            $tipo = $_POST['Cbousuario'];
            $sqll1 = "SELECT COD_DOCENTE FROM docente WHERE ID_USUARIO=$docente";
            $res1 = mysqli_query($conn, $sqll1);
            $doc = mysqli_fetch_assoc($res1);
            //$doc = obtenerdoc($docente);
            $codoc = $doc['COD_DOCENTE'];
            registrarDatos($nombres, $apellidos, $codaux, $direccion, $telefono, $email, $password, $tipo, $conn, $docente, $codoc);
        }

    }
    function registrarDatos($nombres, $apellidos, $codaux, $direccion, $telefono, $email, $password, $tipo, $conn, $docente, $codoc){
        if(!empty($nombres) and !empty($apellidos) and !empty($codaux) and !empty($direccion) and !empty($telefono) and !empty($email) and !empty($password)){
            registrarAuxiliar($nombres, $apellidos, $codaux, $direccion, $telefono, $email, $password, $tipo, $conn, $docente, $codoc);
        }
    }
    //obtener codauxiliar y enviar
    function registrarAuxiliar($nombres, $apellidos, $codaux, $direccion, $telefono, $email, $password, $tipo, $conn, $docente, $codoc){
        
        // La función password_hash () convierte la contraseña en un hash antes de enviarla a la base de datos
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        
        // Consulta para enviar hash de nombre, correo electrónico y contraseña  y demas datos a la base de datos
        $query = "INSERT INTO usuario (NOMBRES, APELLIDOS, DIRECCION, TELEFONO,CORREO,PASSWORD,ID_ROL)
         VALUES ('$nombres', '$apellidos', '$direccion', '$telefono', '$email', '$passHash','$tipo')";

        if (mysqli_query($conn, $query)) {
                $usuario = obtenerdatos($email);
                $id_usu = $usuario['ID_USUARIO']; 

                //$dirname = "estudiante/uploads/".$id_usu;
                  //mkdir($dirname);

                  $query = "INSERT INTO auxiliar (ID_USUARIO, COD_AUXILIAR) VALUES ('$id_usu','$codaux')";
                  if(mysqli_query($conn, $query)){
                    $sql = "INSERT INTO `docente_auxiliar`(`ID_USUARIO`, `COD_AUXILIAR`, `DOC_ID_USUARIO`, `COD_DOCENTE`) VALUES ('$id_usu','$codaux','$docente','$codoc')";
                    if (mysqli_query($conn, $sql)) {
                        print "<script>alert(\"Se registro en el sistema.\");window.location='listar_auxiliar.php';</script>";
                    } else {
                        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                        print "<script>alert(\"No se pudo registrar.\")";
                    }
                    
                    //opcion no funcional !!!!!!!!!!!!!!!!!!!!!!!
                    //registrarDocAux($id_usu,$docente, $codoc, $codaux, $conn);
                    //print "<script>alert(\"Se registro en el sistema.\");window.location='login.php';</script>";
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    print "<script>alert(\"No se pudo registrar.\")";
                }   

        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }   
    }

    function registrarDocAux($docente, $codoc, $codaux, $conn){
        
        $sql = "INSERT INTO `docente_auxiliar`(`ID_USUARIO`, `COD_AUXILIAR`, `DOC_ID_USUARIO`, `COD_DOCENTE`) 
        VALUES ('$id_usu','$codaux','$docente','$codoc')";
        
        /*if(mysqli_query($conn, $sql)){
            print "<script>alert(\"Se creo el grupo exitosamente.\");window.location='vergrupo.php';</script>";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            print "<script>alert(\"No se pudo crear del grupo.\")window.location='formgrupt.php';</script>";
        }*/

    }
