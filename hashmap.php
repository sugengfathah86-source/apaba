<?php
class HashMap implements MapInterface {
    private array $buckets = [];
    private int $size = 0;

    public function isEmpty(): bool {
        return $this->size === 0;
    }

    public function size(): int {
        return $this->size;
    }

    public function clear(): void {
        $this->buckets = [];
        $this->size = 0;
    }

    private function hash($key): string {
        return md5(serialize($key));
    }

    public function put($key, $value): void {
        $hash = $this->hash($key);
        $this->buckets[$hash] = $value;
        $this->size++;
    }

    public function get($key) {
        $hash = $this->hash($key);
        return $this->buckets[$hash] ?? null;
    }

    public function removeKey($key): void {
        $hash = $this->hash($key);
        if (isset($this->buckets[$hash])) {
            unset($this->buckets[$hash]);
            $this->size--;
        }
    }

    public function containsKey($key): bool {
        $hash = $this->hash($key);
        return isset($this->buckets[$hash]);
    }

    public function keys(): array {
        return array_keys($this->buckets);
    }

    public function __toString(): string {
        return "HashMap: " . json_encode($this->buckets);
    }
}
