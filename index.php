<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Home Page - Quiz Generator
	</title>
	
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" /> 
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/styles.css?<?php echo time()?>">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
	
	
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json" />
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00bb80">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="theme-color" content="#00bb80">
	
	
	
	<meta property='og:title' content='Quizify!' />
	<meta name='og:title' content='Quizify!' />
	<meta property='og:description' content='A randomized Quiz Generator' />
	<meta name='description' content='A randomized Quiz Generator' />
	<meta property='og:url' content='https://quiz-generator.000webhostapp.com' />
	<meta property='og:image' content='https://quiz-generator.000webhostapp.com/ic_launcher.png' />
	<meta property='og:type' content='website' />
	
	
	<style>
		a[title*="000webhost"]
		{
		display: none !important;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="m-scene" id="main"> <div class="m-header scene_element scene_element--fadein"> 
		
		<div class="jumbotron text-center"><h1 style="font-family: Damion; font-size:5em;"><a style="color:inherit" href="/index.php"> Quizify!</h1><h4><small>A Randomized Quiz Generator</small></h4></a></div>
		
	</div>
	<div class="m-page scene_element scene_element--fadeinup"> 
		
		<div class="jumbotron text-center">
			<h1 style="font-family: Damion">Welcome to Quizify!</h1>
			<hr>
			<br>
			<a class="form-control btn btn-info" href="/teacher/FormPage.php">Add Questions</a>
			<br><br>
			<a class="form-control btn btn-success" href="/student/GenerateQuiz.php">Generate a Quiz </a>
			<br><br>
		</div> 
		
	</div>
	
	</div>
	<br>
	<br>
	<br><br>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<script src="/js/smoothState.min.js"></script>
	<script src="site.js"></script>
</body>
</html>	