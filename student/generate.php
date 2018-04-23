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
		<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" /> 
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/styles.css?<?=$time?>" id="myStyles">
		<link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
		
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json" />
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00bb80">
		<meta name="msapplication-TileColor" content="#00aba9">
		<meta name="theme-color" content="#00bb80">
		
		<meta name='description' content='A Randomized Quiz Generator' />
		<meta property="og:title" content="Quizify!">
		<meta property='og:type' content='website' />
		<meta property="og:image:height" content="503">
		<meta property="og:image:width" content="961">
		<meta property="og:description" content="A Randomized Quiz Generator">
		<meta property="og:url" content="https://quiz-generator.000webhostapp.com/">
		<meta property="og:image" content="https://quiz-generator.000webhostapp.com/og-image.jpg">
		
		<?php include 'shuffle.php';?> 

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
				<h1 style=\"font-family: 'Damion'; font-size:70px;\"><a style='color:inherit' href='/index.php'>Quizify!</h1><h4><small>A Randomized Quiz Generator</small></h4></a>
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
								<div class='scramble' style='text-align:left'>".scramble($options[$j])."</div>
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
						<div id = 'scorecard' class='jumbotron' style='display: none'></div>
					</center>
				</form> 
			</div>
			<br> 
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<script src="/js/site.js"></script>
		<script src="/js/o.min.js"></script>
		<script src="/js/x.min.js"></script>
		<script src="/js/mt.js"></script>
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
						questions[i].style.backgroundColor="#fcc";
					}
				}
				document.body.style.backgroundImage="none";      
				document.body.style.backgroundColor="white";
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
