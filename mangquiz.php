<?php
include_once 'database.php';
    
$sql = "UPDATE  quiz SET status='$_POST[status]', class='$_POST[class]' where dummybranch='$_POST[dummybranch]'";

if(mysqli_query($con,$sql))

header("refresh:1;url=dashboard.php?q=7");
else
echo "Not Updated";
?>