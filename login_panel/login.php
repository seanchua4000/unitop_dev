<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="inner-container">
		<div class="box">
			<div class="align">
				<ul>
					<li id="one1" onclick="setTab('one',1,2)">
						<div class="login_op">Email Login</div>
					</li>
					<li id="one2" onclick="setTab('one',2,2)">
						<div class="login_op">Phone Login</div>
					</li>
				</ul>
			</div>
			
			<div id="con_one_1">
				<h2>UNITOP Email Login</h2>
				<form>
					<input type="text" name="username" class="login_field" placeholder="Email Address">
					<input type="password" name="password" class="login_field" placeholder="Password">

					<div class="align1">
					<input type="checkbox" name="remember_me"><span> Remember me</span> &nbsp; <a href="#">Login with Facebook</a>
					</div>
					
					<input type="submit" value="Login" class="login_btn">
					
					<div class="align1">
					<a href="#">Forget password?</a> &nbsp; <a href="#">Register</a>
					</div>
				</form>
			</div>

			<div id="con_one_2" style="display: none;">
				<h2>UNITOP Phone Login</h2>
				<form>
					<input type="text" name="username" class="login_field" placeholder="Phone number">
					<input type="password" name="password" class="login_field" placeholder="Password">

					<div class="align1">
					<input type="checkbox" name="remember_me"><span> Remember me</span> &nbsp; <a href="#">Login with Facebook</a>
					</div>
					
					<input type="submit" value="Login" class="login_btn">
					
					<div class="align1">
					<a href="#">Forget password?</a> &nbsp; <a href="#">Register</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<script>
function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"hover":"";
con.style.display=i==cursel?"block":"none";
}
}
</script>

</body>
</html>

