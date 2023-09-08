<html>
 <head>
  <title>Snatch Breaks</title>
 </head>
 <body>

 <br/>
 
 <form action="break.php" method = "get">
 
 <?php
  echo '<input type = "text" name="breakthis" value =  "';
  echo $_GET["breakthis"]; 
  echo '" > ';
 ?>
 
 <br/>
 <br/>
 <input type = "submit" value = "Breaks">
 </form>
 
 Dictionary: CSW12 (Only words upto 15 letters in length listed) <br />
 
 <?php
 
	function doesitbreak($long, $short)
	{	
		$long  = strtoupper(trim($long));
		$short = strtoupper(trim($short));
		
		if(strlen($long) <= strlen($short)){
			return;
		}
				
		$longletters = str_split($long);
		$shortletters = str_split($short);
		$result = array();
		
		$flag = true;
		foreach ($shortletters as $letter)
		{ 
			$key = array_search($letter, $longletters);
			if($key!==false){ #do not change to if($key)
				unset($longletters[$key]);
			} else {
				$flag = false;
				return;
			}
		} 
		
		if ($flag) {
			echo $long .  "<br>";
		}
		
	}
	
	$wordfilename = 'CSWwords.txt';
	$wordfile = file($wordfilename); 
	$short = $_GET["breakthis"]; 
	$short = strtoupper($short);
	
	foreach($wordfile as $long) {
		doesitbreak($long, $short);
	}

	
 ?>
 
 
 </body>
</html>
