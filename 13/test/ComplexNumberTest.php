<?php

require_once 'src\ComplexNumber.php';

use MyComplexNumber\ComplexNumber;
use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase
{

    public function testAdd()
    {
        $number1 = new ComplexNumber(1, 3);
        $number2 = new ComplexNumber(4, -5);
        $result = new ComplexNumber(5, -2);
        $this->assertEquals($result, $number1->add($number2));
    }

    public function testSub()
    {
        $number1 = new ComplexNumber(-2, 1);
        $number2 = new ComplexNumber(3, 5);
        $result = new ComplexNumber(-5, -4);
        $this->assertEquals($result, $number1->sub($number2));
    }

    public function testMult()
    {
        $number1 = new ComplexNumber(1, -1);
        $number2 = new ComplexNumber(3, 6);
        $result = new ComplexNumber(9, 3);
        $this->assertEquals($result, $number1->mult($number2));
    }

    public function testDiv()
    {
        $number1 = new ComplexNumber(13, 1);
        $number2 = new ComplexNumber(7, -6);
        $result = new ComplexNumber(1, 1);
        $this->assertEquals($result, $number1->div($number2));
    }

    /**
     * @depends testDiv
     * @expectedException Exception
     */
    public function testNullDiv1(){
        $number1 = new ComplexNumber(13, 1);
        $number2 = new ComplexNumber(0, 0);
        $number1->div($number2);
    }

    public function testNullDiv2(){
        $this->expectException('Exception');
        $number1 = new ComplexNumber(13, 1);
        $number2 = new ComplexNumber(0, 0);
        $number1->div($number2);
    }

    public function testAbs()
    {
        $number = new ComplexNumber(3, -4);
        $result = 5;
        $this->assertEquals($result, $number->abs());
    }

    public function testToString(){
        $number = new ComplexNumber(3, -4);
        $real = $number->getA();
        $imaginary = $number->getB();
        $this->assertEquals("Complex number with real part $real and imaginary part $imaginary", $number->__toString());
    }

}