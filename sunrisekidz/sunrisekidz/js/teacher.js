jQuery(document).ready(function(){
            jQuery('.addtc').click(function(){
                $('#popup').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
                
            });
            $('.xemgv').live("click",function(){
               var id = $(this).attr('rel');
               $('#loadingg').show();
               $.post("module/view_teacher.php", {
							id: id
						},  function(data){
						    $('#loadingg').hide();
                            $('a.xemgv').parent().removeClass('act');
                            $('a.xemgv[rel="'+id+'"]').parent().addClass('act');
                            $('.righttc').fadeIn('slow').html(data);
					});
            });
            $('.edittcher').live("click",function(){
                var id = $(this).attr('rel');
                $('#loadingg').show();
                $.post("module/teacheredit.php",{id:id},function(data){
                    $('#loadingg').hide();
                    $('#edittccc').fadeIn().html(data);
                    $('#popup4').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    });
                });
            });
            $('.changep').live("click",function(){
               var idp = $(this).attr('rel');
               $('#idpp').val(idp);
               $('#popup6').bPopup({
                	   speed: 650,
                       transition: 'slideIn',
                       transitionClose: 'easeOutCubic'
                    }); 
            });
            $('.edititc').live("click",function(){
                var idim = $(this).attr('rel');
                $('#idimg').val(idim);
                $('#popup2').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                });
            });
            $('.elv').live("click",function(){
               var idlve = $(this).attr('rel');
               $.post("module/level.php", {
							idlve: idlve
						},  function(data){
                            $('#changelv').fadeIn('slow').html(data);
					});
               $('#popup3').bPopup({
            	   speed: 650,
                   transition: 'slideIn',
                   transitionClose: 'easeOutCubic'
                }); 
            });
            $('select#clevel').live("change",function(){
                var idllv = $('#idlv').val();
                if($('select#clevel option:selected').val()==2) {
                    $.post("module/show_head.php", {
							id: idllv
						},  function(data){
							$('#report').show();
                            $('#report').fadeIn('slow').html(data);
					});
                }
                if($('select#clevel option:selected').val()==1) {
                    $('#report').hide();
                }
            }).change();
            
            $('#editlv').live("click",function(){
               var idlllv = $('#idlv').val();
               var lev = $('#clevel').val();
               if(lev == 2) {
                    if($('#creportto').val()==0){
                        $('p.thongbao').html('<?=_norep?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#reportto').focus();
                        return false;
                    } else {
                        var idrp = $('#creportto').val();
                    }
               } else var idrp = 0;
               $.post("module/editlv.php", {
							id: idlllv,
                            level: lev,
                            reportto: idrp
						},  function(data){
							bclose3();
                            var m = data.split("level;;level");
                            $('ul.headteacher').fadeIn('slow').html(m[0]);
                            $('#reportttt').fadeIn().html(m[1]);
                            $('#levell').fadeIn().html(m[2]);
					});
            });
            
            jQuery('.scrollbar-macosx').scrollbar();
            jQuery('.form').scrollbar();
            $('.csc').click(function(){
                $('.schoolhide').toggle('slow');
            });
            $('.chontruong').live("click",function(){
               var id = $(this).attr('rel');
               if(id == 1) var ttt = "Hàng Than";
               if(id == 2) var ttt = "Nguyễn Ngọc Vũ";
               if(id == 3) var ttt = "IPH";
               $('.schoolhide').hide(); 
               $('#loading').show();
               $.post("module/xemgvtruong.php", {
                        idt: id
                    }, function(data){
                        $('#loading').hide();
                        $('#tentruong').html(ttt);
                        $('.headteacher').fadeIn().html(data);
                    }
               );
            });
            
            $('a.tree[type="0"]').live("click",function(){
               var idht = $(this).attr('rel');
               $('ul#'+idht).show('slow');
               $('a.tree').removeAttr('type');
               $('a.tree').attr('type','1');
               $('a.tree img').attr('src','img/down_ht.png');
            });
            $('a.tree[type="1"]').live("click",function(){
               var idht = $(this).attr('rel');
               $('ul#'+idht).hide('slow');
               $('a.tree').removeAttr('type');
               $('a.tree').attr('type','0');
               $('a.tree img').attr('src','img/right_ht.png');
            });
            
            $('#gui').live("click",function(){
                if($('#cs').val()==0){
                    $('p.thongbao').html('<?=_nocs?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cs').focus();
                    return false;
                }
                $('select#cs').live("change",function(){
                    var idsc = $('#cs').val();
                    $.post("module/show_report.php", {
    					idsc: idsc
     				},  function(data){
                        $('select#reportto').html(data);
     				});
                }).change();
                if($('#teacher_id').val()==""){
                    $('p.thongbao').html('<?=_notcid?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#teacher_id').focus();
                    return false;
                }
                if($('#fname').val()==""){
                    $('p.thongbao').html('<?=_nofname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#fname').focus();
                    return false;
                }
                if($('#mname').val()==""){
                    $('p.thongbao').html('<?=_nomname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mname').focus();
                    return false;
                }
                /*
                if($('#lname').val()==""){
                    $('p.thongbao').html('<?=_nolname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#lname').focus();
                    return false;
                }*/
                if($('#nationality').val()==""){
                    $('p.thongbao').html('<?=_nonationality?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#nationality').focus();
                    return false;
                }
                if($('#onumber').val()==""){
                    $('p.thongbao').html('<?=_noonumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#onumber').focus();
                    return false;
                }
                if($('#mnumber').val()==""){
                    $('p.thongbao').html('<?=_nomnumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mnumber').focus();
                    return false;
                }
                if($('#email').val()==""){
				    $('p.thongbao').html('<?=_noemail?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#email').focus();
				    return false;
				} else {
				    var emmvv = $('#email').val();
				    var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filterr.test(emmvv)) {
				        $('p.thongbao').html('<?=_emailinvalid?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#email').focus();
						return false;
					}else{
					    var email = $('#email').val();
					}
                }
                if($('#cfemail').val()==""){
				    $('p.thongbao').html('<?=_nocfemail?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfemail').focus();
				    return false;
				} else {
				    var emmv = $('#cfemail').val();
				    var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filterr.test(emmv)) {
				        $('p.thongbao').html('<?=_emailinvalid?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#cfemail').focus();
						return false;
					}else{
					    var cfemail = $('#cfemail').val();
					}
                }
                if(email !== cfemail){
                    $('p.thongbao').html('<?=_emailnotmatch?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfemail').focus();
				    return false;
                }
                /*if($('#password').val()==""){
				    $('p.thongbao').html('<?=_nopass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#password').focus();
				    return false;
				} else {
				    var pas = $('#password').val();
                }
                if($('#cfpassword').val()==""){
				    $('p.thongbao').html('<?=_nocfpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfpassword').focus();
				    return false;
				} else {
				    var cfp = $('#cfpassword').val();
                }
                if(pas !== cfp){
                    $('p.thongbao').html('<?=_passnotmatch?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfpassword').focus();
				    return false;
                }*/
                if($('#class_gr').val()==""){
                    $('p.thongbao').html('<?=_nocg?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#class_gr').focus();
                    return false;
                }
                var lvel = $('#level').val();
                if(lvel == 2){
                    if($('#reportto').val()=="0"){
                        $('p.thongbao').html('<?=_norep?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#reportto').focus();
                        return false;
                    }
                }
                if($('#file-1').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-1').focus();
                    return false;
                }
                $('#formadtc').ajaxForm({
                    beforeSend: function() {
                        $('#gui').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                                /*var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);*/
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#gui').removeAttr('disabled');
                        var mn = xhr.responseText;
                        var m = mn.split(";;;");
                       	if(m[0] == '1'){
                       	        bclose();
                 				$('p.thongbao').html('<?=_addtcsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 5000
                                });
                                $('ul.headteacher').html(m[1]);
                                $('#cs').val('0');
                                $('#teacher_id').val('');
                                $('#fname').val('');
                                $('#mname').val('');
                                $('#lname').val('');
                                $('#gender').val('1');
                                $('#nationality').val('');
                                $('#onumber').val('');
                                $('#mnumber').val('');
                                $('#email').val('');
                                $('#cfemail').val('');
                                $('#password').val('');
                                $('#cfpassword').val('');
                                $('#fb').val('');
                                $('#class_gr').val('');
                                $('#level').val('2');
                                $('#reportto').val('0');
                                $('#file-1').val(''); 
                    			}else {
                    			     if(xhr.responseText == '3'){
                        				$('p.thongbao').html('<?=_tcidexist?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#teacher_id').focus();
                                        return false;
                        			} else {
                        			     if(xhr.responseText == '2'){
                            				$('p.thongbao').html('<?=_emailexist?>');
                                            $('#popup5').bPopup({
                                                autoClose: 1500
                                            });
                                            $('#email').focus();
                                            return false;
                            			} else {
                            			     $('#daxong').html(xhr.responseText);
                           				     $('#daxong').css('color','red');
                                             $('html, body').animate({scrollTop: $("#daxong").offset().top}, 2000);
                                         }
                        			}
                    			     
                    			}
                        	}
                        });
            });           
            $('#editimg').live("click",function(){
               if($('#file-2').val()==""){
                    $('p.thongbao').html('<?=_noimage?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#file-2').focus();
                    return false;
                }
                $('#formeimg').ajaxForm({
                    beforeSend: function() {
                        $('#editimg').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                                /*var percentVal = '100%';
                                bar.width(percentVal)
                                percent.html(percentVal);*/
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#editimg').removeAttr('disabled');
       	                bclose2();
           				$('p.thongbao').html('<?=_changimgsucc?>');
                        $('#popup5').bPopup({
                            autoClose: 1000
                        });
                        $('#file-2').val(''); 
                        $('.anh img').attr('src','upload/teacher/'+xhr.responseText);
           	        }
                }); 
            });
            
            // change pass
            $('#cpw').live("click",function(){
               if($('#oldpassword').val()==""){
				    $('p.thongbao').html('<?=_nooldpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#oldpassword').focus();
				    return false;
				} else {
				    var opas = $('#oldpassword').val();
                }
                if($('#newpassword').val()==""){
				    $('p.thongbao').html('<?=_nonewpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#newpassword').focus();
				    return false;
				} else {
				    var npas = $('#newpassword').val();
                }
                if($('#cfnpassword').val()==""){
				    $('p.thongbao').html('<?=_nocfpass?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfnpassword').focus();
				    return false;
				} else {
				    var cfnp = $('#cfnpassword').val();
                }
                if(npas !== cfnp){
                    $('p.thongbao').html('<?=_passnotmatch?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#cfnpassword').focus();
				    return false;
                } 
                var idpp = $('#idpp').val();
                $('#loading').show();
                $.post("module/cp_teacher.php",{
                    id: idpp,
                    mkcu: opas,
                    mk: npas
                    }, function(data){
                            $('#loading').hide();
                            if(data == 1){
                                bclose6();  
                                $('p.thongbao').html('<?=_changepsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 1500
                                });
                                $('#oldpassword').val('');
                                $('#newpassword').val('');
            				    $('#cfnpassword').val('');
            				    return false;
                            } else {
                                if(data == 2){
                                    $('p.thongbao').html('<?=_oldpwrong?>');
                                    $('#popup5').bPopup({
                                        autoClose: 1500
                                    });
                				    $('#oldpassword').focus();
                				    return false;
                                }
                            }
                });
            });
            
            // edit teacher 
            $('#guiedit').live("click",function(){
                if($('#cse').val()==0){
                    $('p.thongbao').html('<?=_nocs?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#cse').focus();
                    return false;
                }
                $('select#cse').live("change",function(){
                    var idsc = $('#cse').val();
                    $.post("module/show_report.php", {
    					idsc: idsc
     				},  function(data){
                        $('select#reporttoe').html(data);
     				});
                }).change();
                if($('#teacher_ide').val()==""){
                    $('p.thongbao').html('<?=_notcid?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#teacher_ide').focus();
                    return false;
                }
                if($('#fnamee').val()==""){
                    $('p.thongbao').html('<?=_nofname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#fnamee').focus();
                    return false;
                }
                if($('#mnamee').val()==""){
                    $('p.thongbao').html('<?=_nomname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mnamee').focus();
                    return false;
                }
                /*
                if($('#lnamee').val()==""){
                    $('p.thongbao').html('<?=_nolname?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#lnamee').focus();
                    return false;
                }*/
                if($('#nationalitye').val()==""){
                    $('p.thongbao').html('<?=_nonationality?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#nationalitye').focus();
                    return false;
                }
                if($('#onumbere').val()==""){
                    $('p.thongbao').html('<?=_noonumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#onumbere').focus();
                    return false;
                }
                if($('#mnumbere').val()==""){
                    $('p.thongbao').html('<?=_nomnumber?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#mnumbere').focus();
                    return false;
                }
                if($('#emaile').val()==""){
				    $('p.thongbao').html('<?=_noemail?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
				    $('#emaile').focus();
				    return false;
				} else {
				    var emmve = $('#emaile').val();
				    var filterr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				    if (!filterr.test(emmve)) {
				        $('p.thongbao').html('<?=_emailinvalid?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
				        $('#emaile').focus();
						return false;
					}else{
					    var email = $('#email').val();
					}
                }
                if($('#class_gre').val()==""){
                    $('p.thongbao').html('<?=_nocg?>');
                    $('#popup5').bPopup({
                        autoClose: 1500
                    });
                    $('#class_gre').focus();
                    return false;
                }
                var lvele = $('#levele').val();
                if(lvele == 2){
                    if($('#reporttoe').val()=="0"){
                        $('p.thongbao').html('<?=_norep?>');
                        $('#popup5').bPopup({
                            autoClose: 1500
                        });
                        $('#reporttoe').focus();
                        return false;
                    }
                }
                //alert($('#file-3').val());
                $('#edittccc').ajaxForm({
                    beforeSend: function() {
                        $('#guiedit').attr("disabled",true);
                        $('#loading').show();
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                                
                    },
                    success: function() {
                    },
                   	complete: function(xhr) {
                	    $('#loading').hide();
                        $('#guiedit').removeAttr('disabled');
                        var mn = xhr.responseText;
                        var m = mn.split(";;;");
                       	if(m[0] == '1'){
                       	        bclose4();
                 				$('p.thongbao').html('<?=_changetcsucc?>');
                                $('#popup5').bPopup({
                                    autoClose: 5000
                                });
                                $('ul.headteacher').html(m[2]);
                                $('.righttc').html(m[1]);
                    			}else {
                    			     if(m[0] == '3'){
                        				$('p.thongbao').html('<?=_tcidexist?>');
                                        $('#popup5').bPopup({
                                            autoClose: 1500
                                        });
                                        $('#teacher_id').focus();
                                        return false;
                        			} else {
                        			     if(m[0] == '2'){
                            				$('p.thongbao').html('<?=_emailexist?>');
                                            $('#popup5').bPopup({
                                                autoClose: 1500
                                            });
                                            $('#email').focus();
                                            return false;
                            			}
                        			}
                    			     
                    			}
                        	}
                        });
            });
        });