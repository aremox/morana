<?php

namespace My\RecipesBundle\Utility;
 
class Calculator
{
    public function add($a, $b)
    {
        return array($a,$b, ($a+$b),"suma");
    }
}