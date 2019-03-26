<?php
    include("../../require_inc.php");
    $data['age'] = $_POST['cage'];
    $data['name_vn'] = str_replace("'","\'",trim($_POST['name_vn']));
    $data['name_en'] = str_replace("'","\'",trim($_POST['name_en']));
    $sm = $h->query("select max(sort) as maxsx from practise where age=".$data['age']);
    $rm = $h->fetch_array($sm);
    $data['sort'] = $rm['maxsx'] + 1;
    $data['hide'] = 1;
    
    $s = $h->query("select id from practise where age=".$data['age']." and (name_vn='".$data['name_vn']."' or name_en='".$data['name_vn']."')");
    $n = $h->num_rows($s);
    if($n) echo '2';
    else {
        $ss = $h->insert($data,"practise");
        $sc = $h->query("select id,name_vn,name_en from practise where age=".$data['age']." order by id desc");
        $rc = $h->fetch_array($sc);
        $nc = $h->num_rows($sc);
        if($nc%2==0) $cl = ' odd';
        else $cl = ' even';
        $id = $rc['id'];
        $name = $rc["name_$lang"];
        $msg = '<div class="cten'.$cl.'"><a class="cp" rel="'.$id.'">'.$name.'</a><a class="editpr" rel="'.$id.'">&nbsp;</a><a class="delpr" rel="'.$id.'">&nbsp;</a></div>';
        echo '1;;;'.$msg;
        
    } 
?>