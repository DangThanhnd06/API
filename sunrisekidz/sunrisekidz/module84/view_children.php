<?php
    include('../require_inc.php');
    $id = $_POST['id'];
    $ss = $h->query("select school_id,children_id,fname,mname,lname,gender,nationality,dob,cage,class_gr,img from children where id=$id");
    $r = $h->fetch_array($ss);
    if($r['gender']==1) $gender = _male;
    else $gender = _female;
    switch($r['cage']){
        case 1:
            $ca = '18 - 24 '._month;
            break;
        case 2:
            $ca = '24 - 36 '._month;
            break;
        case 3:
            $ca = '3 - 4 '._yearold;
            break;
        case 4:
            $ca = '4 - 5 '._yearold;
            break;
        case 5:
            $ca = '5 - 6 '._yearold;
            break;
    }
    $sci = $r['school_id'];
    $sc = $h->query("select tieude_vn,tieude_en from school_brand where id=$sci");
    $rc = $h->fetch_array($sc);
    $school = $rc["tieude_$lang"];
?>
<div class="mncfm">
                        <div class="eachmn act">
                            <a class="cr" rel="<?=$id?>"><?=_children?></a>
                        </div>
                        <div class="eachmn">
                            <a class="fath" rel="<?=$id?>"><?=_father?></a>
                        </div>
                        <div class="eachmn last">
                            <a class="moth" rel="<?=$id?>"><?=_mother?></a>
                        </div>
                        <p class="clr"></p>
                    </div>
                    <div class="noimage">
                          <div class="lleft">
                                <div class="img">
                                    <div class="nen"><img src="img/bg_anhdd.png" alt="background anh do bong" /></div>
                                    <?php if($r['img'] != '') { ?>
                                    <div class="anh" id="childimg"><img src="upload/children/<?=$r['img']?>" alt="HS" /></div>
                                    <?php } else { ?>
                                    <div class="anh" id="childimg"><img src="img/noimg.png" alt="HS" /></div>
                                    <?php } ?>
                                    <div class="editi"><a class="editicr" rel="<?=$id?>"><img src="img/edit_imgcr.png" alt="Edit image" /></a></div>
                                </div>
                            </div>
                            <div class="rright">
                                <p><strong><?=_childrenid?>: </strong><?=$r['children_id']?></p>
                                <p><strong><?=_fname?>: </strong><?php if($lang=='vn') echo $r['fname']; else echo change($r['fname']); ?></p>
                                <p><strong><?=_mname?>: </strong><?php if($lang=='vn') echo $r['mname']; else echo change($r['mname']); ?></p>
                                <p><strong><?=_lname?>: </strong><?php if($lang=='vn') echo $r['lname']; else echo change($r['lname']); ?></p>
                                <p><strong><?=_gender?>: </strong><?=$gender?></p>
                                <p><strong><?=_nationality?>: </strong><?php if($lang=='vn') echo $r['nationality']; else echo change($r['nationality']); ?></p>
                                <p><strong><?=_dob?>: </strong><?=$r['dob']?></p>
                                <p><strong><?=_currentage?>: </strong><?=$ca?></p>
                                <p><strong><?=_tenchinhanh?>: </strong><?=$school?></p>
                                <p><strong><?=_classgr?>: </strong><?=$r['class_gr']?></p>
                            </div>
                            <p class="clr"></p>
                            <p class="edittc"><a class="edit_child" rel="<?=$id?>"><?=_edit?></a></p>  
                    </div>