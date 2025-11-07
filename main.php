<?php
// ==================== DEMO DAN TESTING ====================

function demonstrateStructures() {
    echo "=== DEMONSTRASI STRUKTUR DATA ===\n\n";
    // Demo ArrayList
    echo "1. ARRAY LIST:\n";
    $arrayList = new ArrayList();
    $arrayList->add("Java");
    $arrayList->add("PHP");
    $arrayList->add("Python");
    $arrayList->add("JavaScript");
    echo $arrayList . "\n";
    echo "Size: " . $arrayList->size() . "\n";
    echo "Contains 'PHP': " . ($arrayList->contains('PHP') ? 'Yes' : 'No') . "\n";
    echo "Index of 'Python': " . $arrayList->indexOf('Python') . "\n";
    $arrayList->remove(1);
    echo "After removing index 1: " . $arrayList . "\n\n";

    // Demo LinkedList
    echo "2. LINKED LIST:\n";
    $linkedList = new LinkedList();
    $linkedList->add("Apple");
    $linkedList->add("Banana");
    $linkedList->add("Cherry");
    $linkedList->add("Date");
    echo $linkedList . "\n";
    echo "Get index 1: " . $linkedList->get(1) . "\n";
    $linkedList->set(2, "Blueberry");
    echo "After setting index 2 to 'Blueberry': " . $linkedList . "\n";
    echo "Contains 'Date': " . ($linkedList->contains('Date') ? 'Yes' : 'No') . "\n\n";

    // Demo Stack
    echo "3. STACK (LIFO):\n";
    $stack = new Stack();
    $stack->enqueue("First");
    $stack->enqueue("Second");
    $stack->enqueue("Third");
    echo $stack . "\n";
    echo "Peek: " . $stack->peek() . "\n";
    echo "Popped: " . $stack->dequeue() . "\n";
    echo "After pop: " . $stack . "\n\n";

    // Demo Queue
    echo "4. QUEUE (FIFO):\n";
    $queue = new Queue();
    $queue->enqueue("Task 1");
    $queue->enqueue("Task 2");
    $queue->enqueue("Task 3");
    echo $queue . "\n";
    echo "Peek: " . $queue->peek() . "\n";
    echo "Dequeued: " . $queue->dequeue() . "\n";
    echo "After dequeue: " . $queue . "\n\n";

    // Demo HashMap
    echo "5. HASH MAP:\n";
    $hashMap = new HashMap();
    $hashMap->put("name", "John Doe");
    $hashMap->put("age", 30);
    $hashMap->put("city", "Jakarta");
    $hashMap->put("country", "Indonesia");
    echo $hashMap . "\n";
    echo "Get 'name': " . $hashMap->get("name") . "\n";
    echo "Contains key 'age': " . ($hashMap->containsKey("age") ? 'Yes' : 'No') . "\n";
    echo "Keys: " . json_encode($hashMap->keys()) . "\n";
    $hashMap->removeKey("city");
    echo "After removing 'city': " . $hashMap . "\n\n";

    // Demo Iterator
    echo "6. ITERATOR DEMO:\n";
    $demoList = new ArrayList();
    $demoList->add("Red");
    $demoList->add("Green");
    $demoList->add("Blue");
    
    $iterator = new ArrayListIterator($demoList);
    echo "ArrayList elements using iterator: ";
    while ($iterator->hasNext()) {
        echo $iterator->next() . " ";
    }
    echo "\n";

    // Demo LinkedList Iterator
    $demoLinkedList = new LinkedList();
    $demoLinkedList->add("One");
    $demoLinkedList->add("Two");
    $demoLinkedList->add("Three");
    
    $linkedListIterator = new LinkedListIterator($demoLinkedList);
    echo "LinkedList elements using iterator: ";
    while ($linkedListIterator->hasNext()) {
        echo $linkedListIterator->next() . " ";
    }
    echo "\n\n";

    // Performance comparison
    echo "7. PERFORMANCE COMPARISON (adding 1000 elements):\n";
    
    // ArrayList
    $start = microtime(true);
    $perfArrayList = new ArrayList();
    for ($i = 0; $i < 1000; $i++) {
        $perfArrayList->add("Element $i");
    }
    $arrayListTime = microtime(true) - $start;
    
    // LinkedList
    $start = microtime(true);
    $perfLinkedList = new LinkedList();
    for ($i = 0; $i < 1000; $i++) {
        $perfLinkedList->add("Element $i");
    }
    $linkedListTime = microtime(true) - $start;
    
    echo "ArrayList time: " . number_format($arrayListTime, 6) . " seconds\n";
    echo "LinkedList time: " . number_format($linkedListTime, 6) . " seconds\n";
}

// ==================== RUN DEMONSTRATION ====================

try {
    demonstrateStructures();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// ==================== CLASS DIAGRAM REPRESENTATION ====================

echo "\n=== CLASS DIAGRAM RELATIONSHIP ===\n";
echo "CollectionInterface\n";
echo "    ├── ListInterface → ArrayList, LinkedList\n";
echo "    ├── QueueInterface → Stack, Queue\n";
echo "    └── MapInterface → HashMap\n";
echo "IteratorInterface → ArrayListIterator, LinkedListIterator\n";

?>
