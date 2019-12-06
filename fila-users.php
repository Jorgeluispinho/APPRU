<TABLE  id="table">
  <TR>
    <TH>Nome</TH>
    <TH>Matrícula</TH>
    <TH>Número de fichas</TH>
    <TH>Seu lugar na fila</TH>


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
      
   
<?php   
    }
}
?>



<?php 

$sql ="SELECT * FROM fila WHERE SerialNumber = $test";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
    {
?>
   
      
      <TD><?php echo $row['id']?></TD>
      
   </TR>
<?php   
    }
}
?>


</TABLE>