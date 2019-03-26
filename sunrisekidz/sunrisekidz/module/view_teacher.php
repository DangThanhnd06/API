<?php
    include("../require_inc.php");
    $id = $_POST['id'];
                        $sg = $h->query("select * from teacher where id=$id");
                        $nm = $h->num_rows($sg);
                        if(!$nm) echo '<p style="padding:20% 0 0 0;text-align:center;color:red;">'._noteacher.'</p>';
                        else {
                            $rg = $h->fetch_array($sg);
                            if($lang == 'vn') {
                                $tgv = $rg['lname'].' '.$rg['mname'].' '.$rg['fname'];
                            }
                            else
                                $tgv = $rg['fname'].' '.$rg['mname'].' '.$rg['lname'];
                            if($rg['gender']==1) $gd = _male;
                            else $gd = _female;
                            if($rg['level']==1) $le = _headteacher;
                            else $le = _teacher;
                            $rp = $rg['reportto'];
                            if($rp == 0) $rpt = _principle;
                            else {
                                $sp  = $h->query("select fname,mname,lname from teacher where id=$rp");
                                $rsp = $h->fetch_array($sp);
                                if($lang=='vn')
                                    $rpt = $rsp['fname'].' '.$rsp['mname'];
                                else
                                    $rpt = change($rsp['fname'].' '.$rsp['mname']); 
                            }
                    ?>
                    <div class="lleft">
                        <div class="img">
                            <div class="nen"><img src="img/bg_anhdd.png" alt="background anh do bong" /></div>
                            <?php if($rg['img']!='') { ?>
                            <div class="anh"><img src="upload/teacher/<?=$rg['img']?>" alt="GV" /></div>
                            <?php } else { ?>
                            <div class="anh"><img src="img/noimg.png" alt="No img" /></div>
                            <?php } ?>
                            <div class="editi"><a class="edititc" rel="<?=$rg['id']?>"><img src="img/edit_img.png" alt="Edit image" /></a></div>
                        </div>
                        <div class="lv"><p><?=_level?></p><strong><span id="levell"><?=$le?></span></strong><div class="editlv"><a class="elv" rel="<?=$rg['id']?>"><img src="img/icon_edit.png" alt="Edit level teacher" style="height: 100%;" /></a></div></div>
                        <div class="rp"><p><?=_reportto?></p><strong><span id="reportttt"><?=$rpt?></span></strong></div>
                    </div>
                    <div class="rright">
                        <p><strong><?=_teacherid?>: </strong><?=$rg['teacher_id']?></p>
                        <p><strong><?=_fname?>: </strong><?php if($lang=='vn') echo $rg['fname']; else echo change($rg['fname']); ?></p>
                        <p><strong><?=_mname?>: </strong><?php if($lang=='vn') echo $rg['mname']; else echo change($rg['mname']); ?></p>
                        <p><strong><?=_lname?>: </strong><?php if($lang=='vn') echo $rg['lname']; else echo change($rg['lname']); ?></p>
                        <p><strong><?=_gender?>: </strong><?=$gd?></p>
                        <p><strong><?=_nationality?>: </strong><?php if($lang=='vn') echo $rg['nationality']; else echo change($rg['nationality']); ?></p>
                        <p><strong><?=_onumber?>: </strong><?=$rg['onumber']?></p>
                        <p><strong><?=_mnumber?>: </strong><?=$rg['mnumber']?></p>
                        <p><strong><?=_emailaddress?>: </strong><?=$rg['email']?></p>
                        <p><strong><?=_fbaccount?>: </strong><?=$rg['fb']?></p>
                        <p><strong><?=_classgr?>: </strong><?=$rg['class_gr']?></p>
                        <p><strong><?=_namvaotruong?>: </strong><?=$rg['namvaotruong']?></p>
                    </div>
                    <p class="clr"></p>
                    <p class="edittc"><a class="edittcher" rel="<?=$rg['id']?>"><?=_edit?></a></p>
                    <?php } ?>