<?php include 'db.php'; ?>
<?php 
  // Create Select Query
  $query = "SELECT * FROM shouts ORDER BY id DESC";
  $results = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Shout Box</title>
  <!-- Bootstrap Stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-dark bg-primary ">
  <div class="container">
    <a class="navbar-brand" href="index.php">PHP Shout Box</a>
  </div>
</nav>
<div id="main-area">
  <div id="input">
    <h1>Shout Here</h1>
    <form action="process.php" method="post">
      <div class="form-group">
        <label>Name</label>
        <input name="user" type="text" class="form-control"  placeholder="Enter Your Name">
      </div>
      <div class="form-group">
        <label>Message</label>
        <input  name="message" type="text" class="form-control"  placeholder="Message">
      </div>
      <input name="submit" type="submit" class="btn btn-primary" value="Submit">
    </form>
    <br><br>
    <?php if(isset($_GET['error'])) : ?>
        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>
  </div>
  <div id="shouts">
    <div class="card">
      <?php while($row = mysqli_fetch_assoc( $results)) : ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['user']; ?><small> - <?php echo $row['time']; ?></small></h5>
          <p class="card-text"><?php echo $row['message']; ?></p>
          <hr>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
</body>
</html>