<?php
    include("../../require_inc.php");
    $sci = $_POST['sci'];
    $cl = $_POST['cl'];
    $child_id = $_POST['child_id'];
    $practise = $_POST['practise'];
    $year = date("Y");
    $month = $_SESSION['mnnnn'];
    $msg = "";
    if($sci != 0 && $cl!="" && $child_id!=0){
        $s = $h->query("select cmt_month,month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and practice=$practise and approve=1 and cmt_month!='' order by month asc,id asc");
        while($r = $h->fetch_array($s)){
            if($r['cmt_month']){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="editcmt;1;'.$sci.';'.$cl.';'.$child_id.';'.$practise.'">'.$r1['cmt_month'].'</a></p>';
            } else {
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';'.$cl.';'.$child_id.';'.$practise.'">&nbsp;</a></p>';
            }
        }
        
        
    } else {
        if($sci == 0 && $cl!="" && $child_id==0){
            $msg .= '<p class="mcmt1"><a class="mcmtt" rel="1;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt2"><a class="mcmtt" rel="2;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt3"><a class="mcmtt" rel="3;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt4"><a class="mcmtt" rel="4;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt5"><a class="mcmtt" rel="5;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt6"><a class="mcmtt" rel="6;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt7"><a class="mcmtt" rel="7;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt8"><a class="mcmtt" rel="8;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt9"><a class="mcmtt" rel="9;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt10"><a class="mcmtt" rel="10;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt11"><a class="mcmtt" rel="11;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt12"><a class="mcmtt" rel="12;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>';
        } 
        if($sci != 0 && $cl=="" && $child_id==0){
                $msg .= '<p class="mcmt1"><a class="mcmtt" rel="1;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt2"><a class="mcmtt" rel="2;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt3"><a class="mcmtt" rel="3;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt4"><a class="mcmtt" rel="4;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt5"><a class="mcmtt" rel="5;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt6"><a class="mcmtt" rel="6;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt7"><a class="mcmtt" rel="7;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt8"><a class="mcmtt" rel="8;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt9"><a class="mcmtt" rel="9;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt10"><a class="mcmtt" rel="10;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt11"><a class="mcmtt" rel="11;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt12"><a class="mcmtt" rel="12;'.$sci.';0;0;0">&nbsp;</a></p>';
        } if($sci == 0 && $cl=="" && $child_id!=0){
                $msg .= '<p class="mcmt1"><a class="mcmtt" rel="1;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt2"><a class="mcmtt" rel="2;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt3"><a class="mcmtt" rel="3;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt4"><a class="mcmtt" rel="4;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt5"><a class="mcmtt" rel="5;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt6"><a class="mcmtt" rel="6;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt7"><a class="mcmtt" rel="7;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt8"><a class="mcmtt" rel="8;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt9"><a class="mcmtt" rel="9;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt10"><a class="mcmtt" rel="10;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt11"><a class="mcmtt" rel="11;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt12"><a class="mcmtt" rel="12;0;0;'.$child_id.';0">&nbsp;</a></p>';
        } if($sci != 0 && $cl!="" && $child_id==0){
                $msg .= '<p class="mcmt1"><a class="mcmtt" rel="1;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt2"><a class="mcmtt" rel="2;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt3"><a class="mcmtt" rel="3;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt4"><a class="mcmtt" rel="4;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt5"><a class="mcmtt" rel="5;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt6"><a class="mcmtt" rel="6;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt7"><a class="mcmtt" rel="7;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt8"><a class="mcmtt" rel="8;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt9"><a class="mcmtt" rel="9;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt10"><a class="mcmtt" rel="10;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt11"><a class="mcmtt" rel="11;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt12"><a class="mcmtt" rel="12;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>';
        } if($sci != 0 && $cl=="" && $child_id!=0){
                $msg .= '<p class="mcmt1"><a class="mcmtt" rel="1;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt2"><a class="mcmtt" rel="2;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt3"><a class="mcmtt" rel="3;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt4"><a class="mcmtt" rel="4;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt5"><a class="mcmtt" rel="5;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt6"><a class="mcmtt" rel="6;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt7"><a class="mcmtt" rel="7;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt8"><a class="mcmtt" rel="8;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt9"><a class="mcmtt" rel="9;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt10"><a class="mcmtt" rel="10;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt11"><a class="mcmtt" rel="11;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt12"><a class="mcmtt" rel="12;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>';
        } if($sci == 0 && $cl!="" && $child_id!=0){
                $msg .= '<p class="mcmt1"><a class="mcmtt" rel="1;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt2"><a class="mcmtt" rel="2;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt3"><a class="mcmtt" rel="3;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt4"><a class="mcmtt" rel="4;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt5"><a class="mcmtt" rel="5;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt6"><a class="mcmtt" rel="6;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt7"><a class="mcmtt" rel="7;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt8"><a class="mcmtt" rel="8;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt9"><a class="mcmtt" rel="9;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt10"><a class="mcmtt" rel="10;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt11"><a class="mcmtt" rel="11;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt12"><a class="mcmtt" rel="12;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>';
        }       
        if($sci == 0 && $cl=="" && $child_id==0){
                $msg .= '<p class="mcmt1"><a class="mcmtt" rel="1;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt2"><a class="mcmtt" rel="2;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt3"><a class="mcmtt" rel="3;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt4"><a class="mcmtt" rel="4;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt5"><a class="mcmtt" rel="5;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt6"><a class="mcmtt" rel="6;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt7"><a class="mcmtt" rel="7;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt8"><a class="mcmtt" rel="8;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt9"><a class="mcmtt" rel="9;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt10"><a class="mcmtt" rel="10;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt11"><a class="mcmtt" rel="11;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt12"><a class="mcmtt" rel="12;0;0;0;0">&nbsp;</a></p>';
        }
        
    }
    echo $msg;
?>