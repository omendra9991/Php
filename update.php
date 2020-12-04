<?php

$id = 0;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serialize";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully" . "<br>";
$dataarray = [];
$counter=0;
// echo '<pre>';print_r($_POST);

foreach($_POST as $name => $value) {
    // Split the name into an array on each underscore.
  
   $data= $_POST["$name"];

   $dataarray[$counter]=$data;
   $counter++;

   $splitString = explode("_",$name);

    
   if ($splitString[0] == "Old")     {
        $sql = "UPDATE data SET Name='$data' WHERE ID='$splitString[1]'";
        if ($conn->query($sql) === TRUE) {
            echo nl2br("data updated . \n");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   
   }
   elseif($splitString[0] == "Remove"){
        $sql = "DELETE FROM data WHERE ID='$splitString[1]'"; 
        if ($conn->query($sql) === TRUE) {
            echo nl2br("data Deleted . \n");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   
    }   
    else{
        $sql = "INSERT INTO data (Name) VALUES ('$data')";
        if ($conn->query($sql) === TRUE) {
            echo "inserted";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }    
    }  
    
}

print_r($dataarray);
