<?php
    require_once("lib/nusoap.php");
    function generateTriadicColor($color){
        $color2 = "#" . $color[3] . $color[4] . $color[5] . $color[6] . $color[1] . $color[2];
        $color3 = "#" . $color[5] . $color[6] . $color[1] . $color[2] . $color[3] . $color[4];
        return $color . $color2 . $color3;
    }

    $server = new soap_server();
    $server->configureWSDL("triadicColor", "urn:triadicColor");
    $server->register(
        "generateTriadicColor",
        array("color" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:triadicColor",
        "urn:triadicColor#generateTriadicColor",
        "rpc",
        "encoded",
        "Create a triadic color palette based on a base color"
    );
    $server->service($HTTP_RAW_POST_DATA);
?>