<?php
// namespace My\RecipesBundle\Tests\Utility\CalculatorTest.php
namespace My\RecipesBundle\Tests\Utility;
 
use My\RecipesBundle\Utility\Calculator;
 
class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(2, 4);
 
        $this->assertEquals(2, $result[0]);
        $this->assertEquals(4, $result[1]);
        $this->assertEquals(6, $result[2]);
        $this->assertEquals("suma", $result[3]);
        $this->assertEquals(4, count($result));
    }
}