<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
			Form Page
		</title>
		
		<meta charset="utf-8">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		 <!-- Latest compiled and minified CSS --> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
		<link rel="stylesheet" href="/css/styles.css?<?php echo time()?>">
		<link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/smoothState.min.js"></script>
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
<div class="m-scene" id="main"> <div class="m-aside scene_element scene_element--fadein"> 

		<div class="container">
<div class="jumbotron text-center"><h1 style="font-family: Damion; font-size:5em;"><a style="color:inherit" href="/index.php"> Quizify!</h1><h4><small>A Randomized Quiz Generator</small></h4></a></div>

			<div class="jumbotron">
			<h1 class="text-center" style="font-family: Damion;">Submit a question</h1><hr>
			<div class="form-group">
				<form name="qForm" action="SubmitQuestion.php" method="POST">
					<p>Enter Subject</p>
					<input class="form-control" type="text" name="Subject" value=""><br>
					<br><p>Enter Question</p>
					<textarea class="form-control" name="Question" value="" rows="4" cols="50"></textarea><br>
					<br><p>Enter Correct Answer</p>
					<textarea class="form-control" name="Correct_Answer" value="" rows="2" cols="50"></textarea><br>
					<br><p>Enter Wrong Answers (at least one)</p>
					<textarea class="form-control" name="Wrong_Answer_1" value="" rows="2" cols="50"></textarea>
					<br>
					<textarea class="form-control" name="Wrong_Answer_2" value="" rows="2" cols="50"></textarea>
					<br>
					<textarea class="form-control" name="Wrong_Answer_3" value="" rows="2" cols="50"></textarea>
					<br><br>
					<button class="btn btn-success form-control" type="submit" onclick="return checkInputs()"> Submit </button>
				</form>	

			</div>
			</div>
		</div>
</div>
<script>
		function checkInputs()
		{
			if(document.forms["qForm"]["Subject"].value==""){
				alert("Subject must be filled out");
document.forms["qForm"]["Subject"].focus();

}
			else if(document.forms["qForm"]["Question"].value==""){
				alert("Question must be filled out");
document.forms["qForm"]["Question"].focus();
}
			else if(document.forms["qForm"]["Correct_Answer"].value==""){
				alert("Correct Answer must be filled out");
document.forms["qForm"]["Correct_Answer"].focus();
}
			else if(document.forms["qForm"]["Wrong_Answer_1"].value==""){
				alert("At least one Wrong Answer must be filled out");
document.forms["qForm"]["Wrong_Answer_1"].focus();
}
			else
      {
				alert("Submitted Question Successfully");
       return true;
      }
      return false;
		}
		</script>
	</body>
</html>
