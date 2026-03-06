# 0392 Is Subsequence - Flowcharts and Complexities

## isSubsequence(s, t)

```mermaid
graph TD
    A["Start: isSubsequence(s, t)"] --> B["Set sLen, tLen"]
    B --> C["Set sIndex = 0, tIndex = 0"]
    C --> D{"sIndex < sLen and tIndex < tLen?"}
    D -- No --> E{"sIndex == sLen?"}
    E -- Yes --> F["Return true"]
    E -- No --> G["Return false"]
    D -- Yes --> H{"s[sIndex] == t[tIndex]?"}
    H -- Yes --> I["sIndex++"]
    H -- No --> J["Keep sIndex unchanged"]
    I --> K["tIndex++"]
    J --> K
    K --> D
```

- Time complexity: `O(|t|)`  
  In the worst case, we scan through all characters of `t` once.
- Space complexity: `O(1)`  
  Uses only a few index variables.

## isSubsequencePointers(s, t)

```mermaid
graph TD
    A["Start: isSubsequencePointers(s, t)"] --> B["Set sPointer = 0, sLen = strlen(s)"]
    B --> C{"sLen == 0?"}
    C -- Yes --> D["Return true"]
    C -- No --> E["Loop tPointer from 0 to tLen-1"]
    E --> F{"s[sPointer] == t[tPointer]?"}
    F -- No --> G{"More chars in t?"}
    F -- Yes --> H["sPointer++"]
    H --> I{"sPointer == sLen?"}
    I -- Yes --> D
    I -- No --> G
    G -- Yes --> E
    G -- No --> J["Return false"]
```

- Time complexity: `O(|t|)`  
  Single pass through `t`, with constant work per step.
- Space complexity: `O(1)`  
  Constant extra memory.
