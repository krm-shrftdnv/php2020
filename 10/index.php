<?php

use \Exceptions\MainException;
use \Exceptions\LessException;
use \Exceptions\LittleException;
use \Exceptions\MiniException;
use \Exceptions\MicroException;

spl_autoload_register();

$exceptioner = new Exceptioner();

for ($i = 1; $i <= 4; $i++) {
    try {
        switch ($i) {
            case 1:
            {
                $exceptioner->funcOne();
                break;
            }
            case 2:
            {
                $exceptioner->funcTwo();
                break;
            }
            case 3:
            {
                $exceptioner->funcThree();
                break;
            }
            case 4:
            {
                $exceptioner->funcFour();
                break;
            }

        }
    } catch (MainException $e) {
        echo $e->getMessage();
        echo "<br>";
    } catch (LessException $e) {
        echo $e->getMessage();
        echo "<br>";
    } catch (LittleException $e) {
        echo $e->getMessage();
        echo "<br>";
    } catch (MiniException $e) {
        echo $e->getMessage();
        echo "<br>";
    } catch (MicroException $e) {
        echo $e->getMessage();
        echo "<br>";
    }
}