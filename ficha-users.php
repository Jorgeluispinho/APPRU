<TABLE  id="table">
  <TR>
    <TH>Nome</TH>
    <TH>Matrícula</TH>
    <TH>Número de fichas</TH>
    <TH>ID do cartão</TH>

  </TR>
<?php 

session_start();
$test = $_SESSION['id'];

//Connect to database
require('connectDB.php');

$sql ="SELECT * FROM users WHERE SerialNumber = $test";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
    {
?>
   <TR>
      
      <TD><?php echo $row['username']?></TD>
      <TD><?php echo $row['SerialNumber']?></TD>
      <TD><?php echo $row['ficha']?></TD>

      <TD><?php echo $row['CardID'];
          if ($row['CardID_select'] == 1) {
              echo '<img src="imagens/che.png" style="margin-right: 60%; float: right;" width="20" height="20" title="The selected Card">';
          }
          else{
              echo '';
          }?>
      </TD>
      
   </TR>
<?php   
    }
}
?>
</TABLE>