<?php


/**
 * Dump and die function for debugging purposes.
 *
 * @param array $array The array to be dumped.
 * @return void
 */
function dd($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    die();
}