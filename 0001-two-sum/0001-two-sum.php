<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $hashmap = []; // Initialize an empty hashmap to store the indices of the numbers
        foreach ($nums as $i => $num) { // Iterate through the array of numbers
            if (isset($hashmap[$target - $num])) { // Check if the complement (target - current number) exists in the hashmap
                return [$hashmap[$target - $num], $i]; // If it exists, return the indices of the complement and the current number
            }
            $hashmap[$num] = $i; // Store the index of the current number in the hashmap
        }
        return []; // Return an empty array if no solution is found (though the problem guarantees one solution)
    }
}