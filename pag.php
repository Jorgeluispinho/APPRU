<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>APP RU - Compra de Fichas</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "add-users.php"
        }).done(function(data) {
        $('#User').html(data);
      });
    },3000);
  });
</script>

<script type="text/javascript">
    function geraBoleto() {
       $.ajax({
          url:'geraBoleto.php',
          complete: function (response) {
             alert(response.responseText);
        },
        error: function () {
            alert('Erro');
        }
    });  

    return false;
}
</script>

<script type="text/javascript">    
        
        $(document).ready(function(){
            //Quando o valor do campo mudar...
            $('.calc').keyup(function(){
                var quantidade = parseFloat($('#quantidade').val().replace(".", "").replace(",", ".")) || 0.00;

                //O total 
                var total = quantidade * 0.8;

                $('#total_val').val("R$" + number_format(total,2, ',', '.'));

            });
        });

    function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");}
        
    </script>
 
<style type="text/css">
body {background-image:url("image/ru1.jpg");background-repeat:no-repeat;background-attachment:fixed;
    background-position: top right;
    background-size: cover;}
header .head h1 {font-family:aguafina-script;text-align: center;color:#000;}
header .head img {float: left;}
header a {float: right;text-decoration: none;font-family:cursive;font-size:25px;color:red;margin:-60px 0px 0px 20px;padding-right: 100px}
a:hover {opacity: 0.8;cursor: pointer;}
.bod {background-color:#ddd; opacity: 0.7;border-collapse: collapse;width:100%;height:270px;padding-bottom:20px}
.opt {float: left;margin: 20px 80px 0px 20px;}
.opt input {padding:4px 0px 2px 6px;margin:4px;border-radius:10px;background-color:#ddd; color: black;font-size:16px;border-color: black}
.opt p {font-family:cursive;text-align: left;font-size:19px;color:#f2f2f2;}
.opt label {color:black;font-size:23px}
.opt label:hover {color:red;opacity: 0.8;cursor: pointer;}
.opt table tr td {font-family:cursive;font-size:19px;color:black;}
.opt #lo {padding:4px 8px;margin-left:28px;background-color:#00A8A9;border-radius:7px;font-size:15px}
.opt #up {padding:4px 8px;margin-left:28px;background-color:#00A8A9;border-radius:7px;font-size:15px}
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
      Compra de Fichas</h1>
    </div>
    <!-- <a href="view.php">Entrar na fila</a> -->
  </header>

<!-- <div class="bod">

    <div class="opt">
        <form action="user_insert.php" method="POST" >
        	<table>
        		<tr>
        			<td>Quantidade:</td>
        			<td><input type="number" min="0" name="quant" id="quantidade" oninput="this.value = Math.abs(this.value)" required></td>
        		</tr>
        		<tr>
              <td>Total a Pagar: </td>
        			<td><input style="width: 85px" type="text"  name="valortotal" id="total" ></td>
        		</tr>
        		<tr>
               <td><input type="submit" value="Comprar" name="compra" id="lo" onclick="geraBoleto()"></td>
            </tr>
        	</table>
        </form>

    </div>

</div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div id="DivOcultaBaixa" class="" >
       <div class="control-group span3">
          <div class="control span4" for="focusedInput">Quantidade:</div>
            <input class="input-medium focused span6 calc" name="quantidade" id="quantidade" type="number" oninput="this.value = Math.abs(this.value)" value="0"/>
       </div>
       <div class="control-group span3">
          <div class="control span4" for="focusedInput"><strong>TOTAL:</strong></div>
          <input type="text" id="total_val" style="background: #FFCC99; font-weight: bold;" name="total_val" class="input-medium focused span6 result" readonly="readonly" value="R$0"/>
       </div>
    </div>
    <input type="submit" value="Comprar" name="compra" id="lo" onclick="return geraBoleto();">
    <br><br>
    <strong>Suas Fichas: </strong> 
    <input type="text" id="fichas" name="fichas" readonly="readonly" value="0"/>

</body>
</html>