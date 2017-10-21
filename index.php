<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #contenedor{
		width:100%;
            }
        
            #cabecera {
		background:rgba(0,255,0,1.00);
                height: 100px;
                margin-bottom: 10px;
			
            }
            
            #cuerpo{
                background: #000000;
                width: 100%;
            }
            
            #cuerpoIzq{
                float: left;
                width: 24%;
                margin-right: 1%;
                height: 600px;
            }
            
            #cuerpoMedio{
                float: left;
                background: #ffff00;
                width: 50%;
                margin-right: 1%;
            }
            
             #cuerpoDer{
                float: right;
                width: 24%;
                height: 600px;
            }
            
            #amigos{
                background: #ccccff;
                float: left;
                width: 100%;
                height: 600px;
            }
            
            
            #estado{
                float: left;
                height: 200px;
                width: 100%;
                background: #ccffcc;
            }
            
            #historialEstados{
                float: bottom;
                background: #009999;
                width: 100%;
            }
            
            #chat{
                float: right;
                background: #cc6600;
                width: 100%;
                height: 600px;
            }
            
            
        </style>
    </head>
    <body>
        
        
        
        <div id="contenedor">
            <div id="cabecera">
                Cabecera
                 
                <?php

$errores = '';

// if ($_POST){
// echo $_POST ["nombre"];
// }

if (isset($_POST['submit'])){
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];




if (!empty($nombre)){
// $nombre = trim($nombre);
// $nombre = htmlspecialchars($nombre);
// $nombre = stripcslashes($nombre);

$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
echo "Tu nombre es: $nombre <br />";
}else {
	$errores .= 'Por favor agrega un nombre <br />';
}


if (!empty($correo)){
$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

if (!filter_var($correo, FIsLTER_VALIDATE_EMAIL)) {            //Si el navegador no detecta que el correo no es valido 
	$errores.='Por favor ingresa un correo valido <br />';     //(lo hace por defecto)
}else{
	echo "Tu correo es: $correo";
}

}else {
		$errores .= 'Por favor agrega un correo';
}

}
	
?>
                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type ="text" placeholder="Nombre:" name="nombre">
                    
                    <input type = "email" name="submit" placeholder="correo" >
		

                    <?php if (!empty($errores)): ?>
                    <div class ="error"> <?php echo $errores; ?></div>
                    <?php endif; ?>

                    <input type="submit" name="submit">

                </form>
                
            </div>
            
            <div id="cuerpo">
                <div id="cuerpoIzq">
                    <div id="amigos">Amigos</div>
                </div>
                
                <div id="cuerpoMedio">
                    <div id="estado">Estado</div>
                    <div id="historialEstados">Historial de estados</div>
                </div> 
                
                <div id="cuerpoDer">
                    <div id="chat">Chat</div>
                </div>    
            </div>
            
        </div>
        
        
        
    </body>
</html>
