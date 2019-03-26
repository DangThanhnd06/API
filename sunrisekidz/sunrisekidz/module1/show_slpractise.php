<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select id,name_vn,name_en from practise where age=$id");
    $n = $h->num_rows($s);
    while($rs = $h->fetch_array($s)){
        echo '<option value="'.$rs['id'].'">'.$rs["name_$lang"].'</option>';       
    }
?>