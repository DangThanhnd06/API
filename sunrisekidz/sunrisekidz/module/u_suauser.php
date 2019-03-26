<?php
    include("../require_inc.php");
    $id = $_POST['id'];
    $s = $h->query("select * from admin where id=$id");
    $r = $h->fetch_array($s);
?>
<input type="hidden" id="iduse" name="iduse" value="<?=$id?>" />
<div>
                        <label for="password"><?=_tenorcv?></label>
                        <input type="text" name="tenorcvue" id="tenorcvue" class="in" value="<?=$r['hoten']?>" />
                    </div>
                    <div>
                        <label for="cfpassword"><?=_tendangnhap?></label>
                        <input type="text" name="tendangnhape" id="tendangnhape" class="in" value="<?=$r['username']?>" />
                    </div>
                    <div>
                        <label for="school"><?=_quyen?></label>
                        <div class="select-style">
                            <select name="quyenue" id="quyenue">
                            <?php if($r['quyen'] == '2') { ?>
                                <option value="2" selected>QLCS</option>
                                <option value="3">QLCM</option>
                            <?php } else { ?>
                                <option value="2">QLCS</option>
                                <option value="3" selected>QLCM</option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div<?php if($r['quyen'] == 3) echo ' style="display: none;"'; ?> id="hienthischoolue">
                        <label for="school"><?=_school?></label>
                        <div class="select-style">
                            <select name="schoolue" id="schoolue">
                            <?php
                                $scuu = $h->query("select id,tieude from school_brand where hide=1");
                                while($rcuu = $h->fetch_array($scuu)){
                            ?>
                                <option value="<?=$rcuu['id']?>"><?=$rcuu['tieude']?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="cfpassword"><?=_kichhoat?></label>
                        <input type="checkbox" id="kichhoatue" name="kichhoatue"<?php if($r['kichhoat'] == 1) echo '  checked'; ?> />
                    </div>
                    <div>
                        <input type="button" class="gui" id="editurrr" value="<?=_edit?>" />
                    </div>