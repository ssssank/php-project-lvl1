<?php

namespace Brain\Utils;

function getRandomInt(int $min = 0, int $max = 50)
{
    return rand($min, $max);
}
