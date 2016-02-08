<?php

$height = $_GET['height'];
$width = $_GET['width'];
$weight = $_GET['weight'];

  class Parcel
  {
    private $height;
    private $width;
    private $weight;

    function setHeight($new_height)
    {
      $float_height = (float) $new_height;
      if ($float_height != 0) {
        $formatted_height = number_format($float_height, 1);
        $this->height = $formatted_height;
      }
    }
    function setWidth($newWidth)
    {
      $float_width = (float) $newWidth;
      if ($float_width !=0) {
        $formatted_width = number_format($float_width, 1);
        $this->width = $formatted_width;
      }
    }
    function setWeight($newWeight)
    {
      $this->weight = $newWeight;
    }

    function getHeight()
    {
      return $this->height;
    }
    function getWidth()
    {
      return $this->width;
    }
    function getWeight()
    {
      return $this->weight;
    }

    function volume()
    {
      return $this->height * $this->weight * $this->width;
    }

    function callToShip()
    {
      $floated_shipping = (float) $this->weight * 1000 / $this->height;
      $formatted_shipping = number_format($floated_shipping, 2);
      return $formatted_shipping;
    }
  }

  $new_parcel = new Parcel();
  $new_parcel->setHeight($height);
  $new_parcel->setWidth($width);
  $new_parcel->setWeight($weight);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  </head>
  <body>
    <div class="container">
      <ul>
        <?php
          $new_height = $new_parcel->getHeight();
          $new_width = $new_parcel->getWidth();
          $new_weight = $new_parcel->getWeight();
          if(!$new_weight || !$new_height || !$new_width){
            echo "Please fill out the form completely.";
          } else {
            echo "<li> Height: $new_height </li>";
            echo "<li> Width: $new_width </li>";
            echo "<li> Weight: $new_weight </li>";
            $volume = $new_parcel->volume();
            echo "<li> Volume: $volume </li>";
            $shipping_cost = $new_parcel->callToShip();
            echo "<p> Shipping Total:" . "$" . $shipping_cost . "</p>";
          }

        ?>
      </ul>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  </body>
</html>
