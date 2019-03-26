<?php
    include("../../require_inc.php");
    $ft = str_replace("'","\'",trim($_POST['ft']));
    $s = $h->query("select id,father_name,father_number,father_email,father_address,father_img from children where father_name like '".$ft."%'");
    $n = $h->num_rows($s);
    if($n){
        while($r = $h->fetch_array($s)){
            echo '<p><a class="choosefather" rel="'.$r['id'].'">'.$r['father_name'].'</a></p>';
        }
    }
?>