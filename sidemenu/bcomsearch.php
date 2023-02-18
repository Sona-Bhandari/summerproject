
 <!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>B.com Class NIST College</title>
<link rel="stylesheet" href="css/styles1.css" type="text/css">	
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">	
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>	
<style>


.insert,.search input,.search button,.sidemenu ul li{ background: white;padding: 9px 22px; border:1px solid blue;}
.maintext{ color:green; font-weight:bold;font-size:17pt;text-align:center;padding:13px;}
.marginl a{ color:blue;}
.sidemenu{ border:1px solid blue; border-right: none;border-radius:12px 0 0 0px ;padding:4px;padding-right:0;background:#aa2;width:220px;height:400px;}
.sidemenu ul{  list-style-type: none; }
.sidemenu ul li{border-right: none;border-radius:12px 0 0 12px ; margin: 22px 0; }
#selectedli{ background:#8ff; }
.admincontent{ margin-left: 22px;  width:800px; min-height:  380px; background:#aa2;padding: 14px; border:1px solid blue; border-left:none;border-radius:0 12px 0 0px }


.search input{ width:111px;border-right: none;border-radius:12px 0 0 12px ; }
.search button{ border-left:none;border-radius:0 12px 12px 0 ;}
.insert{ border-radius: 12px; }
.admincontent div{margin:11px 4px;}


.studentlist{clear: both; font-family: sans-serif;}


.titlelist ul{list-style-type: none; display: inline; border-radius: 12px 12px 0 0;}
.titlelist ul li{ float:left; background: white;width:150px; padding: 9px 8px; border:1px solid blue;border-right: none;border-bottom:none;}
.titlelist ul li:first-child{ width:50px;border-radius: 12px 0 0 0; }
.titlelist ul li:last-child{ border-radius:0 12px 0 0 ;border-right:1px solid blue; }


.detaillist ul{ list-style-type: none;display:inline;  font-size:small; }
.detaillist ul li{ float: left;background: white;width:150px;max-width: 150px ;padding: 9px 8px;border-left:1px solid blue; margin-bottom: 3px;}
.detaillist ul li:first-child{width:50px;clear: both; }
.detaillist ul li:last-child{border-right: 1px solid blue;}

.msg{ background:#aa2; padding:14px 10px; width:50%;color:blue; border:2px solid white; border-radius:30%;}

</style>

</head>
<body>
<div class="marginl" >
		<div class="maintext"><hr>
			B.COM Class Database <hr>
		</div>


		<div class="sidemenu fleft">
			<ul>
				<li><a href="adminpanel.php"><i class="fa fa-user-circle fa-fw"></i>Admin Panel</a>    </li>
				<li ><a href="dcomeview.php"><i class="fa fa-pencil fa-fw "></i> D.com Class</a>    </li>	
				<li id ="selectedli"><a href="bcomeview.php"><i class="fa fa-book fa-fw"></i> B.com Class</a>    </li>
				<li><a href=""><i class="fa fa-graduation-cap fa-fw"></i> M.com Class</a>	</li>
				<li><a href=""><i class="fa fa-bar-chart fa-fw"></i> Manage Results</a>	</li>
				<li><a href=""><i class="fa fa-search fa-fw"></i> Search Record</a>	</li>
			</ul>
		</div>

		<div class="admincontent fleft">
			<div>


					<div class="fleft insert">
								 <a href="bcomform.php"><i class="fa fa-plus-circle fa-fw"></i> Insert New Record</a>
					</div>

					<div class="fleft insert sphover">
								 <a href="bcomview.php"><i class="fa fa-database fa-fw"></i> All Student Database</a>
					</div>
					<div class="search fright">
						<form action="bcomsearch.php" method="GET">

							<input type="text" name="search" placeholder="Roll_no or Name" />
							<button type="submit" name="submit" value="Search" ><i class="fa fa-search"></i></button>
						</form>
					</div>

			</div>
<center>
			<div class="studentlist">
							<div class="titlelist">
								<ul>
									<li>Sr.no</li>
									<li>Roll No</li>
									<li>Student Name</li>
									<li>Father Name</li>
									<li><i class="fa fa-gear fa-fw"></i> Modification</li>
								</ul>

							</div>	

<?php

if(isset($_GET['search'])){
	
	$con = mysqli_connect("localhost","root","",'fk');
		
		$search_rec = $_GET['search'];
		$search_query = "select * from bcom where student_name='$search_rec' OR roll_no='$search_rec' ";
		
		
		$i=1;
		
		$run2 = mysqli_query($con,$search_query);
		$run3 = mysqli_query($con,$search_query);
		
		$check=mysqli_fetch_assoc($run3);
			if($check==false)
			{
				echo "<br><br><div class='msg'> <i class='fa fa-times fa-lg fa-fw'></i>No result found for :". $_GET['search']."</div>";
			}
		while ($row=mysqli_fetch_assoc($run2))
		{$del=$row["sid"]; $edit=$row["sid"];$det=$row["sid"];


         echo " <div class='detaillist'>

								<ul >
									<li>".$i."</li>
									<li>". $row["roll_no"] ."</li>
									<li>". $row["student_name"]  ."</li>
									<li>". $row["father_name"]  ."</li>
									<li>
										<a href='bcomedited.php?edit=$edit'><i class='fa fa-edit fa-lg fa-fw'></i></a>
										<a href='bcomdelete.php?del=$del'><i class='fa fa-remove fa-lg fa-fw'></i></a>
										<a href='bcomdetail.php?detail=$det'><i class='fa fa-info-circle fa-lg fa-fw'></i></a>
									</li>
								</ul>

					</div>
				";
				$i++;
			}
		}
?>
			</div>
</center>		

		</div>	


</div>

</body>
</html>
