<?php
    include("../require_inc.php");
    $id = $_POST['idlve'];
    $s = $h->query("select level,reportto,school_id from teacher where id=$id");
    $r = $h->fetch_array($s);
    $lv = $r['level'];
    $rp = $r['reportto'];
    $sci = $r['school_id'];
?>
<div>
                        <input type="hidden" id="idlv" value="<?=$id?>" />
                        <label for="level"><?=_level?></label>
                        <div class="select-style">
                            <select name="clevel" id="clevel">
                            <?php if($lv == 1){ ?>
                                <option value="1" selected><?=_headteacher?></option>
                                <option value="2"><?=_teacher?></option>
                            <?php } else { ?>
                                <option value="1"><?=_headteacher?></option>
                                <option value="2" selected><?=_teacher?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php
                        if($rp==0) $dp = ' style="display: none;"';
                        else $dp = '';
                    ?>
                    <div id="report"<?php echo $dp ?>>
                        <label for="reportto"><?=_reportto?></label>
                        <div class="select-style">
                            <select name="creportto" id="creportto">
                                <option value="0"><?=_choseteacher?></option>
                                <?php
                                    $sct = $h->query("select id,fname,mname,lname from teacher where level=1 and hide=1 and school_id=$sci and id!=$id");
                                    while($rct = $h->fetch_array($sct)){
                                        if($lang == 'vn')
                                            $tct = $rct['lname'].' '.$rct['mname'].' '.$rct['fname'];
                                        else
                                            $tct = $rct['fname'].' '.$rct['mname'].' '.$rct['lname'];
                                        if($rct['id']==$rp) 
                                            echo '<option value="'.$rct['id'].'" selected>'.$tct.'</option>';
                                        else
                                            echo '<option value="'.$rct['id'].'">'.$tct.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <input type="button" class="gui" id="editlv" value="<?=_update?>" />
                    </div>