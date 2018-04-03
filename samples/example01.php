<?php

require __DIR__ . '/../vendor/autoload.php';

use Correios\Rastro\Rastro;
use Correios\Rastro\Config;

$config = new Config();
$rastro = new Rastro($config);
$data = $rastro->fetch(['OA969114761BR', 'OA932477958BR']);

var_dump($data);
