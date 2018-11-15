<head>
</head>

<body style="font-size: 50px;">
<br>

<form action="exo3.php" method="get">
name: <input type="text" name="name">
<input type="submit">
</form>

<form action="exo3.php" method="post">
filter: <input type="text" name="filter">
<input type="submit">
</form>


<?php
	
	$file = "ami.txt";
	//fwrite($file, "ceci est un test\n");
	
	$name = "world";
	
	if(isset($_GET['name'])){
		?> <ul style="margin-left:40%;" > <?php
		$name = $_GET['name'];
		if($name != "blank")
		{
			$name = "$name \n";
			file_put_contents($file, $name,FILE_APPEND);
		
	
			$file = fopen("ami.txt","r");
		
			while(!feof($file))	
			{
				?>
					<li><?php echo fgets($file); ?></li>
			
				<?php
			}
			fclose($file);
		}
		
		
		?> </ul> <?php
	}
	?>
	
	<?php
	if(isset($_POST['filter'])){
		?> <ul style="margin-left:40%;" > <?php
		$filter = $_POST['filter'];
	
		
	

		$file = fopen("ami.txt","r");

		while(!feof($file))	
		{
			$line = fgets($file);
			
			if(strstr($line,$filter))
			{
				?>
					<li><?php echo $line; ?></li>
			
				<?php
			}
		}
		fclose($file);
	
		
		?> </ul> <?php
		
	}
	
	
	
	
	
?>
</br>
</body>