<?php 
	error_reporting(0);
	session_start(); 
	include("conn.php");
	if($_SESSION['is_org'])
	{
		$curorg=$_SESSION['user'];
	}
	else
	{
		$curuser=$_SESSION['user'];
	}
	$sql = "SELECT * FROM account WHERE username = '$curuser'";
	$sql2 = "SELECT * FROM account_org WHERE org_name = '$curorg'";
	$query = mysqli_query($conn,$sql);
	$query2 = mysqli_query($conn,$sql2);
	$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
	$row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC);
	$orgpage = $row2["org_main_page"];
	$myorg = $row["org1"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>社团学生组织招新平台</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/main.css" type="text/css">
	<link rel="stylesheet" href="../css/intro_a.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="title">
			<p>社团学生组织招新平台</p>
		</div>
		<div class="search">
			<form action="search.php" method="post">
	            <input type="text" placeholder="请输入社团/学生组织名称..." name="searchContent" id="searchContent" />
	            <input type="submit" name="search" value="搜索" id="search">
            </form>
        </div>
        <div class="login">
        	<?php if($_SESSION['user'])
        	{ 
        		echo '你好，'.$_SESSION['user'];
        	?>
        	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
        	<a href="logout.php">登出</a>
        	<?php }else{ ?>
        	<a href="login.php">登录</a>
        	<a href="register.php">注册</a>
        	<?php } ?>
        </div>
	</div>
	
	<div class="nav">
		<ul class="menubar">
			<li class="menu-value"><a href="../html/index.php">首页</a></li>
			<li class="" ><a href="../html/info.php">浏览社团</a></li>
			<li class="" >
				<?php if($_SESSION['is_org']){ ?>
					<a href="<?php echo $orgpage ?>">我的社团</a>
				<?php }else{ ?>
					<a href="<?php echo $myorg ?>">我的社团</a>
				<?php } ?>
			</li>
			<li class="" ><a href="../html/apply.php">申请</a></li>
		</ul>
	</div>
	<div class="window">
		<div class="content">
			<ul>
				<li><a href="cg_art_space.php">CG艺术空间</a></li>
				<li><a href="photographing.php">摄影协会</a></li>
				<li><a href="">独立音乐协会</a></li>
				<li><a href="">折纸协会</a></li>
				<li><a href="">太阳剧社</a></li>
				<li><a href="">黑白漫画社</a></li>
			</ul>
		</div>
	</div>
</body>
</html>