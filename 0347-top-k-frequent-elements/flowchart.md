# 0347 Top K Frequent Elements - Flowchart and Complexities

## topKFrequent(nums, k)

```mermaid
graph TD
    A["Start: topKFrequent(nums, k)"] --> B["Initialize hashmap = {}"]
    B --> C{"For each num in nums?"}
    C -- Yes --> D{"num already in hashmap?"}
    D -- Yes --> E["Increment hashmap[num] by 1"]
    D -- No --> F["Set hashmap[num] = 1"]
    E --> C
    F --> C
    C -- No --> G["Sort hashmap by frequency descending (arsort)"]
    G --> H["Get ordered keys: array_keys(hashmap)"]
    H --> I["Take first k keys: array_slice(..., 0, k)"]
    I --> J["Return result"]
```

- Time complexity: `O(n + m log m + k)`  
  where `n` is the input length and `m` is the number of distinct values.  
  - Counting frequencies: `O(n)`  
  - Sorting frequency map with `arsort`: `O(m log m)`  
  - Slicing first `k` keys: `O(k)`
- Space complexity: `O(m)`  
  for the frequency hashmap and keys list (`m` distinct values).
