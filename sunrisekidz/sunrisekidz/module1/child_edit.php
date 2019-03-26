<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select * from children where id=$id");
    $r =  $h->fetch_array($s);
?>
<div>
    <input type="hidden" name="id_editc" value="<?=$id?>" />
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
                        <label for="teacherid"><?=_childrenid?></label>
                        <input type="text" name="children_ide" id="children_ide" class="in" value="<?=$r['children_id']?>" />
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
                        <label for="onumber"><?=_dob?></label>
                        <input type="text" name="dobe" id="dobe" class="in" value="<?=$r['dob']?>" />
                    </div>
                    <div>
                        <label for="mnumber"><?=_currentage?></label>
                        <div class="select-style">
                            <select id="cagee" name="cagee">
                                <option value="0"><?=_chooseage?></option>
                                <?php
                                    $m = array("1"=>"18 - 24 "._moth,"2"=>"24 - 36 "._month,"3"=>"3 - 4 "._yearold,"4"=>"4 - 5 "._yearold,"5"=>"5 - 6 "._yearold);
                                    foreach($m as $k=>$v){
                                        if($k==$r['cage'])
                                            echo '<option value="'.$k.'" selected>'.$v.'</option>';
                                        else
                                            echo '<option value="'.$k.'">'.$v.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
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
                        <label for="img"><?=_image?></label>
                        <div class="upload">
                        <?php if($r['img']!='') { ?>
                            <img src="upload/children/<?=$r['img']?>" alt="" width="100" style="margin-bottom: 10px;" /><br />
                        <?php } ?>
                            <input type="file" name="img4" id="file-7" class="inputfile inputfile-1" />
    				        <label for="file-7" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div>
                        <input type="submit" class="gui" id="guiedit" value="<?=_update?>" />
                    </div>
<script type="text/javascript">
    jQuery('#dobe').datetimepicker({
         lang:'vn',
         i18n:{
          vn:{
           months:[
            'Jan','Feb','Mar','Apr',
            'May','Jun','Jul','Aug',
            'Sep','Oct','Nov','Dec',
           ],
           dayOfWeek:[
            "Su", "Mo", "Tu", "We", 
            "Th", "Fr", "Sa",
           ]
          }
         },
         timepicker:false,
         format:'d/m/Y'
        });
</script>                    