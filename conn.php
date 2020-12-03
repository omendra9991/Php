<html>
        <head>
            <style>
                .error {color: #FF0000;}
            </style>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        </head>
<body>  

<?php

$id=0;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serialize";
function addrow(){
    echo "hello";
}
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"."<br>";

$dataarray = []; 

$sql = "SELECT Name FROM data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        $dataarray[$id]=$row["Name"];
        // $id=$row["ID"];
        ?>
       <form action="" method="post" id="form">
        <div id="<?php echo $id; ?>"> <input type="text" name="name" value="<?php echo $row["Name"]?>"><?php if($id==($result->num_rows-1)) {?><span><button id="<?php echo "Add_$id" ; ?>" onclick="addrow(<?php echo $id ?>)"> Add</button></span><?php } else { ?><span><button id="<?php echo "Remove_$id" ; ?>" onclick="removeRow(<?php echo $id ?>)">Remove</button ></span></div><?php  } ?>
         <br>
      <?php
        $id++;
    }
     ?>


   </form>

<?php
  }?>
   
  
   
  
  
  
<script src="script.js"></script>
</body>
</html>
