<?php
    include("../../require_inc.php");
    $data['sc_id'] = $_POST['sc_id'];
    $data['tenlop'] = $_POST['cl'];
    $idhs = $_POST['idhs'];
    $data['idhs'] = $_POST['idhs'];
    $sgv = $h->query("select teacher_id from children where id=$idhs");
    $rgv = $h->fetch_array($sgv);
    $data['idgv'] = $rgv['teacher_id'];
    $data['tuan'] = $_POST['tuan'];
    $tuan = $_POST['tuan'];
    $data['tungay'] = $_POST['tungay'];
    $data['denngay'] = $_POST['denngay'];
    $data['noidung'] = trim($_POST['noidungnx']);
    $noidung = trim($_POST['noidungnx']);
    $data['ngaycom'] = date("d/m/Y");
    $data['thang'] = $_SESSION['chthang'];
    $data['nam'] = date('Y');
    $data['id_reply'] = 0;
    /*if(str_word_count($noidung) > 250) echo '2';
    else {*/
        $s = $h->insert($data,"communication");
        // week 1
        $s1 = $h->query("select id from communication order by id desc");
        $n1 = $h->num_rows($s1);
        if($n1){
            $r1 = $h->fetch_array($s1);
            $nd = catchuoi($noidung,150);
            $msg .= '<a class="view" rel="'.$r1['id'].'" title="'._xemdaydu.'">'.$nd.'</a><a class="viewrep" rel="'.$r1['id'].'" title="'._viewreply.'">&nbsp;</a><a class="editcm" rel="'.$r1['id'].'" title="'._suanhanxet.'">&nbsp;</a><a class="delcm" rel="'.$r1['id'].'" title="'._xoanhanxet.'">&nbsp;</a>';
        } else {
            $msg .= '<a class="addcom" rel="'.$tuan.'">'._add.'</a>';
        }
        echo $msg;
    //}
?>