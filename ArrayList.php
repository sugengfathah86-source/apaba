<?php
class ArrayList implements ListInterface {
    private array $elements = [];
    private int $size = 0;

    public function isEmpty(): bool {
        return $this->size === 0;
    }

    public function size(): int {
        return $this->size;
    }

    public function clear(): void {
        $this->elements = [];
        $this->size = 0;
    }

    public function add($element): void {
        $this->elements[$this->size] = $element;
        $this->size++;
    }

    public function get(int $index) {
        if ($index < 0 || $index >= $this->size) {
            throw new OutOfBoundsException("Index out of bounds");
        }
        return $this->elements[$index];
    }

    public function set(int $index, $element): void {
        if ($index < 0 || $index >= $this->size) {
            throw new OutOfBoundsException("Index out of bounds");
        }
        $this->elements[$index] = $element;
    }

    public function remove(int $index): void {
        if ($index < 0 || $index >= $this->size) {
            throw new OutOfBoundsException("Index out of bounds");
        }
        
        for ($i = $index; $i < $this->size - 1; $i++) {
            $this->elements[$i] = $this->elements[$i + 1];
        }
        
        unset($this->elements[$this->size - 1]);
        $this->size--;
    }

    public function contains($element): bool {
        return in_array($element, $this->elements, true);
    }

    public function indexOf($element): int {
        $index = array_search($element, $this->elements, true);
        return $index !== false ? $index : -1;
    }

    public function __toString(): string {
        return "ArrayList: " . json_encode(array_values($this->elements));
    }
}
