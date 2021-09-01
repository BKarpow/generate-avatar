<?php 
require 'vendor/autoload.php';
require 'app/GenerateAvatar.php';
require 'app/Svg.php';

$avatar = new App\GenerateAvatar();

$faker = Faker\Factory::create();
error_reporting(E_ALL);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    svg{
      clip-path: circle(2rem);
    }
    body{
      counter-reset: section;
      display:flex;
      justify-content: center;
      column-gap: .7rem;
      flex-wrap: wrap;
    }
    img::before{
      counter-increment: section;                 /* Инкрементирует счётчик*/
      content: counter(section)
      transform: translate(2rem, 2rrm);
      text-align: center;
      font-weight: bold;
      font-size: 1.3rem;
    }
  </style>
</head>
<body>
    <?php foreach(range(1,80) as $item): ?>
      <div>
        <?php
          $name = null;
          $name = $faker->name;
        ?>
        <strong><?=$item?></strong>
        <?=$avatar->getSvgAvatar($name)?> <br />
      </div>
  
  <?php endforeach; ?>
</body>
</html>