<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select school_id,reportto from teacher where id=$id");
    $rs = $h->fetch_array($s);
    $sci = $rs['school_id'];
    $rpt = $rs['reportto'];
?>
<label for="reportto"><?=_reportto?></label>
<div class="select-style">
    <select name="creportto" id="creportto">
        <option value="0"><?=_choseteacher?></option>
                                <?php
                                    $sct = $h->query("select id,fname,mname,lname from teacher where level=1 and hide=1 and school_id=$sci and id!=$id");
                                    while($rct = $h->fetch_array($sct)){
                                        if($lang == 'vn')
                                            $tct = $rct['fname'].' '.$rct['mname'];
                                        else
                                            $tct = change($rct['fname'].' '.$rct['mname']);
                                        if($rct['id']==$rpt) 
                                            echo '<option value="'.$rct['id'].'" selected>'.$tct.'</option>';
                                        else
                                            echo '<option value="'.$rct['id'].'">'.$tct.'</option>';
                                    }
                                ?>
                            </select>
                        </div>