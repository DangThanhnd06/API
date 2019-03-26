<?php
    include("../../require_inc.php");
    $idhs = $_POST['idhs'];
    $sgv = $h->query("select school_id,class_gr from children where id=$idhs");
    $rgv = $h->fetch_array($sgv);
    $cl = $rgv['class_gr'];
    $sci = $rgv['school_id'];
    $_SESSION['classcl'] = $rgv['class_gr'];
    $_SESSION['schoolsci'] = $rgv['school_id'];
    $_SESSION['chthang'] = $_POST['thang'];
    if($idhs == 0){
        $msg .= '<p class="gt1"><a class="addcom" rel="1">'._add.'</a></p>
                 <p class="gt2"><a class="addcom" rel="2">'._add.'</a></p>
                 <p class="gt3"><a class="addcom" rel="3">'._add.'</a></p>
                 <p class="gt4"><a class="addcom" rel="4">'._add.'</a></p>
                 <p class="gt5"><a class="addcom" rel="5">'._add.'</a></p>';
    } else {
        // week 1
        $s1 = $h->query("select id,noidung from communication where sc_id=$sci and tenlop='$cl' and idhs=$idhs and thang=".$_SESSION['chthang']." and nam='".date('Y')."' and tuan=1");
        $n1 = $h->num_rows($s1);
        if($n1){
            $r1 = $h->fetch_array($s1);
            $nd = catchuoi($r1['noidung'],150);
            $ss1 = $h->query("select noidung from communication where id_reply=".$r1['id']);
            $ns1 = $h->num_rows($ss1);
            if($ns1) $clss1 = ' hass';
            else $clss1 = '';
            $msg .= '<p class="gt1"><a class="view" rel="'.$r1['id'].'" title="'._xemdaydu.'">'.$nd.'</a><a class="viewrep'.$clss1.'" rel="'.$r1['id'].'" title="'._viewreply.'">&nbsp;</a><a class="editcm" rel="'.$r1['id'].'" title="'._suanhanxet.'">&nbsp;</a><a class="delcm" rel="'.$r1['id'].'" title="'._xoanhanxet.'">&nbsp;</a></p>';
        } else {
            $msg .= '<p class="gt1"><a class="addcom" rel="1">'._add.'</a></p>';
        }
        // week 2
        $s2 = $h->query("select id,noidung from communication where sc_id=$sci and tenlop='$cl' and idhs=$idhs and thang=".$_SESSION['chthang']." and nam='".date('Y')."' and tuan=2");
        $n2 = $h->num_rows($s2);
        if($n2){
            $r2 = $h->fetch_array($s2);
            $nd = catchuoi($r2['noidung'],150);
            $ss2 = $h->query("select noidung from communication where id_reply=".$r2['id']);
            $ns2 = $h->num_rows($ss2);
            if($ns2) $clss2 = ' hass';
            else $clss2 = '';
            $msg .= '<p class="gt2"><a class="view" rel="'.$r2['id'].'" title="'._xemdaydu.'">'.$nd.'</a><a class="viewrep'.$clss2.'" rel="'.$r2['id'].'" title="'._viewreply.'">&nbsp;</a><a class="editcm" rel="'.$r2['id'].'" title="'._suanhanxet.'">&nbsp;</a><a class="delcm" rel="'.$r2['id'].'" title="'._xoanhanxet.'">&nbsp;</a></p>';
        } else {
            $msg .= '<p class="gt2"><a class="addcom" rel="2">'._add.'</a></p>';
        }
        // week 3
        $s3 = $h->query("select id,noidung from communication where sc_id=$sci and tenlop='$cl' and idhs=$idhs and thang=".$_SESSION['chthang']." and nam='".date('Y')."' and tuan=3");
        $n3 = $h->num_rows($s3);
        if($n3){
            $r3 = $h->fetch_array($s3);
            $nd = catchuoi($r3['noidung'],150);
            $ss3 = $h->query("select noidung from communication where id_reply=".$r3['id']);
            $ns3 = $h->num_rows($ss3);
            if($ns3) $clss3 = ' hass';
            else $clss3 = '';
            $msg .= '<p class="gt3"><a class="view" rel="'.$r3['id'].'" title="'._xemdaydu.'">'.$nd.'</a><a class="viewrep'.$clss3.'" rel="'.$r3['id'].'" title="'._viewreply.'">&nbsp;</a><a class="editcm" rel="'.$r3['id'].'" title="'._suanhanxet.'">&nbsp;</a><a class="delcm" rel="'.$r3['id'].'" title="'._xoanhanxet.'">&nbsp;</a></p>';
        } else {
            $msg .= '<p class="gt3"><a class="addcom" rel="3">'._add.'</a></p>';
        }
        // week 4
        $s4 = $h->query("select id,noidung from communication where sc_id=$sci and tenlop='$cl' and idhs=$idhs and thang=".$_SESSION['chthang']." and nam='".date('Y')."' and tuan=4");
        $n4 = $h->num_rows($s4);
        if($n4){
            $r4 = $h->fetch_array($s4);
            $nd = catchuoi($r4['noidung'],150);
            $ss4 = $h->query("select noidung from communication where id_reply=".$r4['id']);
            $ns4 = $h->num_rows($ss4);
            if($ns4) $clss4 = ' hass';
            else $clss4 = '';
            $msg .= '<p class="gt4"><a class="view" rel="'.$r4['id'].'" title="'._xemdaydu.'">'.$nd.'</a><a class="viewrep'.$clss4.'" rel="'.$r4['id'].'" title="'._viewreply.'">&nbsp;</a><a class="editcm" rel="'.$r4['id'].'" title="'._suanhanxet.'">&nbsp;</a><a class="delcm" rel="'.$r4['id'].'" title="'._xoanhanxet.'">&nbsp;</a></p>';
        } else {
            $msg .= '<p class="gt4"><a class="addcom" rel="4">'._add.'</a></p>';
        }
        // week 5
        $s5 = $h->query("select id,noidung from communication where sc_id=$sci and tenlop='$cl' and idhs=$idhs and thang=".$_SESSION['chthang']." and nam='".date('Y')."' and tuan=5");
        $n5 = $h->num_rows($s5);
        if($n5){
            $r5 = $h->fetch_array($s5);
            $nd = catchuoi($r5['noidung'],150);
            $ss5 = $h->query("select noidung from communication where id_reply=".$r5['id']);
            $ns5 = $h->num_rows($ss2);
            if($ns5) $clss5 = ' hass';
            else $clss5 = '';
            $msg .= '<p class="gt5"><a class="view" rel="'.$r5['id'].'" title="'._xemdaydu.'">'.$nd.'</a><a class="viewrep'.$clss5.'" rel="'.$r5['id'].'" title="'._viewreply.'">&nbsp;</a><a class="editcm" rel="'.$r5['id'].'" title="'._suanhanxet.'">&nbsp;</a><a class="delcm" rel="'.$r5['id'].'" title="'._xoanhanxet.'">&nbsp;</a></p>';
        } else {
            $msg .= '<p class="gt5"><a class="addcom" rel="5">'._add.'</a></p>';
        }
    }
    echo $sci.';;;cach;;;'.$cl.';;;cach;;;'.$msg;
?>