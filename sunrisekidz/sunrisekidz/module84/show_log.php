<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    if($id == 1) {
        $msg = '<option value="0">'._to.'</option>';
        $msg .= '<option value="2" selected>'._teacher.'</option>';
        $msg .= '<option value="1">'._headteacher.'</option>';
        
        $msr = '<option value="0">'._actdetail.'</option>';
        $msr .= '<option value="1">'._addnta.'</option>';
        $msr .= '<option value="2">'._addffc.'</option>';
        $msr .= '<option value="3" selected>'._edittl.'</option>';
    } else {
        $msg = '<option value="0">'._to.'</option>';
        $msg .= '<option value="2">'._teacher.'</option>';
        $msg .= '<option value="1" selected>'._headteacher.'</option>';
        
        $msr = '<option value="0">'._actdetail.'</option>';
        $msr .= '<option value="1">'._addnta.'</option>';
        $msr .= '<option value="2">'._addffc.'</option>';
        $msr .= '<option value="3" selected>'._edittl.'</option>';
    }
    echo $msg.';;;'.$msr;
?>

                                
                                
                                