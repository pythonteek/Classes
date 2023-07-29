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
    
    function get_course_name($id){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $class = "SELECT name FROM courses WHERE id=$id";
            $result = $conn->query($class);
            if ($result->num_rows > 0) {
                
                $row = $result->fetch_assoc();
                $name = $row['name'];
                
                return($name);
            } else {
                return(0);//No data!
            }

        }
    }//end get_course_name

        
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
            
            $class = "SELECT * FROM class";
            $result = $conn->query($class);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $course_id = $row['course_id'];
                    $faculty_id = $row['faculty_id'];
                    $name = $this->get_course_name($course_id);
                    $section = $row['section'];
                    $level = $row['level'];
                    $status = $row['status'];

                    array_push($curr, $id);
                    array_push($curr, $course_id);
                    array_push($curr, $faculty_id);
                    array_push($curr, $name);
                    array_push($curr, $section);
                    array_push($curr, $level);
                    array_push($curr, $status);
                    //etc...

                    array_push($resault, $curr);
                }
                
                return($resault);//array...
            } else {
                return(0);//No data!
            }

        }
    }//end see_class
    
    function see_activate_class(){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $class = "SELECT * FROM class WHERE status=1";
            $result = $conn->query($class);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $course_id = $row['course_id'];
                    $faculty_id = $row['faculty_id'];
                    $name = $this->get_course_name($course_id);
                    $section = $row['section'];
                    $level = $row['level'];
                    $status = $row['status'];

                    array_push($curr, $id);
                    array_push($curr, $course_id);
                    array_push($curr, $faculty_id);
                    array_push($curr, $name);
                    array_push($curr, $section);
                    array_push($curr, $level);
                    array_push($curr, $status);
                    //etc...

                    array_push($resault, $curr);
                }
                
                return($resault);//array...
            } else {
                return(0);//No data!
            }

        }
    }//end see_activate_class
    
    function see_class_random($num){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $class = "SELECT * FROM class ORDER BY RAND() LIMIT $num";
            $result = $conn->query($class);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $course_id = $row['course_id'];
                    $faculty_id = $row['faculty_id'];
                    $name = $this->get_course_name($course_id);
                    $section = $row['section'];
                    $level = $row['level'];
                    $status = $row['status'];

                    array_push($curr, $id);
                    array_push($curr, $course_id);
                    array_push($curr, $faculty_id);
                    array_push($curr, $name);
                    array_push($curr, $section);
                    array_push($curr, $level);
                    array_push($curr, $status);
                    //etc...

                    array_push($resault, $curr);
                }
                
                return($resault);//array...
            } else {
                return(0);//No data!
            }
        }
    }//end see_class_random

}
?>
