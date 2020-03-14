<?php 
	$angka = [12,14,34,35,2,5];
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Latihan 2 | array</title>
 	<style>
 		.kotak{
 			width: 50px;
 			height: 50px;
 			background-color: orange;
 			text-align: center;
 			line-height: 50px;
 			margin: 3px;
 			float: left;
 			transition: 1s;
 		}

 		.kotak:hover{
 			transform: rotate(360deg);
 			border-radius: 50%;
 		}

 		.clear{ clear: both; }
 	</style>
 </head>
 <body>
 	<?php for($i=0; $i<count($angka); $i++) :?>
 	<div class="kotak"><?php echo "$angka[$i]"; ?></div>
 	<?php endfor; ?>

 	<div class="clear"></div>

 	<?php foreach($angka as $a) : ?>
 		<div class="kotak"><?php echo $a; ?></div>
 	<?php endforeach; ?>
 </body>
 </html>