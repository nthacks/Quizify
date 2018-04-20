<?php

$p1="Mr. and Mrs. Dursley, of number four, Privet Drive, were proud to say
that they were perfectly normal, thank you very much. They were the last
people you'd expect to be involved in anything strange or mysterious,
because they just didn't hold with such nonsense.";
$p2="Mr. Dursley was the director of a firm called Grunnings, which made
drills. He was a big, beefy man with hardly any neck, although he did
have a very large mustache. Mrs. Dursley was thin and blonde and had
nearly twice the usual amount of neck, which came in very useful as she
spent so much of her time craning over garden fences, spying on the
neighbors. The Dursleys had a small son called Dudley and in their
opinion there was no finer boy anywhere.";
$p3="The Dursleys had everything they wanted, but they also had a secret, and
their greatest fear was that somebody would discover it. They didn't
think they could bear it if anyone found out about the Potters. Mrs.
Potter was Mrs. Dursley's sister, but they hadn't met for several years;
in fact, Mrs. Dursley pretended she didn't have a sister, because her
sister and her good-for-nothing husband were as unDursleyish as it was
possible to be. The Dursleys shuddered to think what the neighbors would
say if the Potters arrived in the street. The Dursleys knew that the
Potters had a small son, too, but they had never even seen him. This boy
was another good reason for keeping the Potters away; they didn't want
Dudley mixing with a child like that.";
$p4='"You don\'t mean -- you can\'t mean the people who live here?" cried
Professor McGonagall, jumping to her feet and pointing at number four.
"Dumbledore -- you can\'t. I\'ve been watching them all day. You couldn\'t
find two people who are less like us. And they\'ve got this son -- I saw
him kicking his mother all the way up the street, screaming for sweets.
Harry Potter come and live here!"
"It\'s the best place for him," said Dumbledore firmly. "His aunt and
uncle will be able to explain everything to him when he\'s older. I\'ve
written them a letter."
"A letter?" repeated Professor McGonagall faintly, sitting back down on
the wall. "Really, Dumbledore, you think you can explain all this in a
letter? These people will never understand him! He\'ll be famous -- a
legend -- I wouldn\'t be surprised if today was known as Harry Potter day
in the future -- there will be books written about Harry -- every child
in our world will know his name!"
"Exactly," said Dumbledore, looking very seriously over the top of his
half-moon glasses. "It would be enough to turn any boy\'s head. Famous
before he can walk and talk! Famous for something he won\'t even
remember! Can\'t you see how much better off he\'ll be, growing up away
from all that until he\'s ready to take it?"
Professor McGonagall opened her mouth, changed her mind, swallowed, and
then said, "Yes -- yes, you\'re right, of course. But how is the boy
getting here, Dumbledore?" She eyed his cloak suddenly as though she
thought he might be hiding Harry underneath it.
"Hagrid\'s bringing him."
"You think it -- wise -- to trust Hagrid with something as important as
this?"
I would trust Hagrid with my life," said Dumbledore.
"I\'m not saying his heart isn\'t in the right place," said Professor
McGonagall grudgingly, "but you can\'t pretend he\'s not careless. He does
tend to -- what was that?"'
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
		
		<?php include 'shuffle.php';?>
	</head>
	<body>
		<div class="container">
			<h2>Try to copy some text from the paragraphs below</h2>
			<hr>
			<center><img class='ajaxloader' src='ajax-loader.gif'></center>
			<p class='scramble'><?php echo scramble($p1);?></p>
			<p class='scramble'><?php echo scramble($p2);?></p>
			<p class='scramble'><?php echo scramble($p3);?></p>
			<p class='scramble'><?php echo scramble($p4);?></p>
			<hr>
			<textarea rows="20" class="form-control" style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif;' onfocus='select()'>Paste your copied text here to see the effect...</textarea>
			<br>

		</div>
	</body>
</html>
