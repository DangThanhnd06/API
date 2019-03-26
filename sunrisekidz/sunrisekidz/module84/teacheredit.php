<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select * from teacher where id=$id");
    $r =  $h->fetch_array($s);
?>


                    <div>
                        <input type="hidden" name="idetc" value="<?=$id?>" />
                        <label for="school"><?=_school?></label>
                        <div class="select-style">
                            <select name="cse" id="cse">
                                <option value="0"><?=_chooseschool?></option>
                                <?php
                                    $sasc = $h->query("select id,tieude_vn,tieude_en from school_brand order by id asc");
                                    while($rasc = $h->fetch_array($sasc)){
                                        if($rasc['id'] == $r['school_id'])
                                            echo '<option value="'.$rasc['id'].'" selected>'._school.' '.$rasc["tieude_$lang"].'</option>';
                                        else
                                            echo '<option value="'.$rasc['id'].'">'._school.' '.$rasc["tieude_$lang"].'</option>';
                                    }
                                ?>
                                
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="teacherid"><?=_teacherid?></label>
                        <input type="text" name="teacher_ide" id="teacher_ide" class="in" value="<?=$r['teacher_id']?>" />
                    </div>
                    <div>
                        <label for="fname"><?=_fname?></label>
                        <input type="text" name="fnamee" id="fnamee" class="in" value="<?=$r['fname']?>" />
                    </div>
                    <div>
                        <label for="mname"><?=_mname?></label>
                        <input type="text" name="mnamee" id="mnamee" class="in" value="<?=$r['mname']?>" />
                    </div>
                    <div>
                        <label for="lname"><?=_lname?></label>
                        <input type="text" name="lnamee" id="lnamee" class="in" value="<?=$r['lname']?>" />
                    </div>
                    <div>
                        <label for="school"><?=_gender?></label>
                        <div class="select-style">
                            <select name="gendere" id="gendere">
                            <?php if($r['gender']==1) { ?>
                                <option value="1" selected><?=_male?></option>
                                <option value="2"><?=_female?></option>
                            <?php } else { ?>
                                <option value="1"><?=_male?></option>
                                <option value="2" selected><?=_female?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="nationality"><?=_nationality?></label>
                        <input type="text" name="nationalitye" id="nationalitye" class="in" value="<?=$r['nationality']?>" />
                    </div>
                    <div>
                        <label for="onumber"><?=_onumber?></label>
                        <input type="text" name="onumbere" id="onumbere" class="in" value="<?=$r['onumber']?>" />
                    </div>
                    <div>
                        <label for="mnumber"><?=_mnumber?></label>
                        <input type="text" name="mnumbere" id="mnumbere" class="in" value="<?=$r['mnumber']?>" />
                    </div>
                    <div>
                        <label for="email"><?=_emailaddress?></label>
                        <input type="text" name="emaile" id="emaile" class="in" value="<?=$r['email']?>" />
                    </div>
                    
                    <div>
                        <label for="fb"><?=_fbaccount?></label>
                        <input type="text" name="fbe" id="fbe" class="in" value="<?=$r['fb']?>" />
                    </div>
                    <div>
                        <label for="class_gr"><?=_classgr?></label>
                        <div class="select-style">
                            <select id="class_gre" name="class_gre">
                                <option value="0"><?=_choosecg?></option>
                            <?php
                                $mc = array("Blude Cylinder","Red rod","Trinomial 1","Trinomial 2","SOC","TAM","Cranberry","Juneberry");
                                foreach($mc as $kc=>$vc){
                                    if($vc == $r['class_gr'])
                                        echo '<option value="'.$vc.'" selected>'.$vc.'</option>';
                                    else
                                        echo '<option value="'.$vc.'">'.$vc.'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="level"><?=_level?></label>
                        <div class="select-style">
                            <select name="levele" id="levele">
                            <?php
                                if($r['level']==1) {
                            ?>
                                <option value="1" selected><?=_headteacher?></option>
                                <option value="2"><?=_teacher?></option>
                            <?php } else { ?>
                                <option value="1"><?=_headteacher?></option>
                                <option value="2" selected><?=_teacher?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="reportto"><?=_reportto?></label>
                        <div class="select-style">
                            <select name="reporttoe" id="reporttoe">
                                <option value="0"><?=_choseteacher?></option>
                            <?php
                                if($r['reportto']!=0) {
                                    $sp = $h->query("select id,fname,mname from teacher where school_id=".$r['school_id']." and level=1 and id!=$id and hide=1");
                                    while($rp = $h->fetch_array($sp)){
                                        if($lang == 'vn') 
                                            $namerp = $rp['fname'].' '.$rp['mname'];
                                        else
                                            $namerp = change($rp['fname'].' '.$rp['mname']);
                                        if($rp['id']==$r['reportto'])
                                            echo '<option value="'.$rp['id'].'" selected>'.$namerp.'</option>';
                                        else
                                            echo '<option value="'.$rp['id'].'">'.$namerp.'</option>';   
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="img"><?=_image?></label>
                            
                        <div class="upload">
                        <?php if($r['img']!='') { ?>
                            <img src="upload/teacher/<?=$r['img']?>" alt="" width="100" style="margin-bottom: 10px;" /><br />
                        <?php } ?>
                            <input type="file" name="img2" id="file-3" class="inputfile inputfile-1" />
    				        <label for="file-3" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div><label>&nbsp;</label><a class="changep" rel="<?=$id?>"><?=_changepass?></a></div>
                    <div>
                        <input type="submit" class="gui" id="guiedit" value="<?=_update?>" style="margin-left:0;" />
                    </div>