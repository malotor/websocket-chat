#!/bin/bash
echo Testing Character Class
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/CharacterTest.php


echo Testing Board Class
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/BoardTest.php


echo Testing MovementManager Class
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/MovementManagerTest.php

echo Testing Commands Class
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/CommandTest.php

echo Testing Commands Class
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/CommandProcessorTest.php