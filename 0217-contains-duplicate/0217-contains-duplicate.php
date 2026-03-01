<?php

/*
Run in terminal:
php -r 'require "0217-contains-duplicate/0217-contains-duplicate.php";
$s = new Solution();
$nums=[1,2,3,1];
echo json_encode($s->containsDuplicate($nums)).PHP_EOL;'
*/
class Solution {
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $hashset = []; // Initialize an empty hashset to store unique numbers
        foreach ($nums as $num) { // Iterate through the array of numbers
            if (isset($hashset[$num])) { // Check if the current number already exists in the hashset
                return true; // If it exists, return true (duplicate found)
            }
            $hashset[$num] = true; // Add the current number to the hashset
        }
        return false; // Return false if no duplicates are found
    }
}