<?php

header('Content-Type: application/json');
include('database.php'); 
// $sql = "UPDATE caters SET approved=1 WHERE name='".$var."'";




$aResult = array();

if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['functionname']) {
        case 'get_mobile_info':
           if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
               $aResult['error'] = 'Error in arguments!';
           }
           else {
            $name=$_POST['arguments'][0];
                        $sql = "select mobile,view_count from caters WHERE name='".$name."';";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $mobile=$row["mobile"];
                                    $view_count=$row["view_count"];
                                  }
                            $aResult['result'] = "successful";
                            $aResult['mobile'] = $mobile;
                            $view_count=(int)$view_count+1;
                            $sql1 = "update caters set view_count='".$view_count."'  where name='".$name."';";
                            if ($conn->query($sql1) === TRUE) {
                                $aResult['result'] = "successful";
                            }
                              
                        } else {
                            $aResult['result'] = "Not found";
                        }
                            
                }
            break;
        case 'login':
           if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
               $aResult['error'] = 'Error in arguments!';
           }
           else {
                        $sql = "select name from users WHERE email='".$_POST['arguments'][0]."' and  password='".$_POST['arguments'][1]."'";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            $aResult['result'] = "successful";
                            session_start();
                            $_SESSION['user_name']=$_POST['arguments'][0];    
                        } else {
                            $aResult['result'] = "Not found";
                        }
                            
                }
            break;
            case 'register':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                    $aResult['error'] = 'Error in arguments!';
                    $sql = "insert into users values (name) name='".$_POST['arguments'][0]."'";
                    
$sql = 'insert into users (name,password, mobile, address, city) values("'.$name.'","'.$password.'","'.$mobile.'","'.$address.'","'.$city.'");';
                }
                else {
                    $name = $_POST['arguments'][0];
                    $email = $_POST['arguments'][1];
                    $mobile = $_POST['arguments'][2];
                    $city = $_POST['arguments'][3];
                    $password = $_POST['arguments'][4];
                    $sql = 'insert into users (name,password, mobile, email, city) values("'.$name.'","'.$password.'","'.$mobile.'","'.$email.'","'.$city.'");';
                             if ($conn->query($sql) === TRUE) {
                                 $aResult['result'] = "successful";
                                 session_start();
                                 $_SESSION['user_name']=$name;  
                             } else {
                                 $aResult['result'] = "some error occured";
                             }
                                 
                     }
                 break;

            default:
           $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
           break;
    }

}

echo json_encode($aResult);


?>