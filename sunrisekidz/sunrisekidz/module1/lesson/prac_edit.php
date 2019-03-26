<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select age,name_vn,name_en from practise where id=$id");
    $r = $h->fetch_array($s);
    $ag = $r['age'];
    $nv = $r['name_vn'];
    $ne = $r['name_en'];
?>
<div>
                                <input type="hidden" id="idpe" value="<?=$id?>" />
                                <input type="hidden" id="agepe" value="<?=$ag?>" />
                                <label for="mnumber"><?=_yearold?></label>
                                <div class="select-style">
                                    <select id="cagee" name="cagee">
                                    <?php
                                        $mag = array("1"=>"18 - 24 "._month,"2"=>"24 - 36 "._month,"3"=>"3 - 4 "._yearold,"4"=>"4 - 5 "._yearold,'5'=>"5 - 6 "._yearold);
                                        foreach($mag as $ka=>$v){
                                            if($ka == $ag)
                                                echo '<option value="'.$ka.'" selected>'.$v.'</option>';
                                            else
                                                echo '<option value="'.$ka.'">'.$v.'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessname?> (VN)</label>
                                <input class="in" id="name_vnn" name="name_vnn" value="<?=$nv?>" />
                            </div>
                            <div>
                                <label for="class_gr"><?=_lessname?> (EN)</label>
                                <input class="in" id="name_enn" name="name_enn" value="<?=$ne?>" />
                            </div>
                            <div>
                                <input type="submit" class="gui" id="sendedpr" value="<?=_edit?>" />
                            </div>