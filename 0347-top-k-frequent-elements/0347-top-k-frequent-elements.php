<?php

/*
Run in terminal: Top K Frequent Elements
php -r 'require "0347-top-k-frequent-elements/0347-top-k-frequent-elements.php";
$s = new Solution();
$nums = [1,1,1,2,2,3];
$k = 2;
echo json_encode($s->topKFrequent($nums, $k)).PHP_EOL;'


Run in terminal: Top K Frequent Elements - Bucket Sort
php -r 'require "0347-top-k-frequent-elements/0347-top-k-frequent-elements.php";
$s = new Solution();
$nums = [1,1,1,2,2,3];
$k = 2;
echo json_encode($s->topKFrequentBucket($nums, $k)).PHP_EOL;'
*/
class Solution {
    /**
     * @param int[] $nums
     * @param int $k
     * @return int[]
     */
    function topKFrequent( array $nums, int $k): array {
        $hashmap = []; // Initialize an empty hashmap to count the occurrences of each number
        foreach ($nums as $num) { // Iterate through the input array
            $hashmap[$num] = isset($hashmap[$num]) ? $hashmap[$num] + 1 : 1; // Increment the count of the current number in the hashmap
        }
        arsort($hashmap); // Sort the hashmap in descending order based on the counts
        return array_slice(array_keys($hashmap), 0, $k); // Return the keys of the first k elements in the sorted hashmap, which are the top k frequent numbers
    }

    /**
     * @param int[] $nums
     * @param int $k
     * @return int[]
     */
    function topKFrequentBucket(array $nums, int $k): array {
        $frequency = []; // Initialize an empty array to count the frequency of each number
        foreach ($nums as $num) { // Iterate through the input array
            $frequency[$num] = isset($frequency[$num]) ? $frequency[$num] + 1 : 1; // Increment the count of the current number in the frequency array
        }

        $buckets = array_fill(0, count($nums) + 1, []); // Create an array of buckets, where the index represents the frequency and the value is an array of numbers with that frequency
        foreach ($frequency as $num => $count) { // Iterate through the frequency array
            $buckets[$count][] = (int)$num; // Add the number to the corresponding bucket based on its frequency
        }

        $result = [];   // Initialize an empty array to store the result
        for ($count = count($buckets) - 1; $count >= 0; $count--) { // Iterate through the buckets in reverse order (from highest frequency to lowest)
            foreach ($buckets[$count] as $num) { // Iterate through the numbers in the current bucket
                $result[] = $num; // Add the number to the result array
                if (count($result) === $k) { // If the result array has reached the desired size of k, return the result
                    return $result; // Return the top k frequent numbers
                }
            }
        }

        return $result; // Return the result array, which contains the top k frequent numbers (in case there are fewer than k unique numbers)
    }
}