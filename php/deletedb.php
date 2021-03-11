<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname='adminserver';
$conn=mysqli_connect($servername,$username,$password,$dbname);
$qry="SHOW DATABASES";
$databasesname=mysqli_query($conn,$qry);
$matches = array();
while($data=mysqli_fetch_row($databasesname))
{
foreach($data as $d)
{
    $regex = "/[a-zA-Z0-9]{26}/";
    preg_match($regex, $d,$matches);
    if($matches[0])
    {
      $deleteqry="drop database ".$d;
      if(mysqli_query($conn,$deleteqry))
      {
        echo 'Database ' .$d.' Deleted succesfully <br />';
      }

    }
}
}
?>
