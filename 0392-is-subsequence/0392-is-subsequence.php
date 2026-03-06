<?php

/*

Run in terminal: Is Subsequence
php -r 'require "0392-is-subsequence/0392-is-subsequence.php";
$s = new Solution();
$s1 = "abc";
$s2 = "ahbgdc";
echo json_encode($s->isSubsequence($s1, $s2)).PHP_EOL;'


Run in terminal: Is Subsequence - Two Pointers
php -r 'require "0392-is-subsequence/0392-is-subsequence.php";
$s = new Solution();
$s1 = "abc";
$s2 = "ahbgdc";
echo json_encode($s->isSubsequencePointers($s1, $s2)).PHP_EOL;'
*/
class Solution {
    /**
     * @param string $s
     * @param string $t
     * @return bool
     */
    function isSubsequence(string $s, string $t): bool {
        $sLen = strlen($s); // Get the length of string s
        $tLen = strlen($t); // Get the length of string t
        $sIndex = 0; // Initialize an index for string s
        $tIndex = 0; // Initialize an index for string t
        while ($sIndex < $sLen && $tIndex < $tLen) { // Loop until we reach the end of either string
            if ($s[$sIndex] === $t[$tIndex]) { // If the characters at the current indices of s and t match
                $sIndex++; // Move to the next character in string s
            }
            $tIndex++; // Move to the next character in string t
        }
        return $sIndex === $sLen; // If we have matched all characters in string s, return true; otherwise, return false
    }

    /**
     * @param string $s
     * @param string $t
     * @return bool
     */
    function isSubsequencePointers(string $s, string $t): bool {
        $sPointer = 0;
        $sLen = strlen($s);
        if ($sLen === 0) {
            return true;
        }

        for ($tPointer = 0, $tLen = strlen($t); $tPointer < $tLen; $tPointer++) {
            if ($s[$sPointer] === $t[$tPointer]) {
                $sPointer++;
                if ($sPointer === $sLen) {
                    return true;
                }
            }
        }

        return false;
    }
}