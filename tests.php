<?php

require 'vendor/autoload.php';

$cli = new \L\Kits\Console();

$cli->write('hello ');
$cli->writeLine('world!');
$cli->closeOutput();
$cli->writeLine('hia hia hia.');

$cli->error('shit, it is ');
$cli->errorLine('dead!');

echo $cli->read(12, 'hello');

$cli->flushInput();

echo $cli->readLine("world");

$cli->redirectErrorToFile('error.log');

$cli->errorLine('Mick dead.');
$cli->errorLine('Trisha dead.');
