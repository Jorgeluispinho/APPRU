<TABLE id='table'>
<TR>
    <TH>Nome</TH>
    <TH>ID do cartão</TH>
    <TH>Matrícula</TH>
    <TH>Data</TH>
    <TH>Entrada</TH>
    <TH>Saída</TH>
   
</TR>
<?php
session_start();

//$test = $_SESSION['id'];
//Connect to database
require'connectDB.php';

$seldate = $_SESSION["exportdata"];

$sql = "SELECT * FROM logs WHERE DateLog='$seldate' ORDER BY id DESC";
$result=mysqli_query($conn,$sql);


//$sql = "UPDATE users set ficha = ficha - 1 where SerialNumber = $test";
//mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0)
{

  while ($row = mysqli_fetch_assoc($result))
  {
?>
        <TR>
 
        <TD><?php echo $row['Name'];?></TD>
        <TD><?php echo $row['CardNumber'];?></TD>
        <TD><?php echo $row['SerialNumber'];?></TD>
        <TD><?php echo $row['DateLog'];?></TD>
        <TD><?php echo $row['TimeIn'];?></TD>
        <TD><?php echo $row['TimeOut'];?></TD>
        </TR>
<?php
  }
}
?>

</TABLE>