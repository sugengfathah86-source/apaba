<?php
class Node {
    public $data;
    public ?Node $next = null;

    public function __construct($data) {
        $this->data = $data;
    }
}

class LinkedList implements ListInterface {
    private ?Node $head = null;
    private int $size = 0;

    public function isEmpty(): bool {
        return $this->head === null;
    }

    public function size(): int {
        return $this->size;
    }

    public function clear(): void {
        $this->head = null;
        $this->size = 0;
    }

    public function add($element): void {
        $newNode = new Node($element);
        
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        $this->size++;
    }

    public function get(int $index) {
        if ($index < 0 || $index >= $this->size) {
            throw new OutOfBoundsException("Index out of bounds");
        }

        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }

        return $current->data;
    }

    public function set(int $index, $element): void {
        if ($index < 0 || $index >= $this->size) {
            throw new OutOfBoundsException("Index out of bounds");
        }

        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }

        $current->data = $element;
    }

    public function remove(int $index): void {
        if ($index < 0 || $index >= $this->size) {
            throw new OutOfBoundsException("Index out of bounds");
        }

        if ($index === 0) {
            $this->head = $this->head->next;
        } else {
            $current = $this->head;
            for ($i = 0; $i < $index - 1; $i++) {
                $current = $current->next;
            }
            $current->next = $current->next->next;
        }
        $this->size--;
    }

    public function contains($element): bool {
        $current = $this->head;
        while ($current !== null) {
            if ($current->data === $element) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function indexOf($element): int {
        $current = $this->head;
        $index = 0;
        while ($current !== null) {
            if ($current->data === $element) {
                return $index;
            }
            $current = $current->next;
            $index++;
        }
        return -1;
    }

    public function __toString(): string {
        $elements = [];
        $current = $this->head;
        while ($current !== null) {
            $elements[] = $current->data;
            $current = $current->next;
        }
        return "LinkedList: " . json_encode($elements);
    }
}
