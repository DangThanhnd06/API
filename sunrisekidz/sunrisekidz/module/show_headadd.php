<?php
    include("../require_inc.php");
    $sci = $_POST['sce'];
?>
        <option value="0"><?=_choseteacher?></option>
                                <?php
                                    $sct = $h->query("select id,fname,mname,lname from teacher where level=1 and hide=1 and school_id=$sci");
                                    while($rct = $h->fetch_array($sct)){
                                        if($lang == 'vn')
                                            $tct = $rct['fname'].' '.$rct['mname'];
                                        else
                                            $tct = change($rct['fname'].' '.$rct['mname']);
                                        echo '<option value="'.$rct['id'].'">'.$tct.'</option>';
                                    }
                                ?>