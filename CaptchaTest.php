<?php
// require_once 'captcha.php';
require_once 'CaptchaController.php';
class CaptchaTest extends PHPUnit_Framework_TestCase {

    function testControllerValidation () {
        $stubRandomizer = $this->getMock('Randomizer');
        $stubRandomizer->expects($this->any())
          ->method('pattern')
          ->will($this->returnValue(3));
        $stubRandomizer->expects($this->any())
            ->method('operator')
            ->will($this->returnValue(4));
        $controller = new CaptchaController($stubRandomizer);
        $captcha = $controller->buildCaptcha();
        $this->assertEquals("You shouldn't do this to me :(\n", $captcha);
    }

    function testController(){
        $stubRandomizer = $this->getMock('Randomizer');
        $stubRandomizer->expects($this->any())
          ->method('pattern')
          ->will($this->returnValue(1));
        $stubRandomizer->expects($this->any())
            ->method('operator')
            ->will($this->returnValue(1));
        $stubRandomizer->expects($this->any())
              ->method('operand')
              ->will($this->returnValue(1));
        $controller = new CaptchaController($stubRandomizer);
        $captcha = $controller->buildCaptcha();
        $this->assertEquals("One + 1", $captcha);
    }

    function testCaptcha1111ShouldBeOnePlus1() {
        $captcha = new Captcha(1, 1, 1, 1);
        $this->assertEquals("One + 1", $captcha->toString());
    }

    function testCaptcha1121ShouldBeOneMinus1() {
        $captcha = new Captcha(1, 1, 2, 1);
        $this->assertEquals("One - 1", $captcha->toString());
    }

    function testCaptcha2111ShouldBe1PlusOne() {
        $captcha = new Captcha(2, 1, 1, 1);
        $this->assertEquals("1 + One", $captcha->toString());
    }

   }
