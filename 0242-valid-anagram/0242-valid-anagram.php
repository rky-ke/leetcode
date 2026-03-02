<?php

/*
Run in terminal: Valid Anagram
php -r 'require "0242-valid-anagram/0242-valid-anagram.php";
$s = new Solution();
$s1="anagram";
$s2="nagaram";
echo json_encode($s->isAnagram($s1, $s2)).PHP_EOL;'
*/
class Solution {
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        // change to lowercase and remove spaces
        $s = strtolower(str_replace(' ', '', $s)); // Convert the first string to lowercase and remove spaces
        $t = strtolower(str_replace(' ', '', $t)); // Convert the second string to lowercase and remove spaces
        if (strlen($s) != strlen($t)) { // Check if the lengths of the two strings are different
            return false; // If they are different, they cannot be anagrams
        }
        $hashmap = []; // Initialize an empty hashmap to count the occurrences of each character
        for ($i = 0; $i < strlen($s); $i++) { // Iterate through the characters of the first string
            $hashmap[$s[$i]] = isset($hashmap[$s[$i]]) ? $hashmap[$s[$i]] + 1 : 1; // Increment the count of the current character in the hashmap
        }
        for ($i = 0; $i < strlen($t); $i++) { // Iterate through the characters of the second string
            if (!isset($hashmap[$t[$i]])) { // Check if the current character does not exist in the hashmap
                return false; // If it does not exist, the strings cannot be anagrams
            }
            $hashmap[$t[$i]]--; // Decrement the count of the current character in the hashmap
            if ($hashmap[$t[$i]] < 0) { // Check if the count of the current character becomes negative
                return false; // If it becomes negative, the strings cannot be anagrams
            }
        }
        return true; // If all characters match, the strings are anagrams
    }
}