<?php
    $erru = '';
    $errp = '';
    if(isset($_POST['send'])){
        $user = trim($_POST['username']);
        $mk = mahoa(trim($_POST['password']));
        $s = $h->query("select id,hoten,password from admin where username='".$user."' and kichhoat=1");
        $n = $h->num_rows($s);
        if(!$n) {
            $erru = _noexistuser;
        } else {
            $r = $h->fetch_array($s);
            if($mk == $r['password']){
                $_SESSION['idadmin'] = $r['id'];
                $_SESSION['uad'] = $r['hoten'];
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
                <label for="username"><?=_username?>:</label>
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