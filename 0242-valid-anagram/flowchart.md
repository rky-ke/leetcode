# Valid Anagram Flowchart

```mermaid
graph TD
    A["Start: isAnagram(s, t)"] --> B["Normalize inputs: lowercase and remove spaces"]
    B --> C{"Lengths different?"}
    C -- Yes --> D["Return false"]
    C -- No --> E["Initialize empty hashmap"]
    E --> F["Count each char in s"]
    F --> G["For each char in t"]
    G --> H{"Char missing in hashmap?"}
    H -- Yes --> D
    H -- No --> I["Decrement char count"]
    I --> J{"Count < 0?"}
    J -- Yes --> D
    J -- No --> K{"More chars in t?"}
    K -- Yes --> G
    K -- No --> L["Return true"]
```
flowchart TD
    A([Start: isAnagram(s, t)]) --> B["Normalize inputs: lowercase and remove spaces"]
    B --> C{"Are lengths different?"}
    C -- Yes --> D([Return false])
    C -- No --> E["Initialize hashmap as empty map"]

    E --> F["Loop over each character in s"]
    F --> G["Increment count for that character in hashmap"]

    G --> H["Loop over each character in t"]
    H --> I{"Character not found in hashmap?"}
    I -- Yes --> D
    I -- No --> J["Decrement count for that character"]
    J --> K{"Count becomes negative?"}
    K -- Yes --> D
    K -- No --> L{"More characters in t?"}
    L -- Yes --> H
    L -- No --> M([Return true])
