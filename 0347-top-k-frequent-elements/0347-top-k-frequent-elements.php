<?php

/*
Run in terminal: Top K Frequent Elements
php -r 'require "0347-top-k-frequent-elements/0347-top-k-frequent-elements.php";
$s = new Solution();
$nums = [1,1,1,2,2,3];
$k = 2;
echo json_encode($s->topKFrequent($nums, $k)).PHP_EOL;'
*/
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent( array $nums, int $k): array {
        $hashmap = []; // Initialize an empty hashmap to count the occurrences of each number
        foreach ($nums as $num) { // Iterate through the input array
            $hashmap[$num] = isset($hashmap[$num]) ? $hashmap[$num] + 1 : 1; // Increment the count of the current number in the hashmap
        }
        arsort($hashmap); // Sort the hashmap in descending order based on the counts
        return array_slice(array_keys($hashmap), 0, $k); // Return the keys of the first k elements in the sorted hashmap, which are the top k frequent numbers
    }
}