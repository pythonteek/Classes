<?php
include("db_connect.php");


class Classes{
    
    function save_class($data){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(104);
        }else{
            // Connected Successfuly!
            $douplicate = "...";
            $result = $conn->query($douplicate);
            if ($result->num_rows > 0) {
                // Douplicated Record!
                return(105);
            } else {
                $save_class = "...";
                if ($conn->query($save_class) === TRUE) {
                  return(1);// New record created successfully!
                } else {
                    //echo "Error: " . $save_class . "<br>" . $conn->error;
                    return(106);// Probmel in isertion!
                }
            }

        }
    }//end save class...

        
    function see_class(){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $doctor = "";
            $result = $conn->query($doctor);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $name = $row['name'];
                    //etc...
                   
                    array_push($curr, $id);
                    array_push($curr, $name);
                    //etc...

                    array_push($resault, $curr);
                }
                
                return($resault);//array...
            } else {
                return(0);//No data!
            }

        }
    }//end see_class
    
}
?>
