<?php
    include("../require_inc.php");
    $path = '../upload';
    move_uploaded_file($_FILES['fileat']['tmp_name'],$path."/".chuoianh($_FILES['fileat']['name']));
    $data['fileat'] = chuoianh($_FILES['fileat']['name']);
    $data['thang'] = $_SESSION['thangmo'];
    $data['nam'] = date("Y");
    $data['ngaydang'] = date("Y-m-d");
    if($_SESSION['quyenper'] == 1)
        $data['sb_id'] = $_SESSION['truongsc'];
    else 
        $data['sb_id'] = $_SESSION['schd'];
    $data['lop_id'] = $_SESSION['lopcl'];
    $s = $h->insert($data,"newsletter");
    echo '1';
?>