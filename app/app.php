<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/parcel.php";

    $app = new Silex\Application();

    $app['debug']=true;

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
          <head>
            <meta charset='utf-8'>
            <title></title>
            <!-- Compiled and minified CSS -->
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
          </head>
          <body>
            <div class='container'>
                <h3>Post Office</h3>
              <form class='col s12' action='/view_output'>
                <div class='row'>
                  <div class='input-field col s6'>
                    <p for='height'>Enter Parcel Height:</p>
                    <input name='height' id='height' type='text'>
                  </div>
                  <div class='input-field col s6'>
                    <p for='width'>Enter Parcel Width:</p>
                    <input name='width' id='width' type='text'>
                  </div>
                  <div class='input-field col s6'>
                    <p for='weight'>Enter Parcel Weight:</p>
                    <input name='weight' id='weight' type='text'>
                  </div>
                </div>
                <button type='submit' class='waves-effect wave-light btn'> search</button>
              </form>
            </div>
          <!-- Compiled and minified JavaScript -->
          <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>
          </body>
        </html>
        ";
    });
    $app->get("/view_output", function() {

        $height = $_GET['height'];
        $width = $_GET['width'];
        $weight = $_GET['weight'];

        $new_parcel = new Parcel();
        $new_parcel->setHeight($height);
        $new_parcel->setWidth($width);
        $new_parcel->setWeight($weight);

          $new_height = $new_parcel->getHeight();
          $new_width = $new_parcel->getWidth();
          $new_weight = $new_parcel->getWeight();
          $volume = $new_parcel->volume();
          $shipping_cost = $new_parcel->callToShip();
          if(!$new_weight || !$new_height || !$new_width){
            return "
            'Please fill out the form completely.'
            ";
          } else {
            return "
            <li> Height:$new_height</li>
            <li> Width:$new_width</li>
            <li> Weight:$new_weight</li>
            <li> Volume:$volume</li>
            <p> Shipping Total:$$shipping_cost</p>";

          }
    });
    return $app;
?>
