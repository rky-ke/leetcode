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

## topKFrequentBucket(nums, k)

```mermaid
graph TD
    A["Start: topKFrequentBucket(nums, k)"] --> B["Initialize frequency map = {}"]
    B --> C{"For each num in nums?"}
    C -- Yes --> D["Increment frequency of num"]
    D --> C
    C -- No --> E["Create buckets array of size n+1"]
    E --> F{"For each (num, count) in frequency map?"}
    F -- Yes --> G["Append num to buckets[count]"]
    G --> F
    F -- No --> H["Initialize result = []"]
    H --> I["Iterate count from high to low"]
    I --> J{"Bucket has values?"}
    J -- No --> K{"More counts to scan?"}
    K -- Yes --> I
    K -- No --> L["Return result"]
    J -- Yes --> M["Append bucket values into result"]
    M --> N{"result size == k?"}
    N -- Yes --> O["Return result"]
    N -- No --> K
```

- Time complexity: `O(n)` average  
  where `n` is the number of input elements.  
  - Build frequency map: `O(n)`  
  - Place values into buckets: `O(m)`  
  - Scan buckets and collect top `k`: `O(n)` in the worst case
- Space complexity: `O(n)`  
  (`frequency` map + bucket array + result).
