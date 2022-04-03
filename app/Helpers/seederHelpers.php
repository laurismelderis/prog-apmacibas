<?php


use App\{
    Models\Seed
};

function checkIfSeeded ($class)
{
    $seedClass = get_class($class);

    $seed = Seed::where('seed', $seedClass)->first();

    if ($seed) {
        return true;
    }

    return false;
}


function storeSeed ($class)
{
    $seedClass = get_class($class);

    $seed = new Seed();
    $seed->seed = $seedClass;
    $seed->save();
}