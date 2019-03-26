<?php
    include("../../require_inc.php");
    if($_SESSION['quyenper'] == 1){
        $sci = $_POST['sci'];
        $cl = $_POST['cl'];
    } else {
        $sci = $_SESSION['schoolgvcn'];
        $cl = $_SESSION['classgvcn'];
    }
    $child_id = $_POST['child_id'];
    $practise = $_POST['practise'];
    $year = date("Y");
    $month = $_SESSION['mnnnn'];
    $msg = "";
    if($sci != 0 && $cl!="" && $child_id!=0){
        $s1 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and practice=$practise and approve=1 and cmt_month!='' and month=1 order by month asc,id asc");
        $n1 = $h->num_rows($s1);
        $r1 = $h->fetch_array($s1);
        if($n1){
            $msg .= '<p class="wcmt1"><a class="ecmtt" rel="1;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';1">'.$r1['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';1">&nbsp;</a></p>';
        }
        // month 2
        $s2 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and practice=$practise and approve=1 and cmt_month!='' and month=2 order by month asc,id asc");
        $n2 = $h->num_rows($s2);
        $r2 = $h->fetch_array($s2);
        if($n2){
            $msg .= '<p class="wcmt2"><a class="ecmtt" rel="2;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';2">'.$r2['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';2">&nbsp;</a></p>';
        }
        // month 3
        $s3 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=3 and practice=$practise and approve=1 and cmt_month!='' order by week asc");
        $r3 = $h->fetch_array($s3);
        $n3 = $h->num_rows($s3);
        if($n3){
            $msg .= '<p class="wcmt3"><a class="ecmtt" rel="3;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';3">'.$r3['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';3">&nbsp;</a></p>';
        }
        $s4 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=4 and practice=$practise and approve=1 and cmt_month!='' order by week asc");
        $r4 = $h->fetch_array($s4);
        $n4 = $h->num_rows($s4);
        if($n4){
            $msg .= '<p class="wcmt4"><a class="ecmtt" rel="4;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';4">'.$r4['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';4">&nbsp;</a></p>';
        }
        $s5 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=5 and practice=$practise and approve=1 and cmt_month!='' order by week asc");
        $r5 = $h->fetch_array($s5);
        $n5 = $h->num_rows($s5);
        if($n5){
            $msg .= '<p class="wcmt5"><a class="ecmtt" rel="5;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';5">'.$r5['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';5">&nbsp;</a></p>';
        }
        $s6 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=6 and practice=$practise and approve=1 and week=6 and cmt_month!='' order by week asc");
        $r6 = $h->fetch_array($s6);
        $n6 = $h->num_rows($s6);
        if($n6){
            $msg .= '<p class="wcmt6"><a class="ecmtt" rel="6;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';6">'.$r6['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt6"><a class="cmtt" rel="6;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';6">&nbsp;</a></p>';
        }
        
        $s7 = $h->query("select cmt_month,month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and practice=$practise and approve=1 and cmt_month!='' and month=7 order by month asc,id asc");
        $n7 = $h->num_rows($s7);
        $r7 = $h->fetch_array($s7);
        if($n7){
            $msg .= '<p class="wcmt7"><a class="ecmtt" rel="7;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';7">'.$r7['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt7"><a class="cmtt" rel="7;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';7">&nbsp;</a></p>';
        }
        
        $s8 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=8 and practice=$practise and approve=1 and cmt_month!='' order by week asc");
        $r8 = $h->fetch_array($s8);
        $n8 = $h->num_rows($s8);
        if($n8){
            $msg .= '<p class="wcmt8"><a class="ecmtt" rel="8;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';8">'.$r8['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt8"><a class="cmtt" rel="8;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';8">&nbsp;</a></p>';
        }
        $s9 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=9 and practice=$practise and approve=1 and cmt_month!='' order by week asc");
        $r9 = $h->fetch_array($s9);
        $n9 = $h->num_rows($s9);
        if($n9){
            $msg .= '<p class="wcmt9"><a class="ecmtt" rel="9;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';9">'.$r9['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt9"><a class="cmtt" rel="9;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';9">&nbsp;</a></p>';
        }
        $s10 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=10 and practice=$practise and approve=1 and cmt_month!='' order by week asc");
        $r10 = $h->fetch_array($s10);
        $n10 = $h->num_rows($s10);
        if($n10){
            $msg .= '<p class="wcmt10"><a class="ecmtt" rel="10;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';10">'.$r10['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt10"><a class="cmtt" rel="10;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';10">&nbsp;</a></p>';
        }
        $s11 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=11 and practice=$practise and approve=1 and cmt_month!='' order by week asc");
        $r11 = $h->fetch_array($s11);
        $n11 = $h->num_rows($s11);
        if($n11){
            $msg .= '<p class="wcmt11"><a class="ecmtt" rel="11;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';11">'.$r11['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt11"><a class="cmtt" rel="11;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';11">&nbsp;</a></p>';
        }
        $s12 = $h->query("select cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=12 and practice=$practise and approve=1 and week=6 and cmt_month!='' order by week asc");
        $r12 = $h->fetch_array($s12);
        $n12 = $h->num_rows($s12);
        if($n12){
            $msg .= '<p class="wcmt12"><a class="ecmtt" rel="12;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';12">'.$r12['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt12"><a class="cmtt" rel="12;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';12">&nbsp;</a></p>';
        }
        
    } else {
        if($sci == 0 && $cl!="" && $child_id==0){
            $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;'.$cl.';0;'.$practise.';1">&nbsp;</a></p>
                     <p class="wcmt2"><a class="cmtt" rel="2;0;'.$cl.';0;'.$practise.';2">&nbsp;</a></p>
                     <p class="wcmt3"><a class="cmtt" rel="3;0;'.$cl.';0;'.$practise.';3">&nbsp;</a></p>
                     <p class="wcmt4"><a class="cmtt" rel="4;0;'.$cl.';0;'.$practise.';4">&nbsp;</a></p>
                     <p class="wcmt5"><a class="cmtt" rel="5;0;'.$cl.';0;'.$practise.';5">&nbsp;</a></p>
                     <p class="wcmt6"><a class="cmtt" rel="1;0;'.$cl.';0;'.$practise.';6">&nbsp;</a></p>
                     <p class="wcmt7"><a class="cmtt" rel="2;0;'.$cl.';0;'.$practise.';7">&nbsp;</a></p>
                     <p class="wcmt8"><a class="cmtt" rel="3;0;'.$cl.';0;'.$practise.';8">&nbsp;</a></p>
                     <p class="wcmt9"><a class="cmtt" rel="4;0;'.$cl.';0;'.$practise.';9">&nbsp;</a></p>
                     <p class="wcmt10"><a class="cmtt" rel="5;0;'.$cl.';0;'.$practise.';10">&nbsp;</a></p>
                     <p class="wcmt11"><a class="cmtt" rel="1;0;'.$cl.';0;'.$practise.';11">&nbsp;</a></p>
                     <p class="wcmt12"><a class="cmtt" rel="2;0;'.$cl.';0;'.$practise.';12">&nbsp;</a></p>';
        } 
        if($sci != 0 && $cl=="" && $child_id==0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';0;0;0;1">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';0;0;0;2">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';0;0;0;3">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';0;0;0;4">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';0;0;0;5">&nbsp;</a></p>
                         <p class="wcmt6"><a class="cmtt" rel="1;'.$sci.';0;0;0;6">&nbsp;</a></p>
                         <p class="wcmt7"><a class="cmtt" rel="2;'.$sci.';0;0;0;7">&nbsp;</a></p>
                         <p class="wcmt8"><a class="cmtt" rel="3;'.$sci.';0;0;0;8">&nbsp;</a></p>
                         <p class="wcmt9"><a class="cmtt" rel="4;'.$sci.';0;0;0;9">&nbsp;</a></p>
                         <p class="wcmt10"><a class="cmtt" rel="5;'.$sci.';0;0;0;10">&nbsp;</a></p>
                         <p class="wcmt11"><a class="cmtt" rel="1;'.$sci.';0;0;0;11">&nbsp;</a></p>
                         <p class="wcmt12"><a class="cmtt" rel="2;'.$sci.';0;0;0;12">&nbsp;</a></p>';
        } if($sci == 0 && $cl=="" && $child_id!=0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;0;'.$child_id.';0;1">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;0;0;'.$child_id.';0;2">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;0;0;'.$child_id.';0;3">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;0;0;'.$child_id.';0;4">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;0;0;'.$child_id.';0;5">&nbsp;</a></p>
                         <p class="wcmt6"><a class="cmtt" rel="1;0;0;'.$child_id.';0;6">&nbsp;</a></p>
                         <p class="wcmt7"><a class="cmtt" rel="2;0;0;'.$child_id.';0;7">&nbsp;</a></p>
                         <p class="wcmt8"><a class="cmtt" rel="3;0;0;'.$child_id.';0;8">&nbsp;</a></p>
                         <p class="wcmt9"><a class="cmtt" rel="4;0;0;'.$child_id.';0;9">&nbsp;</a></p>
                         <p class="wcmt10"><a class="cmtt" rel="5;0;0;'.$child_id.';0;10">&nbsp;</a></p>
                         <p class="wcmt11"><a class="cmtt" rel="1;0;0;'.$child_id.';0;11">&nbsp;</a></p>
                         <p class="wcmt12"><a class="cmtt" rel="2;0;0;'.$child_id.';0;12">&nbsp;</a></p>';
        } if($sci != 0 && $cl!="" && $child_id==0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';'.$cl.';0;0;1">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';'.$cl.';0;0;2">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';'.$cl.';0;0;3">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';'.$cl.';0;0;4">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';'.$cl.';0;0;5">&nbsp;</a></p>
                         <p class="wcmt6"><a class="cmtt" rel="1;'.$sci.';'.$cl.';0;0;6">&nbsp;</a></p>
                         <p class="wcmt7"><a class="cmtt" rel="2;'.$sci.';'.$cl.';0;0;7">&nbsp;</a></p>
                         <p class="wcmt8"><a class="cmtt" rel="3;'.$sci.';'.$cl.';0;0;8">&nbsp;</a></p>
                         <p class="wcmt9"><a class="cmtt" rel="4;'.$sci.';'.$cl.';0;0;9">&nbsp;</a></p>
                         <p class="wcmt10"><a class="cmtt" rel="5;'.$sci.';'.$cl.';0;0;10">&nbsp;</a></p>
                         <p class="wcmt11"><a class="cmtt" rel="1;'.$sci.';'.$cl.';0;0;11">&nbsp;</a></p>
                         <p class="wcmt12"><a class="cmtt" rel="2;'.$sci.';'.$cl.';0;0;12">&nbsp;</a></p>';
        } if($sci != 0 && $cl=="" && $child_id!=0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';0;'.$child_id.';0;1">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';0;'.$child_id.';0;2">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';0;'.$child_id.';0;3">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';0;'.$child_id.';0;4">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';0;'.$child_id.';0;5">&nbsp;</a></p>
                         <p class="wcmt6"><a class="cmtt" rel="1;'.$sci.';0;'.$child_id.';0;6">&nbsp;</a></p>
                         <p class="wcmt7"><a class="cmtt" rel="2;'.$sci.';0;'.$child_id.';0;7">&nbsp;</a></p>
                         <p class="wcmt8"><a class="cmtt" rel="3;'.$sci.';0;'.$child_id.';0;8">&nbsp;</a></p>
                         <p class="wcmt9"><a class="cmtt" rel="4;'.$sci.';0;'.$child_id.';0;9">&nbsp;</a></p>
                         <p class="wcmt10"><a class="cmtt" rel="5;'.$sci.';0;'.$child_id.';0;10">&nbsp;</a></p>
                         <p class="wcmt11"><a class="cmtt" rel="1;'.$sci.';0;'.$child_id.';0;11">&nbsp;</a></p>
                         <p class="wcmt12"><a class="cmtt" rel="2;'.$sci.';0;'.$child_id.';0;12">&nbsp;</a></p>';
        } if($sci == 0 && $cl!="" && $child_id!=0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;'.$cl.';'.$child_id.';0;1">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;0;'.$cl.';'.$child_id.';0;2">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;0;'.$cl.';'.$child_id.';0;3">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;0;'.$cl.';'.$child_id.';0;4">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;0;'.$cl.';'.$child_id.';0;5">&nbsp;</a></p>
                         <p class="wcmt6"><a class="cmtt" rel="1;0;'.$cl.';'.$child_id.';0;6">&nbsp;</a></p>
                         <p class="wcmt7"><a class="cmtt" rel="2;0;'.$cl.';'.$child_id.';0;7">&nbsp;</a></p>
                         <p class="wcmt8"><a class="cmtt" rel="3;0;'.$cl.';'.$child_id.';0;8">&nbsp;</a></p>
                         <p class="wcmt9"><a class="cmtt" rel="4;0;'.$cl.';'.$child_id.';0;9">&nbsp;</a></p>
                         <p class="wcmt10"><a class="cmtt" rel="5;0;'.$cl.';'.$child_id.';0;10">&nbsp;</a></p>
                         <p class="wcmt11"><a class="cmtt" rel="1;0;'.$cl.';'.$child_id.';0;11">&nbsp;</a></p>
                         <p class="wcmt12"><a class="cmtt" rel="2;0;'.$cl.';'.$child_id.';0;12">&nbsp;</a></p>';
        }       
        if($sci == 0 && $cl=="" && $child_id==0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;0;0;0;1">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;0;0;0;0;2">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;0;0;0;0;3">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;0;0;0;0;4">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;0;0;0;0;5">&nbsp;</a></p>
                         <p class="wcmt6"><a class="cmtt" rel="1;0;0;0;0;6">&nbsp;</a></p>
                         <p class="wcmt7"><a class="cmtt" rel="2;0;0;0;0;7">&nbsp;</a></p>
                         <p class="wcmt8"><a class="cmtt" rel="3;0;0;0;0;8">&nbsp;</a></p>
                         <p class="wcmt9"><a class="cmtt" rel="4;0;0;0;0;9">&nbsp;</a></p>
                         <p class="wcmt10"><a class="cmtt" rel="5;0;0;0;0;10">&nbsp;</a></p>
                         <p class="wcmt11"><a class="cmtt" rel="1;0;0;0;0;11">&nbsp;</a></p>
                         <p class="wcmt12"><a class="cmtt" rel="2;0;0;0;0;12">&nbsp;</a></p>';
        }
        
    }
    echo $msg;
?>