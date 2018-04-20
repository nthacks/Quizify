<?php
	$time=time();
	mt_srand($time);
	$rand=mt_rand();
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
    		require_once 'config.php';
    		$subject= $_GET["subject"]; 
    		$limit=$_GET["limit"]; 
    		$sql = "SELECT * FROM qb where subject='$subject' ORDER BY rand() LIMIT $limit";
    		$result = $mysqli->query($sql);
		?>
		<title> <?php echo strtoupper($subject)?> Quiz </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
		<!-- jQuery library -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link id="myStyles" rel="stylesheet" href="/css/styles.css?<?=$time?>">
		<?php include 'shuffle.php';?> 
		<script src="/js/mt.js"></script>
		<style>
        a[title*="000webhost"]
        {
                display: none !important;
        }

           </style>
	</head>

	<body>
		<div class="container">
			<?php
				if ($result->num_rows <= 0)
				{
					echo "
					<div class='jumbotron'>
					<center>
						<h2>No results found</h2>
						<hr>
						<a class='btn btn-info' href='GenerateQuiz.php'>Go back</a>
					</center>
					</div>
					";
					$mysqli->close();
					die();
				}

				echo "
				<div class='jumbotron text-center'>	
    				<h1 style=\"font-family: 'Damion'; font-size:70px;\"><a style='color:inherit' href='/index.php'> Quizify!</h1><h4><small>A Randomized Quiz Generator</small></h4></a>
    				<hr>
    				<br>
					<div>
							<h2>
								<b>SUBJECT:</b>
								".strtoupper($subject)."<br>
								<small>$result->num_rows Questions</small>
							</h2> 
					</div>
				</div>
				";
			?>
			<div class="form-group">
			<form method="POST" action="javascript:void(0);" onSubmit="evaluateQuiz()">
				<?php
					// output data of each row
					$qno=1; 
					while($row = $result->fetch_assoc()) 
					{
						//Shuffling options
						$options = array($row["correct"],$row["wrong1"],$row["wrong2"],$row["wrong3"]);
						shuffle($options);
						echo '<div class="jumbotron question-container">';
						echo " <b> Question " . $qno ." :</b><br><br><p style='text-align:left'  class='scramble'>" . scramble($row["question"]) . "</p>"  ;

						echo "<hr>";
						for($j=0;$j<4;$j++)
						{
            if($options[$j]=="")
            {continue;}
							if($options[$j]==$row["correct"])
							{
								$correct_hash=$rand+$j;
							}
           
							echo "
							<div class='radio' >
							<label>
							<input type='radio' class='option-radio' name='question_".$row['qid']."' val='option_".$j."' />
							<div class='scramble'>".scramble($options[$j])."</div>
							</label>
							</div>
							";
						}
						echo "
						<div id='question_".$row['qid']."' value='$correct_hash'></div>
						<hr>
						<br>
						</div>
						";
						$qno++;
					}
					$mysqli->close();
				?>
				<center>  
				<button class="quiz-button btn shadow-img2 btn-success" type="submit" style="width:45%;margin:1em;">Submit</button>
				<button class="quiz-button btn shadow-img2 btn-danger" type="reset" style="width:45%;margin:1em">Reset</button> 
      <div id = 'scorecard' class='jumbotron' style='display: none' >
      </div>
				</center>
			</form> 
			</div>
			<br> 
		</div>
		<script>
			var seed=document.getElementById('myStyles').getAttribute('href').split('?')[1]
			var mt = new MersenneTwister(seed);
			var rand=mt.int31();
			function evaluateQuiz()
			{
				var score=0;
				var questions=document.getElementsByClassName('question-container');
				for(var i=0;i<questions.length;i++)
				{
					var flag=false;
					var options=questions[i].getElementsByClassName('option-radio');
					for(var j=0;j<options.length;j++)
					{
						if((options[j].checked)&&(j==document.getElementById(options[2].getAttribute('name')).getAttribute('value')-rand) )
						{
								score++;
								flag=true;
								questions[i].style.backgroundColor="#bfb";
						}
					}
					if(flag==false)
					{
						questions[i].style.backgroundColor="#fbb";
					}
				}
          document.body.style.backgroundImage="none";      document.body.style.backgroundColor="white";
				//alert("Your Score is "+score+"/"+questions.length);
				$("input[class=option-radio]").attr('disabled', true);
				$(".quiz-button").fadeOut();
       var scorecard = document.getElementById('scorecard');
       scorecard.innerHTML="<b>Your Score is "+score+"/"+questions.length+"</b>";
       $("#scorecard").fadeIn(2000);
			}
		</script>
	</body>
</html>
