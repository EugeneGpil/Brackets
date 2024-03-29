<?php

namespace EugeneGpil;

class BracketsCounter 
{
    public static function bracketsCounter($str) 
    {
        $acceptableSimbols = "() \n\t\r";
        $bracketCounter = 0;
        $invalidString = false;
    
        $strlen = strlen($str);
        for ($i=0; $i < $strlen; $i++) {
    
            if (strpos($acceptableSimbols, $str[$i]) === false) {
                throw new \InvalidArgumentException(
                    'Invalid character "' . $str[$i] . '" in string "' . $str . '"'
                );
            }
    
            if ($str[$i] != '(' and $str[$i] != ')' or $invalidString) {
                continue;
            }
            
            if ($str[$i] == '(') {
                $bracketCounter++;
            }
    
            if ($str[$i] == ')') {
                $bracketCounter--;
            }
            
            if ($bracketCounter < 0) {
                $invalidString = true;
            }
        }
        
        if ($bracketCounter > 0 or $invalidString) {
            return false;
        }

        return true;
    }
}

