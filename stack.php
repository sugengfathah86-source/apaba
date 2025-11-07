<?php
class Stack implements QueueInterface {
    private array $elements = [];

    public function isEmpty(): bool {
        return empty($this->elements);
    }

    public function size(): int {
        return count($this->elements);
    }

    public function clear(): void {
        $this->elements = [];
    }

    public function enqueue($element): void {
        array_push($this->elements, $element);
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is empty");
        }
        return array_pop($this->elements);
    }

    public function peek() {
        if ($this->isEmpty()) {
            throw new RuntimeException("Stack is empty");
        }
        return end($this->elements);
    }

    public function __toString(): string {
        return "Stack: " . json_encode($this->elements);
    }
}
