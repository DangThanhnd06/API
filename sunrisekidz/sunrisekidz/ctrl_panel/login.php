<?php
@session_start();
require("../require_inc.php");
$landangnhap = date("d/m/Y, g:i A");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web content management system</title>
<link href="rounded.css" rel="stylesheet" type="text/css" />
<link href="../img/icon.png" rel="icon" />
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="460" height="320" bgcolor="#FFFFFF" align="center">
<tr><td align="center" valign="middle" width="100%">
	<div id="content-box" align="center">
		<div class="padding">
			<div id="element-box" class="login">
				<div class="t">
					<div class="t">
						<div class="t"></div>
					</div>
				</div>
				<div class="m">
							<h1>Login</h1>
							<table border="0" cellpadding="5" cellspacing="0" width="95%" height="200" align="center">
							<tr>
							<td width="40%" valign="top" align="justify" class="noidung">
								<p>Use the admin account to access the Website Administration Tool.</p>
								<p>
									<a href="../">Return to home page</a>
								</p>
								<p>
									<img src="images/j_login_lock.jpg" border="0" align="absmiddle">
								</p>
							</td>
						<td align="center" valign="top" width="60%" class="noidung">
							<div id="section-box">
								<div class="t">
									<div class="t">
										<div class="t"></div>
									</div>
								</div>
								<div class="m">
								<table border="0" cellpadding="5" cellspacing="0" width="95%" height="150" align="center">
		<form name="login" method="post" action="login.php" onSubmit="return ktra_dangnhap();">
        <tr>
                <td width="40%" align="left">&nbsp;<span class="login">Username</span></td>
                <td width="60%" align="left"><input type="text" id="user" name="user" size="18" style="font-family: Tahoma; font-size: 8pt; border: 1px solid #808000; -webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;" maxlength="18" onKeyPress="if ( (event.keyCode < 97 || event.keyCode > 122) && (event.keyCode < 65 || event.keyCode > 90) && (event.keyCode < 48 || event.keyCode > 57)) event.returnValue = false;">
				<script language="JavaScript" type="text/javascript">if(document.getElementById) document.getElementById('username').focus();</script>
				</td>
        </tr>
        <tr>
                <td align="left">&nbsp;<span class="login">Password</span></td>
                <td align="left"><input name="pass" type="password" id="pass" style="font-family: Tahoma; font-size: 8pt; border: 1px solid #808000; -webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;" size="18" maxlength="18"></td>
        </tr>	
		<!--<tr>
                <td align="left">&nbsp;<span class="login">Quyền</span></td>
                <td align="left">
					<select name="per">
						<option value="1" selected>Admin</option>
						<option value="2">Cập nhật tin</option>
					</select>
				</td>
        </tr>-->	
        <tr>
                <td colspan="2" align="center">
                        <input type="submit" value="Login" name="login" class="submit">&nbsp;
                        <input type="reset" value="Reset" name="reset" class="submit">
                </td>
        </tr>
		<tr><td height="10"></td></tr>
        </form>
	</table>
								</div>
								<div class="b">
									<div class="b">
										<div class="b"></div>
									</div>
								</div>
							</div>
							<div id="lock"></div>
							<div class="clr"></div>
							</td></tr></table>
				</div>
				<div class="b">
					<div class="b">
						<div class="b"></div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</td></tr>
</table>
<?php
	if(isset($_POST['login']))
	{
		$user=$_POST['user'];
		//$user= addslashes( $user);
		$p=trim($_POST['pass']);
		$password = mahoa($p);
		$query=$h->query("select * from h_admin where user='".$user."'");
		$result=$h->fetch_array($query);
		$row=$h->num_rows($query);
		if ($row!=0)
		{
			if($password==$result["pass"])
			{	
				$_SESSION["islogin"] = $user;
				$_SESSION['isLoggedIn'] = true;
				$_SESSION['tenuser'] = $result['tenuser'];
				$_SESSION['nhomq'] = $result['nhomqt'];
				$s = $h->query("update h_admin set landangnhap='$landangnhap' where user='".$_SESSION['islogin']."'");
				header("Location: ../ctrl_panel/");
			}
			else
			{
				echo "<div align='center' class='style23'>Password is incorrect. Please re-enter</div>";
			}
		}
		else
		{
			echo "<div align='center' class='style23'>Username does not exist. Please re-enter</div>";
		}
	}
?>
</body>
</html>