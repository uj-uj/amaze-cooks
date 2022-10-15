<?php

header('Content-Type: application/json');
include('database.php'); 
// $sql = "UPDATE caters SET approved=1 WHERE name='".$var."'";




$aResult = array();

if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['functionname']) {
        case 'approve_vendor':
           if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
               $aResult['error'] = 'Error in arguments!';
               $sql = "UPDATE caters SET approved=1 WHERE name='".$_POST['arguments'][0]."'";
           }
           else {
                        $sql = "UPDATE caters SET approved=1 WHERE name='".$_POST['arguments'][0]."'";
                        if ($conn->query($sql) === TRUE) {
                            $aResult['result'] = "yay";
                        } else {
                            $aResult['result'] = "some error occured";
                        }
                            
                }
            break;
            case 'disapprove_vendor':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                    $aResult['error'] = 'Error in arguments!';
                    $sql = "UPDATE caters SET approved=0 WHERE name='".$_POST['arguments'][0]."'";
                }
                else {
                             $sql = "UPDATE caters SET approved=0 WHERE name='".$_POST['arguments'][0]."'";
                             if ($conn->query($sql) === TRUE) {
                                 $aResult['result'] = "yay";
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