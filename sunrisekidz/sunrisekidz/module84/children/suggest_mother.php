<?php
    include("../../require_inc.php");
    $ft = str_replace("'","\'",trim($_POST['ft']));
    $s = $h->query("select id,mother_name,mother_number,mother_email,mother_address,mother_img from children where mother_name like '".$ft."%'");
    $n = $h->num_rows($s);
    if($n){
        while($r = $h->fetch_array($s)){
            echo '<p><a class="choosemother" rel="'.$r['id'].'">'.$r['mother_name'].'</a></p>';
        }
    }
?>