<?php 
	session_start();

	if(!isset($_SESSION['id'])){

		header("location: usuario.php");
		exit;
	}
?>

<?php 
  require_once 'usuarios.php';
  $u = new Usuario;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>APP RU - Logado</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "fila-users.php"
        }).done(function(data) {
        $('#User').html(data);
      });
    },3000);
  });
</script>

<style type="text/css">
body {background-image:url("imagens/ru1.jpg");background-repeat:no-repeat;background-attachment:fixed;
    background-position: top right;
    background-size: cover;}
header .head h1 {font-family:aguafina-script;text-align: center;color:#000;}
header .head img {float: left;}
header a {float: right;text-decoration: none;font-family:cursive;font-size:25px;color:red;margin:-60px 0px 0px 20px;padding-right: 100px}
a:hover {opacity: 0.8;cursor: pointer;}
.bod {background-color:#ddd; opacity: 0.7;border-collapse: collapse;width:100%;height:270px;padding-bottom:20px}
.bod a {float: right;text-decoration: none;font-family:cursive;font-size:25px;color:blue;margin:-28px 0px 0px 20px;padding-right: 100px}
.opt {float: left;margin: 100px 80px 100px 490px;}
.opt input {padding:4px 0px 2px 6px;margin:4px;border-radius:10px;background-color:#ddd; color: black;font-size:16px;border-color: black}
.opt p {font-family:cursive;text-align: left;font-size:19px;color:#f2f2f2;}
.opt label {color:black;font-size:23px}
.opt label:hover {color:red;opacity: 0.8;cursor: pointer;}
.opt table tr td {font-family:cursive;font-size:19px;color:black;}
.opt #lo {padding:4px 8px;margin-left:28px;background-color:#00A8A9;border-radius:7px;font-size:15px}
.opt #up {padding:4px 8px;margin-left:28px;background-color:#00A8A9;border-radius:7px;font-size:15px}
.opt a {float: right;text-decoration: none;font-family:cursive;font-size:25px;color:blue;margin:-60px 0px 0px 20px;padding-right: 100px}
a:hover {opacity: 0.8;cursor: pointer;}

#lo:hover{opacity: 0.8;cursor: pointer;background-color:red}
#up:hover{opacity: 0.8;cursor: pointer;background-color:green}

.car {font-family:cursive;font-size:19px;padding-top: 45px;margin: 10px}

.op input {border-radius:10px;background-color:#ddd; color: black;font-size:16px;padding-left:5px;margin:18px 0px 0px 10px;border-color: black}
.op button {margin:7px 0px 5px 82px}
.op button:hover {cursor: pointer;}

#table {font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;border-collapse: collapse;width:      100%;}
#table td, #table th {border: 1px solid #ddd;padding: 8px;opacity: 0.6;}
#table tr:nth-child(even){background-color: #f2f2f2;}
#table tr:nth-child(odd){background-color: #f2f2f2;opacity: 0.9;}
#table tr:hover {background-color: #ddd; opacity: 0.8;}
#table th {opacity: 0.6;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:         #00A8A9;color: white;}
   
</style>
</head>
<body>
  <header >
    <div class="head">
      <img src="imagens/uf.jpg" width="190" height="90">
      <h1>Restaurante Universitário<br>
      Você está logado</h1>
    </div>
    <a href="sair.php">Sair</a>
  </header>

<div class="bod">
   <a href="AreaPrivada.php">Voltar</a>
    <div class="opt">

        <form method="POST" >
        	<table>  

            <td>Confirme sua Matrícula:</td>
                <td><input type="number" placeholder="matrícula" name="Number"></td>
	           	
        		<tr>           	   
            	   <td><input type="submit" value="Entrar na fila"></td>
           	</tr>
           		

        	</table>
        </form>
    </div>
</div>

<?php 

	if(isset($_POST['Number'])){

    $Number = $_POST['Number'];

    if(!empty($Number)){

      $u->conectar("nodemculog", "localhost", "root", "");
      $u->entrar($Number);
        
    }else{
    	echo "Preencha todos os campos!";
    }
  }

    //  $u->conectar("nodemculog", "localhost", "root", "");
    //  $u->comprar($Number, $ficha);

 ?>

 <div id="User"></div>

</body>
</html>



