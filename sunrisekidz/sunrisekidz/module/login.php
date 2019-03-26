<?php

    $erru = '';

    $errp = '';
    $tgdn = date("d/m/Y H:i:s");
    if(isset($_POST['send'])){

        $user = trim($_POST['username']);
        $mk = mahoa(trim($_POST['password']));
        $s = $h->query("select id,hoten,password,quyen,sc from admin where username='".$user."' and kichhoat=1");
        $n = $h->num_rows($s);
        if(!$n) {
            $ss = $h->query("select id,fname,mname,password,school_id,class_gr from teacher where email='".$user."' and hide=1");
            $nm = $h->num_rows($ss);
            if(!nm)
                $erru = _noexistuser;
            else {
                $rs = $h->fetch_array($ss);
                if($mk == $rs['password']){
                    $_SESSION['idadmin'] = $rs['id'];
                    $_SESSION['quyentruycap'] = 'gvien';
                    $_SESSION['quyenper'] = '4';
                    $_SESSION['schd'] = $rs['school_id'];
                    $_SESSION['classgvcn'] = $rs['class_gr'];
                    $_SESSION['schoolgvcn'] = $rs['school_id'];
                    $data2['tgdangnhap'] = $tgdn;
                    $updatetgdn = $h->query("update teacher set tgdangnhap='".$data2['tgdangnhap']."' where id=".$rs['id']);
                    if($lang == 'vn')
                        $_SESSION['uad'] = $rs['fname'].' '.$rs['mname'];
                    else
                        $_SESSION['uad'] = change($rs['fname'].' '.$rs['mname']);
                    header("Location: ".URL."classes/");
                } else $errp = _invalidpass;
            }
        } else {
            $r = $h->fetch_array($s);
            if($mk == $r['password']){
                $_SESSION['idadmin'] = $r['id'];
                $_SESSION['quyentruycap'] = 'admin';
                $_SESSION['quyenper'] = $r['quyen'];
                $data2['tgdangnhap'] = $tgdn;
                $updatetgdn = $h->query("update admin set tgdangnhap='".$data2['tgdangnhap']."' where id=".$r['id']);
                if($r['quyen'] == 2)
                    $_SESSION['schd'] = $r['sc'];
                else 
                    $_SESSION['schd'] = 0;
                $_SESSION['uad'] = $r['hoten'];
                if($r['quyen'] == 3) header("Location: ".URL."lessons/");
                else
                    header("Location:".$_SERVER["HTTP_REFERER"]);
            } else {
                $errp = _invalidpass;
            }
        }

        

    }

?>

<div id="content">

    <div class="formlg">

        <h1 class="title"><?=_login?></h1>

        <form method="post" action="" onsubmit="return checkform()">

            <p>

                <label for="username"><?=_username?> / Email:</label>

                <input type="text" class="in" name="username" id="username" />

                <span id="infouser" style="color:#ffef00;display:block;padding-left:27%;"><?=$erru?></span>

            </p>

            <p>

                <label for="password"><?=_password?>:</label>

                <input type="password" class="in" name="password" id="password" />

                <span id="infopass" style="color:#ffef00;display:block;padding-left:27%;"><?=$errp?></span>

            </p>

            <p>

                <label>&nbsp;</label>

                <input type="submit" class="gui" name="send" value="<?=_login?>" />

            </p>

        </form> 

    </div>

</div>

<script type="text/javascript">

    function checkform(){

        if($('#username').val()==""){

            $('#infouser').html("<?=_nousername?>");

            $('#username').focus();

            return false;

        } else {

            $('#infouser').html("");

        }

        if($('#password').val()==""){

            $('#infopass').html("<?=_nopassword?>");

            $('#password').focus();

            return false;

        } else {

            $('#infopass').html("");

        }

    }

</script>