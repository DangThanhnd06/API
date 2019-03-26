<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $data['tungay'] = $_POST['tungay'];
    $data['denngay'] = $_POST['denngay'];
    $data['noidung'] = trim($_POST['noidungnx']);
    $noidung = trim($_POST['noidungnx']);
    /*if(str_word_count($noidung) > 250) echo '2';
    else {*/
        $s = $h->update($data,"communication"," where id=$id");
        // week 1
        $s1 = $h->query("select id,tuan from communication order by id desc");
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