<?php
    include("../../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select clg,name_vn,name_en from practise where id=$id");
    $r = $h->fetch_array($s);
    $ag = $r['clg'];
    $nv = $r['name_vn'];
    $ne = $r['name_en'];
?>
<div>
                                <input type="hidden" id="idpe" value="<?=$id?>" />
                                <input type="hidden" id="agepe" value="<?=$ag?>" />
                                <label for="mnumber"><?=_classgr?></label>
                                <div class="select-style">
                                    <select id="cagee" name="cagee">
                                        <?php
                                            $mc = array("Blude Cylinder","Red rod","Trinomial 1","Trinomial 2","SOC","TAM","Cranberry","Juneberry");
                                            foreach($mc as $kc=>$vc){
                                                if($vc == $ag)
                                                    echo '<option value="'.$vc.'" selected>'.$vc.'</option>';
                                                else
                                                    echo '<option value="'.$vc.'">'.$vc.'</option>';
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