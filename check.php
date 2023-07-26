<?php
session_start();

	$con=mysqli_connect('localhost','root','','quizdbase');
?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style type="text/css">
	.animateuse{
		animation: leelaanimate 0.5s infinite;
	}

	@keyframes leelaanimate{
		0%{color:red},
		10%{color:yellow},
		20%{color:blue}
		40%{color:green},
		50%{color:pink}
		60%{color:orange},
		80%{color:black},
		100%{color:brown}		
	}
</style>
</head>
<body>
	<div class="container text-center">
		<br/><br/>
		<h1 class="text-center text-success text-uppercase animateuse"> QUIZ SYSTEM</h1>
		<br/><br/><br/><br/>
	<table class="table text-center table-bordered table-hover">
		<tr>
			<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
		</tr>
		<tr>
			<td>
				Question Attempted
			</td>
			<?php
			$Resultans=0;
			if(isset($_POST['submit'])){
			if(!empty($_POST['quizcheck'])){

			$checked_count=count($_POST['quizcheck']);

			?>

			<td>
				<?php
				echo "out of 15, you have attempt".$checked_count."option."?>
			</td>

			<?php
			$selected=$_POST['quizcheck'];

			$q1="SELECT * FROM questions";
			$ansresults=mysqli_query($con,$q1);
			$i=1;
			while($rows=mysqli_fetch_array($ansresults)){
				$flag=$rows['ans_id']==$selected[$i];

					if($flag){
						$Resultans++;
					}else{

					}
				$i++;
			}
			?>

			<tr>
				<td>
					Your Total Score
				</td>
				<td colspan="2">
				<?php
				echo "Your Score is".$Resultans.".";
			}
			else{
				echo "<b>Please Select Atleast One Option.</b>";
			}
		}
			?>
		</td>
	</tr>

<?php

$name=$_SESSION['username'];
$finalresult="INSERT INTO usersession(username,u_q_id, u_a_id) VALUES ('$name','5','$Resultans')";
$queryresult=mysqli_query($con,$finalresult);
?>
</table>

<a href="logout.php" class="btn btn-sucess">LOGOUT</a>
</div>
</body>
</html>











