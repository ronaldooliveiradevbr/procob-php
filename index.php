<?php

require 'vendor/autoload.php';

$procob = new Procob\Procob(['sandbox@procob.com', 'TestApi']);

var_dump($procob->person()->getByCpf('sada'));

//var_dump($procob->baseUri->byCpf('aaaaaaaa'));
