<?php

session_start();

if (!isset($_SESSION['username'])){
header('location:login.php');
}

$con=mysqli_connect('localhost','root','','quizdbase');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">

		<br> <h1 class="text-center text-primary">Online Quiz System</h1><br>

		<h2 class="text-center text-success">welcome <?php echo $_SESSION['username']; ?> </h2> <br>

<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 m-auto d-block">
	<div class="card">

			<h3 class="text-center card-header"> welcome <?php echo $_SESSION['username']; ?> you have to select only one out of 4.Best of Luck:)</h3>
			
		</div><br>

		<form action="check.php" method="post">

		<?php

		for($i=1;$i<16;$i++) { 
		$q="SELECT * FROM questions WHERE qid=$i";
		$query=mysqli_query($con,$q);

		while ($rows = mysqli_fetch_array($query)) {
			?>

			<div class="card">
				<h4 class="card-header"><?php echo $rows['question']   ?></h4>
				

				<?php
					$q="SELECT * FROM answers WHERE ans_id=$i";
					$query=mysqli_query($con,$q);

					while ($rows = mysqli_fetch_array($query)) {
					?>

						<div class="card-body">

							<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
							<?php echo $rows['answer']; ?>
							
						</div>


	<?php
		}
		}
	}

		?>


		<input type="submit" name="submit" value="submit" class="btn btn-success m-auto d-block">

</form>
</div>
</div><br><br>
		
		<div class="m-auto d-block">
		<a href="logout.php" class="btn btn-primary"> LOGOUT </a>
		</div><br>

		<div>
			<h5 class="text-center te">@2023 QuizSystem</h5>
		</div><br><br>


	</div>








</body>
</html>