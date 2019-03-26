<?php
    include("../../require_inc.php");
    $sci = $_POST['sci'];
    $cl = $_POST['cl'];
    $child_id = $_POST['child_id'];
    $practise = $_POST['practise'];
    $year = date("Y");
    $month = $_POST['thang'];
    #echo $sci.'/'.$cl.'/'.$child_id.'/'.$practise.'/'.$year.'/'.$month;
    $_SESSION['mnnnn'] = $_POST['thang'];
    switch($month){
                            case "1":
                                $_SESSION['thanghttt'] = _thang1;
                                break;
                            case "2":
                                $_SESSION['thanghttt'] = _thang2;
                                break;
                            case "3":
                                $_SESSION['thanghttt'] = _thang3;
                                break;
                            case "4":
                                $_SESSION['thanghttt'] = _thang4;
                                break;
                            case "5":
                                $_SESSION['thanghttt'] = _thang5;
                                break;
                            case "6":
                                $_SESSION['thanghttt'] = _thang6;
                                break;
                            case "7":
                                $_SESSION['thanghttt'] = _thang7;
                                break;
                            case "8":
                                $_SESSION['thanghttt'] = _thang8;
                                break;
                            case "9":
                                $_SESSION['thanghttt'] = _thang9;
                                break;
                            case "10":
                                $_SESSION['thanghttt'] = _thang10;
                                break;
                            case "11":
                                $_SESSION['thanghttt'] = _thang11;
                                break;
                            case "12":
                                $_SESSION['thanghttt'] = _thang12;
                                break;
                            
                        }
    $msg = "";
    if($sci != 0 && $cl!="" && $child_id!=0){
        $s1 = $h->query("select cmt_week,cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=$month and practice=$practise and approve=1 and week=1 and cmt_week!='' order by week asc");
        $r1 = $h->fetch_array($s1);
        $n1 = $h->num_rows($s1);
        if($n1){
            $msg .= '<p class="wcmt1"><a class="cmtt" rel="editcmt;1;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">'.$r1['cmt_week'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">&nbsp;</a></p>';
        }
        $s2 = $h->query("select cmt_week,cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=$month and practice=$practise and approve=1 and week=2 and cmt_week!='' order by week asc");
        $r2 = $h->fetch_array($s2);
        $n2 = $h->num_rows($s2);
        if($n2){
            $msg .= '<p class="wcmt2"><a class="cmtt" rel="editcmt;2;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">'.$r2['cmt_week'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">&nbsp;</a></p>';
        }
        $s3 = $h->query("select cmt_week,cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=$month and practice=$practise and approve=1 and week=3 and cmt_week!='' order by week asc");
        $r3 = $h->fetch_array($s3);
        $n3 = $h->num_rows($s3);
        if($n3){
            $msg .= '<p class="wcmt3"><a class="cmtt" rel="editcmt;3;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">'.$r3['cmt_week'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">&nbsp;</a></p>';
        }
        $s4 = $h->query("select cmt_week,cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=$month and practice=$practise and approve=1 and week=4 and cmt_week!='' order by week asc");
        $r4 = $h->fetch_array($s4);
        $n4 = $h->num_rows($s4);
        if($n4){
            $msg .= '<p class="wcmt4"><a class="cmtt" rel="editcmt;4;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">'.$r4['cmt_week'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">&nbsp;</a></p>';
        }
        $s5 = $h->query("select cmt_week,cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=$month and practice=$practise and approve=1 and week=5 and cmt_week!='' order by week asc");
        $r5 = $h->fetch_array($s5);
        $n5 = $h->num_rows($s5);
        if($n5){
            $msg .= '<p class="wcmt5"><a class="cmtt" rel="editcmt;5;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">'.$r5['cmt_week'].'</a></p>';
        } else {
            $msg .= '<p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">&nbsp;</a></p>';
        }
        $s6 = $h->query("select cmt_week,cmt_month from comment where school_id=$sci and class_id='$cl' and child_id=$child_id and year=$year and month=$month and practice=$practise and approve=1 and week=6 and cmt_month!='' order by week asc");
        $r6 = $h->fetch_array($s6);
        $n6 = $h->num_rows($s6);
        if($n6){
            $msg .= '<p class="mcmt"><a class="cmtt" rel="editcmt;6;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">'.$r6['cmt_month'].'</a></p>';
        } else {
            $msg .= '<p class="mcmt"><a class="cmtt" rel="6;'.$sci.';'.$cl.';'.$child_id.';'.$practise.';'.$month.'">&nbsp;</a></p>';
        }
    } else {
        if($sci == 0 && $cl!="" && $child_id==0){
            $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="wcmt2"><a class="cmtt" rel="2;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="wcmt3"><a class="cmtt" rel="3;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="wcmt4"><a class="cmtt" rel="4;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="wcmt5"><a class="cmtt" rel="5;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>
                     <p class="mcmt"><a class="cmtt" rel="6;0;'.$cl.';0;'.$practise.'">&nbsp;</a></p>';
        } 
        if($sci != 0 && $cl=="" && $child_id==0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';0;0;0">&nbsp;</a></p>
                         <p class="mcmt"><a class="cmtt" rel="6;'.$sci.';0;0;0">&nbsp;</a></p>';
        } if($sci == 0 && $cl=="" && $child_id!=0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;0;0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt"><a class="cmtt" rel="6;0;0;'.$child_id.';0">&nbsp;</a></p>';
        } if($sci != 0 && $cl!="" && $child_id==0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>
                         <p class="mcmt"><a class="cmtt" rel="6;'.$sci.';'.$cl.';0;0">&nbsp;</a></p>';
        } if($sci != 0 && $cl=="" && $child_id!=0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt"><a class="cmtt" rel="6;'.$sci.';0;'.$child_id.';0">&nbsp;</a></p>';
        } if($sci == 0 && $cl!="" && $child_id!=0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>
                         <p class="mcmt"><a class="cmtt" rel="6;0;'.$cl.';'.$child_id.';0">&nbsp;</a></p>';
        }       
        if($sci == 0 && $cl=="" && $child_id==0){
                $msg .= '<p class="wcmt1"><a class="cmtt" rel="1;0;0;0;0">&nbsp;</a></p>
                         <p class="wcmt2"><a class="cmtt" rel="2;0;0;0;0">&nbsp;</a></p>
                         <p class="wcmt3"><a class="cmtt" rel="3;0;0;0;0">&nbsp;</a></p>
                         <p class="wcmt4"><a class="cmtt" rel="4;0;0;0;0">&nbsp;</a></p>
                         <p class="wcmt5"><a class="cmtt" rel="5;0;0;0;0">&nbsp;</a></p>
                         <p class="mcmt"><a class="cmtt" rel="6;0;0;0;0">&nbsp;</a></p>';
        }
        
    }
    echo $msg.'mnm;mnm'.$_SESSION['thanghttt'];
    
    
?>