<?php
    include("../../require_inc.php");
    $data['ttdvtran'] = $_POST['ttdvtran'];
    $data['ttdvmat'] = $_POST['ttdvmat'];
    $data['ttdvma'] = $_POST['ttdvma'];
    $data['ttdvmui'] = $_POST['ttdvmui'];
    $data['ttdvcam'] = $_POST['ttdvcam'];
    $data['ttda'] = $_POST['ttda'];
    $data['hdt'] = $_POST['hdt'];
    $s = $h->insert($data,"h_ttrangda");
    if($s) echo 1;
?>