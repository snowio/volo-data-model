<?php

namespace SnowIO\VoloDataModel\Order;

trait SetTrait
{
    /**
     * @return static
     */
    public static function of(array $items): self
    {
        $set = new self;
        foreach ($items as $item) {
            try {
                $key = self::getKey($item);
            } catch (\Throwable $e) {
                throw new \Exception;
            }
            if (isset($set->items[$key])) {
                throw new \Exception;
            }
            $set->items[$key] = $item;
        }
        return $set;
    }

    /**
     * @return static
     */
    public static function create(): self
    {
        return new self;
    }

    public function has($key): bool
    {
        return isset($this->items[$key]);
    }

    /**
     * @return static
     */
    public function add(self $otherSet): self
    {
        if ($otherSet->overlaps($this)) {
            throw new \Exception;
        }
        $result = new self;
        $result->items = \array_merge($this->items, $otherSet->items);
        return $result;
    }

    public function overlaps(self $otherSet): bool
    {
        foreach ($this->items as $key => $item) {
            if (isset($otherSet->items[$key])) {
                return true;
            }
        }
        foreach ($otherSet->items as $key => $item) {
            if (isset($this->items[$key])) {
                return true;
            }
        }
        return false;
    }

    public function getIterator(): \Iterator
    {
        foreach ($this->items as $item) {
            yield $item;
        }
    }

    private $items = [];

    private function __construct()
    {
    }
}