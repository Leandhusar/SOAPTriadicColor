<?php
    $color = $_POST['color'];
    echo $color . "<p><p/>";

    require_once("lib/nusoap.php");
    $cliente = new nusoap_client("http://localhost/triadicColor.php");
    $result = $cliente->call("generateTriadicColor", array("color" => $color));

    $color1 = "#" . substr($result, 1, 6);
    $color2 = "#" . substr($result, 8, 6);
    $color3 = "#" . substr($result, 15, 6);

    echo '<h1 style="color:' . $color1 . '";> Color 1</p>';
    echo '<h1 style="color:' . $color2 . '";> Color 2</p>';
    echo '<h1 style="color:' . $color3 . '";> Color 3</p>';
?>