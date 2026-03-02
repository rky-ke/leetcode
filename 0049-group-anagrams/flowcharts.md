# 0049 Group Anagrams - Flowcharts and Complexities

## 1) sortGroupAnagrams(strs)

```mermaid
graph TD
    A["Start: sortGroupAnagrams(strs)"] --> B["Initialize hashmap = {}"]
    B --> C{"For each str in strs?"}
    C -- No --> D["Return array_values(hashmap)"]
    C -- Yes --> E["Split str into char array"]
    E --> F["Sort char array"]
    F --> G["Join chars to get sortedStr key"]
    G --> H{"Key exists in hashmap?"}
    H -- No --> I["Create empty list at hashmap[sortedStr]"]
    H -- Yes --> J["Append str to hashmap[sortedStr]"]
    I --> J
    J --> C
```

- Time complexity: `O(n * k log k)`  
  (`n` = number of strings, `k` = average string length; sorting each string dominates)
- Space complexity: `O(n * k)`  
  (hashmap keys + grouped output storage)

## 2) countGroupAnagrams(strs)

```mermaid
graph TD
    A["Start: countGroupAnagrams(strs)"] --> B["Initialize hashmap = {}"]
    B --> C{"For each str in strs?"}
    C -- No --> D["Return array_values(hashmap)"]
    C -- Yes --> E["Initialize count array of 26 zeros"]
    E --> F{"For each character in str?"}
    F -- Yes --> G["Compute index: ord(char) - ord('a')"]
    G --> H["Increment count at index"]
    H --> F
    F -- No --> I["Build key by joining counts with delimiter"]
    I --> J{"Key exists in hashmap?"}
    J -- No --> K["Create empty list at hashmap[key]"]
    J -- Yes --> L["Append str to hashmap[key]"]
    K --> L
    L --> C
```

- Time complexity: `O(n * k)`  
  (counting characters is linear in each string, 26-length key creation is constant)
- Space complexity: `O(n * k)`  
  (hashmap/grouped output; temporary count array is `O(1)`)
