<?php

namespace Brackets;

use InvalidArgumentException;

class Checker{

    /**
     * Checks sting for brackets
     *
     * @param string $string
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function check($string)
    {
        $counter = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);

            if (!$this->isCharValid($char)){
                throw new InvalidArgumentException('Invalid character detected!');
            }

            if ($char == '(') {
                $counter++;
            } elseif ($char == ')') {
                $counter--;
            }

            if ($counter < 0) return false;
        }
        return ($counter === 0);
    }

    /**
     * Checks if character is valid
     *
     * @param string $char
     *
     * @return bool
     */
    private function isCharValid($char)
    {
        return (in_array($char, [" ", "(", ")", "\r", "\t", "\n"]));
    }
}
