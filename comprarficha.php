<?php
session_start();

//Connect to database
require 'connectDB.php';
//**********************************************************************************************
//**********************************************************************************************
if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['login'])) {

      $ficha = $_POST['ficha'];
      
                          
      $sql = "UPDATE users SET ficha=? WHERE CardID=?";
      $result = mysqli_stmt_init($conn);

      mysqli_stmt_bind_param($result, "sdsi", $ficha);
      mysqli_stmt_execute($result);
      
      exit();
        
  }          
}

?>