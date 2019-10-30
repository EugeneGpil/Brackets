<?php

function package($str) {
    $acceptableSimbols = "() \n\t\r";

    $firstBracketFinded = false;
    $bracketCounter = 0;

    $strlen = strlen($str);
    for ($i=0; $i < $strlen; $i++) {

        if (strpos($acceptableSimbols, $str[$i]) === false) {
            throw new InvalidArgumentException(
                'Invalid character "' . $str[$i] . '" in string "' . $str . '"'
            );
        }

        if ($str[$i] != '(' and $str[$i] != ')') {
            continue;
        }

        if (!$firstBracketFinded) {
            if ($str[$i] == ')') {
                return false;
            }
            $firstBracketFinded = true;
        }

        if ($str[$i] == '(') {
            $bracketCounter++;
        }

        if ($str[$i] == ')') {
            $bracketCounter--;
        }

        $lastBracket = $str[$i];
    }

    if ($lastBracket == '(') {
        return false;
    }

    return $bracketCounter;
}