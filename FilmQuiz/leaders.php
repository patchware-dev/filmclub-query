<html>
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>film quiz</title>
	<style>
		
 @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;1,500;1,600&display=swap');
 
 
 		body{
			margin:0;
    font-family: 'Poppins', sans-serif;
				background:#EEEEEE;
		}
		
		
		HEADER{
			background:#111; color:white;
			font-weight:bold;
			padding:20px;
			margin-bottom:20px;
		}
		HEADER::after{ content:' \01F3A5 ';float: right;
font-size: 30px;
position: absolute;
right: 20px;
top: 20px;}

#container{ padding:0px 20px; box-sizing:border-box; width: 50%; min-width: 320px; max-width: 600px;}
		
		#message{ 
			border:3px dashed #CCCCCC; 
			PADDING:20PX; 
			FONT-WEIGHT:BOLD; 
			margin-bottom:20px; 
			display:block;
			color:#CCC;
		}
		
	.scoreline{ 
		background:#888; 
		color:#FFF; 
		margin-bottom:10px; 
		position:relative;
	}
	.scoreline:first-of-type{
		border: 4px solid gold;
		background: goldenrod;
	}
	.scoreline:first-of-type .namebox-inner::before{
		content:'\01F451  ';
	}
	
	.pos{
		display: inline-block;
		position: absolute;
		margin-left: -20px;
		left: 0;
		color:#888;
		
	}
	
	.flair{ 
		font-size:12px;
		font-family:courier, monospace;
		margin:10px 0px 0px;  
		border-top:2px dashed white; 
		padding-top:10px;
		quotes: '\201c  ' '  \201d'; 
		line-height:100%; 
		display:inline-flex; 
		width:100%;
		font-weight:normal;
	}
	.flair:before {font-family:serif; content: open-quote; font-size:30px; margin-right:10px; font-weight:bold; margin-top:5px;}
	.flair:after  {font-family:serif; content: close-quote; font-size:30px; margin-left:10px; font-weight:bold; margin-top:5px;}
	
	.namebox{ text-align:left; font-weight:bold; color:white; letter-spacing:1;}
	.namebox-inner{ font-size:23px; text-overflow:ellipsis; overflow:hidden;white-space: nowrap; max-width:190px; text-transform:capitalize;}
	.scorebox{ text-align:right; font-size:40px; color:white; padding-right:10px;}
	.scorebox span{ border:2px dotted white; width:70px; height:70px; text-align:center; line-height:70px; display:inline-block;}
	@media only screen and (max-width: 580px) {
		#container{width:100%;}
	}
	</style>
</head>
<body>
	<HEADER>
		MOVIE CLUB
		<BR>
		top scorers
	</HEADER>
	<div align="center">
		<div id="container">
<?php


	$moviequotes = array(
		"Life, uh... finds a way...", 
		"Frankly my dear, I don't give a damn...", 
		"One gay beer for my gay friend, one normal beer for me because I am normal.",
		"I'll be back...",
		"I find your lack of faith disturbing.",
		"You're in a big puddle of shit, Pamela, and you don't have the shoes for it.",
		"What we've got here is failure to communicate.",
		"Surely you can't be serious...",
		"I'm as mad as hell, and I'm not going to take this anymore!",
		"Well, nobody's perfect.",
		"I coulda been a contender. I could've been somebody."
	);



    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
	
	
	
	
	// external version
	$link = mysqli_connect("10.16.16.16", "admin-ifs-u-280505", "filmclub4z", "admin-ifs-u-280505");
	
    // local version
	//$link = mysqli_connect("localhost", "root", "", "leaderboard");

    // Check connection

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
	
	if(isset($_POST['score'])){

    	// Escape user inputs for security
    	$name = mysqli_real_escape_string($link, $_POST['name']);
    	$score = mysqli_real_escape_string($link, $_POST['score']);
	
		// flair fallback quotes
		if($_POST['name'] == "Vas" && strlen($_POST['flair']) <= 2){
		$flair = "I loved it.";
		}
		else if (strlen($_POST['flair']) > 2)
		{$flair = mysqli_real_escape_string($link, $_POST['flair']);
		}else{$flair = mysqli_real_escape_string($link, $moviequotes[mt_rand(0,count($moviequotes)-1)]);
		}
	

    	// attempt insert query execution
    	$sql = "INSERT INTO leaderboard (Name, Score, Flair) VALUES ('$name', '$score', '$flair')";

    	if(mysqli_query($link, $sql)){
        	echo "<span id='message'>Your score has been added.<br><a href='index.html' style='color:#888888'>play again?</a></span>";
    	}else{
    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    	}
	
	}else{
		
		echo "<span id='message'><a href='index.html' style='color:#888888'>ready to play?</a></span>";
	}
	
	$sql = "SELECT Name, Score, Flair FROM leaderboard ORDER BY Score DESC";
	$result = $link->query($sql);
	
	$position = 1;
	
	

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  if($position <= 10){
		  ?>
		  <div class='scoreline'>
			  <span class="pos"><?php echo $position ?></span>
		  	<table width="100%" cellpadding="10">
				<tr>
					<td class="namebox" valign="top">
						<div class="namebox-inner">
						<?php echo $row["Name"] ?>
						</div>
						<div class='flair'>
							
							<?php  
								echo $row["Flair"]; 
							 ?>
						</div>
					</td>
					<td class="scorebox" valign="top">
						<span>
							<?php 
							
								echo $row["Score"];
							
							?>
						</span>
					</td>
				</tr>
			</table>
		  </div>
		  
		  
		  <?php
	  	}
	    $position += 1;
		
	  }
	} else {
	  echo "0 results";
	}
	
	

    // close connection
    mysqli_close($link);
?>

</div>
</div>
</body>

</html>