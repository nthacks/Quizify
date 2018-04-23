<?php
function generate_key()
{
    $a0=range(0,47);
	$a1=range(48,57); shuffle($a1); //numbers
    $a2=range(58,64);
	$a3=range(65,91); shuffle($a3); //uppercase
	$a4=array(92);
	$a5=range(93,126); shuffle($a5); //lowercase
	
    return array_merge($a0,$a1,$a2,$a3,$a4,$a5);
}
function str_putcsv($arr)
{
	$csv = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');
	fputcsv($csv, $arr);
	rewind($csv);
	return stream_get_contents($csv);
}
function scramble($text)
{
	global $key;
  if($text=="")
  {   return $text;}
	for ($i = 0; $i < strlen($text); $i++)
	{
		$newtext[$i]=chr($key[ord($text[$i])])??$text[$i];
	}
	return htmlspecialchars(implode($newtext));
}
$key=generate_key();
$b64=base64_encode(str_putcsv($key));
echo "<meta id='pk' value='$b64'>";
?>
<script src="/js/o.min.js"></script>
<script src="/js/x.min.js"></script>
<style>
.scramble
{font-family:'Demo';
word-wrap: normal;
filter:blur(10px);
transition: 1s filter linear;
 -webkit-transition: 1s -webkit-filter linear; -moz-transition: 1s -moz-filter linear; -ms-transition: 1s -ms-filter linear;
 -o-transition: 1s -o-filter linear;
}
</style>