<?php
    include("../require_inc.php");
    $id = $_POST['id'];
        $msg = '<option value="0" selected>'._to.'</option>';
        $msg .= '<option value="2">'._teacher.'</option>';
        $msg .= '<option value="1">'._headteacher.'</option>';
        
        $msr = '<option value="0" selected>'._actdetail.'</option>';
        $msr .= '<option value="1">'._addnta.'</option>';
        $msr .= '<option value="2">'._addffc.'</option>';
        $msr .= '<option value="3">'._edittl.'</option>';
    echo $msg.';;;'.$msr;
?>