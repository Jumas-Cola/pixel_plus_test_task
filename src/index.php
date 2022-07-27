<?php

use App\Classes\TemperatureDataRepository;
use App\Classes\RequestHandler;

require __DIR__ . "/../vendor/autoload.php";

$handler = new RequestHandler($_REQUEST, $_SERVER);

$handler->registerRoute("/", function ($request) {
    return json_encode(
        (new TemperatureDataRepository())->getSlideAvg($request["window"])
    );
});

$handler->handle();
