<?php
    include("../require_inc.php");
    $data['sb_id'] = $_POST['sb_id'];
    $data['lop_id'] = $_POST['lop_id'];
    $data['thang'] = $_POST['thang'];
    $data['tieude_vn'] = str_replace("'","\'",trim($_POST['tieude_vn']));
    $data['tieude_en'] = str_replace("'","\'",trim($_POST['tieude_en']));
    $ndvn = str_replace("<p>","",str_replace("'","\'",trim($_POST['noidung_vn'])));
    $data['noidung_vn'] = str_replace("</p>","",$ndvn);
    $nden = str_replace("<p>","",str_replace("'","\'",trim($_POST['noidung_en'])));
    $data['noidung_en'] = str_replace("</p>","",$nden);
    $data['ngaydang'] = date("Y-m-d");
    $data['nam'] = date("Y");
    $data['hienthi'] = 1;
    $s = $h->insert($data,"newsletter");
    if($s){
        $ss = $h->query("select id,tieude_vn,tieude_en,noidung_vn,noidung_en from newsletter order by id desc");
        $rs = $h->fetch_array($ss);
        $idd = $rs['id'];
        $ms = '<div class="eachnews">
                <p class="cten even"><a class="view" rel="'.$idd.'">'.$rs["tieude_$lang"].'</a><a class="editde" rel="'.$idd.'">&nbsp;</a><a class="dellde" rel="'.$idd.'">&nbsp;</a></p>
                <div class="ndd" id="nda'.$idd.'">'.$rs["noidung_$lang"].'</div>
              </div>';
        echo '1;'.$ms;
    }
?>