<?php

// Interface utama untuk semua koleksi
interface CollectionInterface {
    public function isEmpty(): bool;
    public function size(): int;
    public function clear(): void;
}

// Interface untuk list/daftar
interface ListInterface extends CollectionInterface {
    public function add($element): void;
    public function get(int $index);
    public function set(int $index, $element): void;
    public function remove(int $index): void;
    public function contains($element): bool;
    public function indexOf($element): int;
}

// Interface untuk antrian
interface QueueInterface extends CollectionInterface {
    public function enqueue($element): void;
    public function dequeue();
    public function peek();
}

// Interface untuk map (key-value)
interface MapInterface extends CollectionInterface {
    public function put($key, $value): void;
    public function get($key);
    public function removeKey($key): void;
    public function containsKey($key): bool;
    public function keys(): array;
}

// Interface untuk iterator
interface IteratorInterface {
    public function hasNext(): bool;
    public function next();
    public function current();
}
