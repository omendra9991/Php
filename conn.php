<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

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

    $sql = "SELECT * FROM data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        ?>
        <form action="update.php" method="post" id="formdata">
            
        <?php
        while ($row = $result->fetch_assoc()) {
            $dataarray[$id] = $row["Name"];
            $unique_key= $row["ID"];;
           
    ?>
            
                <div id="div_<?php echo $id; ?>"> 

                    <input type="text" name="Old_<?php echo $unique_key ?>" id="<?php echo $id; ?>" value="<?php echo $row["Name"] ?>"><?php if ($id == ($result->num_rows - 1)) { ?>
                        <span><button type="button" id="<?php echo "Add_$id"; ?>" onclick="addrow(<?php echo $id ?>)"> Add</button></span></div>
                <?php } else { ?>
                            <span><button type="button" class="Removedata" id="<?php echo "Remove_$id"; ?>" onclick="removeRow(<?php echo $id ?>)">Remove</button></span></div>
                <?php  } ?>
            <br>
           
           
        <?php
            $id++;
        }
        ?>
            
       <?php
    } ?>

          
<script src="script.js"></script>
  
            
 <div> 
<div id="newData"> </div>

 <br><input type="submit"></div>
        </form>
       
</body>

</html>