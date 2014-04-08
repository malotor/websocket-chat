#!/bin/bash
echo Testing Character Class
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/CharacterTest.php

vendor/bin/phpunit --bootstrap vendor/autoload.php tests