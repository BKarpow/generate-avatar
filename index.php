<?php 
require 'vendor/autoload.php';
$faker = Faker\Factory::create();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    img{
      clip-path: circle(50px);
    }
  </style>
</head>
<body>
    <?php foreach(range(0,19) as $item): ?>
      
  <img src="avatarGen.php?name=<?=$faker->name?>&size=100x100" alt=""> <br />
  <?php endforeach; ?>
</body>
</html>