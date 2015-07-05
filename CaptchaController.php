<?php
require_once 'captchaClass.php';

class CaptchaController{
    private $randomizer;
    function __construct($randomizer){
        $this->randomizer = $randomizer;
    }
    function validate ($pattern, $operator) {
        return ($pattern < 1 or $pattern > 2) or ($operator < 1 or $operator > 3);
    }
    function buildCaptcha() {
            $pattern = $this->randomizer->pattern();
            $left = $this->randomizer->operand();
            $operator = $this->randomizer->operator();
            $right = $this->randomizer->operand();
            if ($this->validate($pattern, $operator)) {
                return "You shouldn't do this to me :(" . "\n";
            }
            else {
                $captcha = new Captcha($pattern, $left, $operator, $right);
                return $captcha->toString();
            }
    }
}

class Randomizer{
    function pattern(){
        return rand(1,2);
    }
    function operand(){
        return rand(1,9);
    }
    function operator(){
        return rand(1,3);
    }
}
?>
