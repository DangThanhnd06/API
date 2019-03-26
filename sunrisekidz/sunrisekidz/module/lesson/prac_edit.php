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
                                            $scl = $h->query("select tenlop from lop");
                                            while($rcl = $h->fetch_array($scl)){
                                                if($rcl['tenlop'] == $ag)
                                                    echo '<option value="'.$rcl['tenlop'].'" selected>'.$rcl['tenlop'].'</option>';
                                                else
                                                    echo '<option value="'.$rcl['tenlop'].'">'.$rcl['tenlop'].'</option>';
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
                                <input type="submit" class="gui" id="sendedpr" value="<?=_update?>" />
                            </div>