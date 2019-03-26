<?php
    include("../require_inc.php");
    $user = killInjection(trim($_REQUEST['user']));
    $matkhau = mahoa(killInjection(trim($_POST['matkhau'])));
    $s = $h->query("select id,id_gv,matkhau from h_hocsinh where user='$user' and kichhoat=1");
    $n = $h->num_rows($s);
    if(!$n) $xd = 1;
    else {
        $flag = 0;
        while($r = $h->fetch_array($s)){
            $mk = $r['matkhau'];
            if($mk === $matkhau){
                $_SESSION['loginchame'] = $r['id'];
                $_SESSION['userchame'] = $user;
                $_SESSION['idgv'] = $r['id_gv'];
                $flag = 1;
                $xd = 3;
                break;
            }
        }
        if($flag == 0) $xd = 2;     
    }
    echo $xd;
    
?>