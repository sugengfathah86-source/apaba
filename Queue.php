<?php
class Queue implements QueueInterface {
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
            throw new RuntimeException("Queue is empty");
        }
        return array_shift($this->elements);
    }

    public function peek() {
        if ($this->isEmpty()) {
            throw new RuntimeException("Queue is empty");
        }
        return $this->elements[0];
    }

    public function __toString(): string {
        return "Queue: " . json_encode($this->elements);
    }
}
