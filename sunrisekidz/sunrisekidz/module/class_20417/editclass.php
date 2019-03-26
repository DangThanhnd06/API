<?php
    include("../../require_inc.php");
    $id = $_POST['idtenlop'];
    $data['tenlop'] = str_replace("'","\'",trim($_POST['etenlop']));
    $sc = $h->query("select id from lop where tenlop='".$data['tenlop']."' and id!=$id");
    $n = $h->num_rows($sc);
    if($n) echo '2';
    else {
        $ss = $h->update($data,"lop"," where id=$id");
        echo '<a class="agea" rel="'.$data['tenlop'].'">'.$data['tenlop'].'</a><a class="editclass" rel="'.$id.';;,;;'.$data['tenlop'].'">&nbsp</a><a class="delclass" rel="'.$id.'">&nbsp;</a>';
    }   
?>