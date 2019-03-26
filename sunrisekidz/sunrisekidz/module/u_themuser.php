<?php
    include("../require_inc.php");
    $data['hoten'] = str_replace("'","\'",trim($_POST['hoten']));
    $data['username'] = str_replace("'","\'",trim($_POST['username']));
    $data['password'] = mahoa(trim($_POST['password']));
    $data['quyen'] = $_POST['quyen'];
    if($data['quyen'] == 3) $data['sc'] = 0;
    else $data['sc'] = $_POST['sc'];
    $data['kichhoat'] = $_POST['kichhoat'];
    $s = $h->insert($data,"admin");
    if($s){
        $msg = "1;;;";
        $ss = $h->query("select * from admin order by id desc");
        $ruh = $h->fetch_array($ss);
        $msg .= '<tr style="border:1px solid #ccc;margin:5px 0;">';
        $msg .= '  <td style="text-align:center;">'.$ruh['hoten'].'</td>';
        $msg .= '  <td style="text-align:center;">'.$ruh['username'].'</td>';
        if($ruh['quyen'] == '2') $qu = 'QLCS';
        else $qu = 'QLCM';
        $msg .= '  <td style="text-align:center;">'.$qu.'</td>';
        $msg .= '  <td style="text-align:center;">'.$ruh['tgdangnhap'].'</td>';
        if($ruh['kichhoat'] == 1) $khoat = '<a class="kichhoat" rel="'.$ruh['id'].'" style="cursor:pointer;"><img src="img/check.png" alt="Active" /></a>';
        else $khoat = '<a class="chuakichhoat" rel="'.$ruh['id'].'" style="cursor:pointer;"><img src="img/notcheck.png" alt="Unactive" /></a>';
        $msg .= '<td style="text-align:center;" id="khota'.$ruh['id'].'">'.$khoat.'</td>'; 
        $msg .= '<td style="text-align:center;"><a class="suauser" style="cursor:pointer;" rel="'.$ruh['id'].'"><img src="img/edit.png" alt="Edit" /></a></td>';
        $msg .= '<td style="text-align:center;"><a class="changepass" style="cursor:pointer;" rel="'.$ruh['id'].'">'._thaydoi.'</a></td>';
        $msg .= '</tr>';
    }
    echo $msg;
?>