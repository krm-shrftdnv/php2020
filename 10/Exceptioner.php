<?php

use \Exceptions\MainException;
use \Exceptions\LessException;
use \Exceptions\LittleException;
use \Exceptions\MiniException;
use \Exceptions\MicroException;

//spl_autoload_register(function ($name) {
//    $path = $_SERVER['DOCUMENT_ROOT'] .'\\Exceptions\\'. $name . '.php';
//    require $path;
//});

class Exceptioner
{

    function funcOne()
    {
        $rand = rand(1, 2);
        switch ($rand) {
            case 1 :
            {
                throw new \Exceptions\MainException("Main Exception");
                break;
            }
            case 2 :
            {
                throw new \Exceptions\LessException("Less Exception");
                break;
            }
        }
    }

    function funcTwo()
    {
        $rand = rand(1, 2);
        switch ($rand) {
            case 1 :
            {
                throw new \Exceptions\LessException("Less Exception");
                break;
            }
            case 2 :
            {
                throw new \Exceptions\LittleException("Little Exception");
                break;
            }
        }
    }

    function funcThree()
    {
        $rand = rand(1, 2);
        switch ($rand) {
            case 1 :
            {
                throw new \Exceptions\LittleException("Little Exception");
                break;
            }
            case 2 :
            {
                throw new \Exceptions\MiniException("Mini Exception");
                break;
            }
        }
    }

    function funcFour()
    {
        $rand = rand(1, 2);
        switch ($rand) {
            case 1 :
            {
                throw new \Exceptions\MiniException("Mini Exception");
                break;
            }
            case 2 :
            {
                throw new \Exceptions\MicroException("Micro Exception");
                break;
            }
        }
    }

}
