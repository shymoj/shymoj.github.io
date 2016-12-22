<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Visitor Page</title>
</head>
<body>
<style>
             body{
               background-image: url("http://cdn.wonderfulengineering.com/wp-content/uploads/2015/05/San-Francisco-Wallpaper.jpg");
          background-repeat: no-repeat;
          background-attachment: fixed;
          color:white;
                  }
</style>
  <form action="table.php" method="post">
    <p>
      <label for="game">Game:</label>
      <input type="text" name="game">
    </p>
    <p>
      <label for="date">Release date:</label>
      <input type="text" name="date">
    </p>
    <input type="submit">
  </form>

<?php
  if($_POST) {
    // Create connection
    $con = mysqli_connect('setapproject.org','csc412','csc412','csc412');

    // Check connection
    if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Select db
    mysql_select_db("csc412", $con);

    // Params
    $game = $_POST['game'];
    $release = $_POST['date'];

    // Prepare statement
    $sql =$con->query( "INSERT INTO gta2 (game,date) VALUES ('$game','$release')");

    // Get results
    $result = mysqli_query($con, "SELECT * FROM gta2");

    // Execute??
    $retval = mysql_query($sql, $con);
   
    // Print results
    echo 'Game--------------- Release date';
    echo '<br>'; 
    echo '<br>';
    while($row = mysqli_fetch_array($result)) {
	echo $row['game'] . "  --   " . $row['date'];
	echo"<br>";
	}
    // Error?

    // Close
    mysqli_close($con);
  }
?>

</body>
</html>