<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
		    Generate a Quiz
		</title>
		
		<meta charset="utf-8">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		 <!-- Latest compiled and minified CSS --> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/styles.css?<?php echo time()?>">
		<link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript --> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
        a[title*="000webhost"]
        {
                display: none !important;
        }

           </style>
	</head>
	<body>
		<div class="container">
		<div class="jumbotron text-center"><h1 style="font-family: 'Damion'; font-size:70px;"><a style="color:inherit" href="/index.php"> Quizify!</h1><h4><small>A Randomized Quiz Generator</small></h4></a></div>
			<?php
			require_once 'config.php';
			$sql = "SELECT distinct subject FROM qb";
			$result = $mysqli->query($sql);
			if ($result->num_rows <= 0)
			{
				echo "
				<div class='jumbotron'>
				<center>
					<h2>No Subjects found</h2>
					<hr>
					<a class='btn btn-info' href='index.php'>Go back</a>
				</center>
				</div>
				";
				$mysqli->close();
				die();
			}
			?>
			<div class="jumbotron">
<h1 class="text-center" style="font-family:Damion">Generate a Quiz</h1>
<hr><br>
				<div class="form-group">
					<form action="generate.php">
					<p>Select Subject/Topic</p> 
						<select class="form-control" name="subject">
						<?php
						while($row = $result->fetch_assoc()) 
						{
							echo "<option>".$row['subject']."</option>";
						}
						?>
						</select>
					<br><br>
					<p>Enter Number of Questions</p>
						<input class="form-control" type="number" name="limit" value="5" onfocus="select()"> 
					<br>
					<br>
					<button class="form-control btn btn-success" type="submit">Quizify!</button>
				</form>
			</div>
			</div>
		</div>
	</body>
</html>