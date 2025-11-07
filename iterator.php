<?php
class ArrayListIterator implements IteratorInterface {
    private ArrayList $list;
    private int $currentIndex = 0;

    public function __construct(ArrayList $list) {
        $this->list = $list;
    }

    public function hasNext(): bool {
        return $this->currentIndex < $this->list->size();
    }

    public function next() {
        if (!$this->hasNext()) {
            throw new RuntimeException("No more elements");
        }
        $element = $this->list->get($this->currentIndex);
        $this->currentIndex++;
        return $element;
    }

    public function current() {
        if ($this->currentIndex === 0) {
            throw new RuntimeException("Iterator not started");
        }
        return $this->list->get($this->currentIndex - 1);
    }
}
