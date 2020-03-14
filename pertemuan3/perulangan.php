<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>perulangan</title>
</head>
<body>
	<!-- model1 : php dibuka 1x -->
	<table border="1" cellpadding="10" cellspacing="0">
		<?php 
			for ($i=1; $i <= 3; $i++) { 	
				echo "<tr>";
				for ($j=1; $j <=5 ; $j++) { 
					echo "<td>$i,$j</td>";
				}
				echo "</tr>";
			}
		?>
	</table>

	<br><br>

	<!-- model2 : php dibuka tutup -->
	<table border="1" cellpadding="10" cellspacing="0">
		<?php for($i=1;$i<=3;$i++) : ?>
			<tr>
				<?php for ($j=1; $j <= 5 ; $j++) : ?>
					<td><?php echo "$i,$j"; ?></td>
				<?php endfor; ?>
			</tr>
		<?php endfor; ?>
	</table>

	<br><br>

	<!-- pake while -->
	<table border="1" cellpadding="10" cellspacing="0">
		<?php $i=1; while($i<=3) : ?>
			<tr>
				<?php $j=1; while($j<=5) : ?>
					<td><?php echo "$i,$j"; ?></td>
				<?php $j++; endwhile; ?>
			</tr>
		<?php $i++; endwhile; ?>
	</table>

	<br><br>
	
	<!-- pake do... while -->
	<table border="1" cellpadding="10" cellspacing="0">
		<?php $i=1; do { ?>
			<tr>
				<?php $j=1; do{ ?>
					<td><?php echo "$i,$j"; ?></td>
				<?php $j++; }while($j<=5); ?>
			</tr>
		<?php $i++; }while($i<=3); ?>
	</table>
</body>
</html>