<html>
<body>
Thanks
<?php echo$_POST["name"]; ?>
<br>
<?php
    $file = fopen("text.txt", "r") or die("Unable to open file");
	while(!feof($file)){
		echo fgets($file) . "<br>";
}
fclose($file);
?>
</html>
