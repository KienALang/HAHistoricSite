<?php

/**
 *
 */
class View
{

    function __construct()
    {
        #echo "This is the View<br>";
    }

    function render($name, $data = array())
    {

        foreach ($data as $key => $value) {
            ${$key} = $value;
        }

        require 'views/' . $name . '.php';
    }
}

?>