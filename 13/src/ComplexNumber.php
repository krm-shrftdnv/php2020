<?php

namespace MyComplexNumber;

use PHPUnit\Util\Exception;

class ComplexNumber
{
    private int $a;
    private int $b;

    /**
     * ComplexNumber constructor.
     * @param int $a
     * @param int $b
     */
    public function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function __toString()
    {
        return "Complex number with real part $this->a and imaginary part $this->b";
    }

    public function add(ComplexNumber $number): ComplexNumber
    {
        return new ComplexNumber($this->a + $number->a, $this->b + $number->b);
    }

    public function sub(ComplexNumber $number): ComplexNumber
    {
        return new ComplexNumber($this->a - $number->a, $this->b - $number->b);
    }

    public function mult(ComplexNumber $number): ComplexNumber
    {
        return new ComplexNumber($this->a * $number->a - $this->b * $number->b, $this->b * $number->a + $this->a * $number->b);
    }

    public function div(ComplexNumber $number): ComplexNumber
    {
        $divisor = $number->a * $number->a + $number->b * $number->b;
        $number1 = new ComplexNumber($number->a, -$number->b);
        if ($divisor != 0)
            return new ComplexNumber(($this->mult($number1))->a / $divisor, ($this->mult($number1))->b / $divisor);
        else
            throw new Exception("Division by zero");
    }

    public function abs(): float
    {
        return sqrt($this->a * $this->a + $this->b * $this->b);
    }

    /**
     * @return int
     */
    public function getA(): int
    {
        return $this->a;
    }

    /**
     * @param int $a
     */
    public function setA(int $a): void
    {
        $this->a = $a;
    }

    /**
     * @return int
     */
    public function getB(): int
    {
        return $this->b;
    }

    /**
     * @param int $b
     */
    public function setB(int $b): void
    {
        $this->b = $b;
    }

}