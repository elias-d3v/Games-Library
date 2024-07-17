<?php

function assets( $path )
{
    return './public/assets/' . $path;
}

function dd( $var )
{
    var_dump( $var );
    die();
}