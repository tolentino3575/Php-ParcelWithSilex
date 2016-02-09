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
