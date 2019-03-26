<div id="content">
                <div class="searchsl">
                    <div  class="search">
                        <?=_search?>
                    </div>
                    <div class="ctsearch">
                        <div class="select-style">
                            <select name="frm" id="frm">
                                <option value="0"><?=_from?></option>
                                <option value="1"><?=_headteacher?></option>
                                <option value="2"><?=_teacher?></option>
                            </select>
                        </div>
                        <div class="select-style">
                            <select name="too" id="too">
                                <option value="0"><?=_to?></option>
                                <option value="2"><?=_teacher?></option>
                                <option value="1"><?=_headteacher?></option>
                            </select>
                        </div>
                        <div class="select-style">
                            <select name="actde" id="actde">
                                <option value="0"><?=_actdetail?></option>
                                <option value="1"><?=_addnta?></option>
                                <option value="2"><?=_addffc?></option>
                                <option value="3"><?=_edittl?></option>
                            </select>
                        </div>
                        <input class="butt" type="button" id="slog" value="<?=_search?>" />
                    </div>
                    <div class="download">
                        <a class="addcr"><?=_download?></a>
                    </div>
                </div>
                <div class="rightsl">
                    <div class="title">
                        <p class="dmy">D/M/Y</p>
                        <p class="accountn"><?=_accname?></p>
                        <p class="actdem"><?=_actdetail?></p>
                        <p class="from"><?=_from?></p>
                        <p class="to"><?=_to?></p>
                        <p class="clr"></p>
                    </div>
                    <div class="cten">
                    <?php
                        $sl = $h->query("select *  from log order by id desc");
                        $i = 0;
                        while($rl = $h->fetch_array($sl)){
                            if($i%2==0) $cl = "even";
                            else $cl = 'odd';
                            if($rl['accountname']==0) $acc = "Admin";
                            else {
                                $st = $h->query("select fname,mname from teacher where id=".$rl['accountname']);
                                $rt = $h->fetch_array($st);
                                if($lang=='vn') $acc = $rt['fname'].' '.$rt['mname'];
                                else $acc = change($rt['fname'].' '.$rt['mname']);
                            }
                            if($rl['actiondetail']==3) {
                                $acd = _edittl;
                                if($rl['fromm']==1){
                                    $f = _headteacher;
                                    $t = _teacher;
                                    $stt = $h->query("select fname,mname from teacher where id=".$rl['forr']);
                                    $rtt = $h->fetch_array($stt);
                                    if($lang=='vn') $accc = $rtt['fname'].' '.$rtt['mname'];
                                    else $accc = change($rtt['fname'].' '.$rtt['mname']);
                                    $fr = $f.': '.$accc;
                                    $tt = $t.': '.$accc;
                                } else {
                                    $f = _teacher;
                                    $t = _headteacher;
                                    $stt = $h->query("select fname,mname from teacher where id=".$rl['forr']);
                                    $rtt = $h->fetch_array($stt);
                                    if($lang=='vn') $accc = $rtt['fname'].' '.$rtt['mname'];
                                    else $accc = change($rtt['fname'].' '.$rtt['mname']);
                                    $fr = $f.': '.$accc;
                                    $tt = $t.': '.$accc;
                                }
                            }
                            if($rl['actiondetail']==1) {
                                $acd = _addnta;
                                $fr = "&nbsp;";
                                $tt = $rl['too'];
                            }
                            if($rl['actiondetail']==2) {
                                $acd = _addffc;   
                                $fr = "&nbsp;";
                                $tt = $rl['too'];
                            }
                            $datee = substr($rl['date'],0,10);
                        
                    ?>
                        <div class="<?=$cl?>">
                            <p class="dmy"><?=$datee?></p>
                            <p class="accountn"><?=$acc?></p>
                            <p class="actdem"><?=$acd?></p>
                            <p class="from"><?=$fr?></p>
                            <p class="to"><?=$tt?></p>
                            <p class="clr"></p>
                        </div>
                    <?php $i++; } ?>
                    </div>
                </div>
                <p class="clr"></p>
            </div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('select#frm').change(function(){
            var idf = $('#frm').val();
                if($('select#frm option:selected').val()!=0) {
                    $.post("module/show_log.php", {
							id: idf
						},  function(data){
						      var m = data.split(";;;");
							$('select#too').html(m[0]);
                            $('select#actde').html(m[1]);
					});
                } else {
                    $.post("module/show_log2.php", {
							id: idf
						},  function(data){
						      var m = data.split(";;;");
							$('select#too').html(m[0]);
                            $('select#actde').html(m[1]);
					});
                }
        }).change();
        $('#slog').click(function(){
            var frr = $('#frm').val();
            var tot = $('#too').val();
            var actde = $('#actde').val();
            $.post("module/search_log.php",{fr: frr, to: tot, actd: actde}, function(data){
                $('.cten').fadeIn('slow').html(data);
            });
        });
    })
</script>            