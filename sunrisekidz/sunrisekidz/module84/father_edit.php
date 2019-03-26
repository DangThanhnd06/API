<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select * from children where id=$id");
    $r =  $h->fetch_array($s);

    if($lang == 'vn') $tenc = _name.' '._fathers;
    else $tenc = _fathers.' '._name;
    if($lang == 'vn') $sdtc = _contactnm.' '._fathers;
    else $sdtc = _fathers.' '._contactnm;
    if($lang == 'vn') $emc = 'Email '._fathers;
    else $emc = _fathers.' email';
    if($lang == 'vn') $addc = _address.' '._fathers;
    else $addc = _fathers.' '._address;
    if($lang == 'vn') $imgc = _image.' '._fathers;
    else $imgc = _fathers.' '._image;
?>
                    <div>
                        <input type="hidden" name="id_editf" value="<?=$id?>" />
                        <label for="email"><?=$tenc?></label>
                        <input type="text" name="father_namee" id="father_namee" class="in" value="<?=$r['father_name']?>" />
                        <div id="suggestfather"></div>
                    </div>
                    
                    <div>
                        <label for="cfemail"><?=$sdtc?></label>
                        <input type="text" name="father_numbere" id="father_numbere" class="in" value="<?=$r['father_number']?>" />
                    </div>
                    <div>
                        <label for="email"><?=$emc?></label>
                        <input type="text" name="father_emaile" id="father_emaile" class="in" value="<?=$r['father_email']?>" />
                    </div>
                    <div>
                        <label for="address"><?=$addc?></label>
                        <input type="text" name="father_addresse" id="father_addresse" class="in" value="<?=$r['father_address']?>" />
                    </div>
                    <div>
                        <label for="img"><?=$imgc?></label>
                        <div class="upload">
                            <?php
                                if($r['father_img']!="") {
                            ?>
                            <img src="upload/children/<?=$r['father_img']?>" alt="" width="100" style="margin-bottom: 10px;" /><br />
                            <?php } else { ?>
                            <img src="img/noimg.png" alt="" width="100" style="margin-bottom: 10px;" /><br />
                            <?php } ?>
                            <input type="file" name="img5" id="file-8" class="inputfile inputfile-1" />
    				        <label for="file-8" class="fll"><span><?=_chooseimg?> &hellip;</span></label>
                        </div>
                    </div>
                    <p class="clr"></p>
                    <div><label>&nbsp;</label><a class="changepf" rel="<?=$id?>"><?=_changepass?></a></div>
                    <div>
                        <input type="submit" class="gui" id="guieditf" value="<?=_update?>" style="margin-left: 0;" />
                    </div>

<script type="text/javascript">
    $(document).ready(function(){
       
    });
</script>                    