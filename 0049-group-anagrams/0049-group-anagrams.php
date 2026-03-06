<?php

/*
Run in terminal: Sorterd Group Anagrams
php -r 'require "0049-group-anagrams/0049-group-anagrams.php";
$s = new Solution();
$strs = ["eat", "tea", "tan", "ate", "nat", "bat", "a", "a", "b", "b", "c"];
echo json_encode($s->sortGroupAnagrams($strs)).PHP_EOL;'

Run in terminal: Count Group Anagrams
php -r 'require "0049-group-anagrams/0049-group-anagrams.php";
$s = new Solution();
$strs = ["eat", "tea", "tan", "ate", "nat", "bat", "a", "b", "c"];
echo json_encode($s->countGroupAnagrams($strs)).PHP_EOL;'
*/
class Solution {
    /**
     * @param String[] $strs
     * @return String[][]
     * 
     * The function takes an array of strings as input and groups the anagrams together. It uses a hashmap to store the sorted version of each string as the key and an array of original strings as the value. The sorted version of a string is obtained by splitting it into characters, sorting the characters, and then joining them back into a string. Finally, the function returns the values of the hashmap, which are arrays of anagrams.
     */
    function sortGroupAnagrams($strs) {
        $hashmap = []; // Initialize an empty hashmap to group anagrams
        foreach ($strs as $str) { // Iterate through each string in the input array
            $sortedStr = str_split($str); // Split the string into an array of characters
            sort($sortedStr); // Sort the array of characters
            $sortedStr = implode('#', $sortedStr); // Join the sorted array back into a string
            if (!isset($hashmap[$sortedStr])) { // Check if the sorted string does not exist in the hashmap
                $hashmap[$sortedStr] = []; // If it does not exist, initialize an empty array for this sorted string
            }
            $hashmap[$sortedStr][] = $str; // Append the original string to the array corresponding to the sorted string in the hashmap
        }
        return array_values($hashmap); // Return the values of the hashmap, which are arrays of anagrams
    }

    /**
     * @param String[] $strs
     * @return String[][]
     * 
     * The function takes an array of strings as input and groups the anagrams together. It uses a hashmap to store the count of each character in the string as the key and an array of original strings as the value. The count of characters is represented as a string where each character's count is separated by a delimiter. Finally, the function returns the values of the hashmap, which are arrays of anagrams.
     */

    function countGroupAnagrams($strs) {
        $hashmap = []; // Initialize an empty hashmap to group anagrams
        foreach ($strs as $str) { // Iterate through each string in the input array
            $count = array_fill(0, 26, 0); // Initialize an array to count the occurrences of each character (assuming only lowercase letters)
            for ($i = 0; $i < strlen($str); $i++) { // Iterate through each character in the string
                $count[ord($str[$i]) - ord('a')]++; // Increment the count of the current character
            }
            $key = implode('#', $count); // Create a key by joining the counts with a delimiter
            if (!isset($hashmap[$key])) { // Check if the key does not exist in the hashmap
                $hashmap[$key] = []; // If it does not exist, initialize an empty array for this key
            }
            $hashmap[$key][] = $str; // Append the original string to the array corresponding to the key in the hashmap
        }
        return array_values($hashmap); // Return the values of the hashmap, which are arrays of anagrams
    }
}