<?php
    include("../require_inc.php");
    $sc = $_POST['sc'];
    $_SESSION['truongsc'] = $sc;
    $nam = date("Y");
    $sd = $h->query("select id,tieude_vn,tieude_en,noidung_vn,noidung_en from newsletter where thang='".$_SESSION['thangmo']."' and nam='$nam' and sb_id=".$_SESSION['truongsc']." and lop_id='".$_SESSION['lopcl']."' and tieude_vn!='' order by ngaydang desc");
    $id = 0;
    $msg = '';
    $msf = '';
    $msa = '';
    while($rd = $h->fetch_array($sd)){
        $idd = $rd['id'];
        if($id==0) {
            $cla = ' act';
        } else $cla = '';
        if($id%2==0) $cld = ' even';
        else $cld = ' odd';
        $dell = $rd["tieude_$lang"];
        $msg .= '<div class="eachnews">';
        $msg .= '   <p class="cten'.$cld.$cla.'"><a class="view" rel="'.$idd.'">'.$dell.'</a><a class="editde" rel="'.$idd.'">&nbsp;</a><a class="dellde" rel="'.$idd.'">&nbsp;</a></p>';
        $msg .= '   <div class="ndd" id="nda'.$idd.'">'.$rd["noidung_$lang"].'</div>';
        $msg .= '</div>';
        $id++; 
    } 
    $msf .= _filethongbao.': ';
    $sat = $h->query("select fileat from newsletter where thang=".$_SESSION['thangmo']." and nam=".date('Y')." and fileat!='' and sb_id=".$_SESSION['truongsc']." and lop_id='".$_SESSION['lopcl']."' order by id desc");
    $nat = $h->num_rows($sat);
    if($nat){
        $rat = $h->fetch_array($sat);
        $msf .= '<a href="upload/'.$rat['fileat'].'" target="_blank" style="text-transform: capitalize;color:#fff">'.$rat['fileat'].'</a>';
        $msa .= '<a href="upload/'.$rat['fileat'].'" target="_blank">'.$rat['fileat'].'</a>';
    } else $msf .= _chuaco; 
    echo $msg.'cach;;;cach'.$msf.'cach;;;cach'.$msa;
?>