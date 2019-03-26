<?php
    $sb = $h->query("select noidung from h_html where id=24");
    $rb = $h->fetch_array($sb);
?>
<div id="lienhe">
        	<div class="banner"><img src="upload/<?=$rb['noidung']?>"  alt="Banner liên hệ" /></div>
            <p class="pankuzu">Liên hệ</p>
            <h2>Liên hệ</h2>
            <script type="text/javascript" src="js/jquery.autosize.js"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        $('#noidung').autosize({append: "\n"});
                    });
                </script>
            <div class="box_cont">
            	<div class="form">
                	<p class="title01"><?=$r2['noidung']?></p>
                    <p class="title02"><?=$r3['noidung']?></p>
                    <p>Địa chỉ: <?=$r8['noidung']?></p>
                    <p>Tel: <?=$r9['noidung']?></p>
                    <p>Skype: <a href="skype:<?=$r6['noidung']?>?chat"><?=$r6['noidung']?></a></p>
                    <p>Yahoo: <a href='ymsgr:sendIM?<?=$r5['noidung']?>'><?=$r5['noidung']?></a></p> 
                    <p>Email: <a href="mailto:<?=$r7['noidung']?>"><?=$r7['noidung']?></a></p>
                    <p>Website: 
                    <?php 
                            $mw = explode(", ",$r10['noidung']);
                            $co = count($mw);
                            $iw = 1;
                            foreach($mw as $web){
                                if($co == 1){
                                    $ms1 = '<a href="http://'.$web.'">'.$web.'</a>';
                                    $ms2 = '';
                                    $ms3 = '';
                                }
                                    
                                if($co == 2){
                                    if($iw==1)
                                        $ms1 = '<a href="http://'.$web.'">'.$web.'</a>, ';
                                    else
                                        $ms2 = '<a href="http://'.$web.'">'.$web.'</a>';
                                    $ms3 = '';
                                }
                                if($co == 3){
                                    if($iw==1)
                                        $ms1 = '<a href="http://'.$web.'">'.$web.'</a>, ';
                                    elseif($iw==2)
                                        $ms2 = '<a href="http://'.$web.'">'.$web.'</a>, ';
                                    else
                                        $ms3 = '<a href="http://'.$web.'">'.$web.'</a>';
                                }    
                                $iw++;
                            }
                            echo $ms1.$ms2.$ms3;
                        ?>
                    </p>
                    <div class="box_map">
                    	<div class="map">
                     <?php
                        $s11 = $h->query("select noidung from h_html where id=11");
                        $r11 = $h->fetch_array($s11);
                        echo $r11['noidung'];
                     ?>
                        </div>
                     <form>
                    	<input type="text" value="" class="input" id="hoten" placeholder="Họ tên" />
                        <span id="infohoten" style="display: block;"></span>
                        <input type="text" value="" class="input" id="email" placeholder="Email" />
                        <span id="emailinfo" style="display: block;"></span>
                        <textarea class="area" id="noidung" placeholder="Nội dung liên hệ"></textarea>
                        <span id="noidunginfo" style="display: block;"></span>
                    	<input type="button" class="sent" id="send" value="Gửi" /> <img id="loading" src="img/loading.gif" alt="Loading ..." style="display: none;" />
                        <span id="daguixong" style="padding: 10px 0;display:block;"></span>
                    </form>
                    </div>
                </div><!--form-->
                <script type="text/javascript">
 jQuery(document).ready(function($){
    $('#send').click(function(){
						// check #hoten
							if($('#hoten').val()==""){
								$('#infohoten').html("Bạn chưa điền họ tên. Vui lòng điền vào!");
								$('#infohoten').css('color','red');
								$('#hoten').focus();
								return false;
							} else {
									$('#infohoten').html("");
									var hoten = $('#hoten').val();
							}
						// check #email
							if($('#email').val()==""){
								$('#emailinfo').html("Bạn chưa điền địa chỉ email. Vui lòng điền vào!");
								$('#emailinfo').css('color','red');
								$('#email').focus();
								return false;
							} else {
									var emmvv = $('#email').val();
									var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
									if (!filterr.test(emmvv)) {
										$('#emailinfo').html("Địa chỉ email chưa hợp lệ. Vui lòng điền lại!");
										$('#emailinfo').css('color','red');
										$('#email').focus();
										return false;
									}else{
										$('#emailinfo').html("");
										var email = $('#email').val();
									}
							}
						// check #nd
							if($('#noidung').val().length < 1){
								$('#noidunginfo').html("Bạn chưa điền nội dung liên hệ. Vui lòng điền vào!");
								$('#noidunginfo').css('color','red');
								$('#noidung').focus();
								return false;
							} else {
									$('#noidunginfo').html("");
									var nd = $('#noidung').val();
							}
						$('#send').attr("disabled",true);
                        $('#loading').show();
						$.post("module/process_lienhe.php", {
							hoten: hoten,
							email: email,
							nd: nd
						},  function(data){
							if(data == 2) {
							 $('#daguixong').fadeIn('slow').html('loi roi');
							 $('#daguixong').css('color','red');
                             $('#send').removeAttr("disabled");
                             $('#loading').hide();
							}
							else {
								$('#daguixong').fadeIn('slow').html("Cảm ơn bạn đã liên hệ với chúng tôi. Ý kiến của bạn đã được ghi nhận. Chúng tôi sẽ phản hồi bạn sớm nhất có thể !");
								$('#daguixong').css('color','green');
								$('#hoten').val('');
								$('#email').val('');
								$('#noidung').val('');
                                $('#send').removeAttr("disabled");
                                $('#loading').hide();
							}
					});
			});
 });
</script>
            </div><!--box_cont-->
         </div>
         