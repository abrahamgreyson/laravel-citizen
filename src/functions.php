<?php

if (! function_exists('service')) {
    function service($class)
    {
        $class = new \ReflectionClass($class);

        return $class->getShortName();
    }
}
