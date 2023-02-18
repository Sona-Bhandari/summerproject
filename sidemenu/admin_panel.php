<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">

	<title> Student Data Base Nist College</title>
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

<style>
	.sidebar{
	position: fixed;
	left: 0;
	width:250px;
	height: 100%;
	background:#042331;
}
.sidebar header{
	font-size: 22px;
	color:white;
	text-align: center;
	line-height: 65px;
}
.sidebar ul{ list-style-type: none;  padding: 0;}
.sidebar ul li{ background:url(../images/bg-body.jpg);;border:1px solid blue;padding: 11px 0 11px 11px;  margin:11px 0;border-radius: 22px 0 0 22px; }
.sidebar ul li:hover{ cursor: auto;border-right-color: white; margin-left: 7px;}
.sidebar ul li a{ color:blue; }
.sidebar ul li a:hover{ color: black; }

#open a{ color:black; }
#open{ margin-left: 9px; border-right-color: white;background:#8ff }



.maintext{ color:green; font-weight:bold;font-size:17pt;text-align:center;padding:13px;}
.marginl a{ color:blue;}
.sidemenu{ border:1px solid blue; border-right: none;border-radius:12px 0 0 0px ;padding:4px;padding-right:0;background:#aa2;width:220px;height:400px;}
.sidemenu ul{ list-style-type: none; }
.sidemenu ul li{border:1px solid blue;border-right: none;border-radius:12px 0 0 12px ; margin: 22px 0;  ;padding:9px 22px; background: white;}
#selectedli{ background:#8ff; }
.admincontent{ margin-left: 422px; }




</style>

</head>
<body>
	<div class="sidebar"> 


        <ul >
          
          <li><a href="admin_login.php"><i class="fa fa-ellipsis-v fa-fw "></i>Student Data Base</a></li>
          <li><a href="../managment/managmentpanel.php"><i class="fa fa-ellipsis-v fa-fw "></i></i>Staff Data Base</a></li>
          <li><a href="../fee/feepanel.php"><i class="fa fa-ellipsis-v fa-fw "></i>Fee Data Base</a></li>
          
          <li><a href="../accounts/accountpanel.php"><i class="fa fa-ellipsis-v fa-fw "></i> Accounts DataBase</a></li>
          <li><a href="../DForum/forum.php"><i class="fa fa-ellipsis-v fa-fw "></i>Discussion Forum</a></li>
        </ul>
  </div>
<div class="admincontent">

		<h1> Instructions </h1>
		<ul>
			<li> Be carefull while modifying data.</li>
			<li> Once you have entered wrong information , you can delete edit and delete it.</li>
			<li> When you are inserting a new record dont forget to give them a valid Roll no.</li>
			<li> Once a record is deleted then it will not be undo.</li>
			<li>With form submission, Registration date will be stored in database automatically </li>
		</ul>
		

			



		<div class="sidemenu fleft">
			<ul>
				<li id ="selectedli"><a href="admin_panel.php"><i class="fa fa-user-circle fa-fw"></i>Admin Panel</a>    </li>
				<li><a href="dcomview.php"><i class="fa fa-pencil fa-fw "></i> +2 Class</a>    </li>	
				<li><a href="bcomview.php"><i class="fa fa-book fa-fw"></i> Bachelors  Class</a>    </li>
				</ul>
		</div>
</div>
		



</body>
</html>