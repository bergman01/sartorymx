<?php

include_once("lib/conexion.php");

include_once("lib/sql.injection.php"); 

session_start();

$user = $_SESSION['admin_user'];

$pwd = $_SESSION['token'];



/*if(isset($_SESSION['status2'])) {



			unset($_SESSION['status2']);



			if(isset($_COOKIE[session_name()])){ 



				setcookie(session_name(), '', time() - 1000);



				session_id();



				session_destroy();



		}

}*/



if ($user != '') {

if(isset($_SESSION['status2'])) {

			unset($_SESSION['status2']);

			if(isset($_COOKIE[session_name()])){ 

				setcookie(session_name(), '', time() - 1000);

				session_id();

				session_destroy();

		}
}



	$link=conectarse_servicios('dgti');



	$user=Formatear($user);



	$pwd=Formatear($pwd);



	$busca = "select estatus,nombre,usuario,id,permisos,visitas,email from usuarios where usuario = '$user' and password = '$pwd'";



	$resultado=mysql_query($busca, $link);



			if(mysql_num_rows($resultado)>0){



				$row = mysql_fetch_row($resultado);

				/*if($row[0] == 0)



					return "No tienes permiso para acceder al sistema.";*/



				$id_usuario = $row[3];

				

				$res="OK";



				/*if($user!=''){

                        session_set_cookie_params(86400); 

                        ini_set('session.gc_maxlifetime', 86400);

                        ini_set("session.cookie_lifetime","86400");	

                        session_start();



					    $_SESSION["expire"]=time();

					    $_SESSION['status'] = 'authorized';

						$_SESSION['servicios_user']=$user;

						$_SESSION['email_user'] =$row[6];

						$_SESSION['permiso'] = $row[4];

                        $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

					}*/



                 //if($res=="OK"){  

                         session_set_cookie_params(86400); 

                         ini_set('session.gc_maxlifetime', 86400);

                         ini_set("session.cookie_lifetime","86400");                                        

                         session_start();



                         $_SESSION["expire"]=time();

					     $_SESSION['status'] = 'authorized';

						 $_SESSION['servicios_user']=$user;

						 $_SESSION['email_user'] =$row[6];

						 $_SESSION['permiso'] = $row[4];

                         $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

					

                         $_SESSION['status2'] = 'authorized';

					     $_SESSION['admin_user'] = $user;

                         $_SESSION['token'] = $pwd;

					     $_SESSION['permiso'] = $row[4];

					     $visitas = $row[5] +1;

					     $_SESSION['email_user'] =$row[6];

                         $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

					

					$tranx="update usuarios set visitas=$visitas,ultimo_inicio=NOW() where id=$id_usuario";

					$rtranx=mysql_query($tranx, $link);

				//}

		/*return json_response(array(

            'success' => true,

            'message' => false,

        ));*/

			}

}



			

