<?php
require_once __DIR__.'/vendor/autoload.php';
function captcha($a, $b, $c, $d) {
    $e = array(
        1 => "One",
        2 => "Two",
        3 => "Three",
        4 => "Four",
        5 => "Five",
        6 => "Six",
        7 => "Seven",
        8 => "Eight",
        9 => "Nine",
    );

    $f = array(
        1 => "+",
        2 => "-",
        3 => "*",
    );
    if(($a < 1 or $a > 2) or ($c < 1 or $c > 3)){
        return "You shouldn't do this to me :(" . "\n";
    }

        if($a==1)
        {
            if($c == 1){
                $c = "+";
            }

            if($c == 3){
                $c = "*";
            }

            if($c == 2)
            {
                $c = "-";
            }

            $b = $e[$b];
        }
        else if($a==2){
            if($c == 1){
                $c = "+";
            }

            if($c == 3){
                $c = "x";
            }

            if($c == 2)
            {
                $c = "-";
            }
            $d = $e[$d];
        }
        return $b . " " . $c . " " . $d ;
}

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function () {
    return "";
});
$app->get('/captcha', function () use ($app) {
    return captcha($rand(1,2), rand(1,9), rand(1,3), rand(1,9));
});

$app->run();
