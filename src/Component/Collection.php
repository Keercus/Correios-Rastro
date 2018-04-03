<?php declare(strict_types=1);

namespace Correios\Rastro\Component;

final class Collection implements \ArrayAccess
{
    private $container = array();

    public function __construct(?array $data = [])
    {
        $this->container = $data;
    }

    public function offsetSet($offset, $value): self
    {
        if (is_null($offset)) {
            $this->container[] = $value;
            return $this;
        }

        $this->container[$offset] = $value;
        return $this;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function count(): int
    {
        return count($this->container);
    }

    public function toArray(): array
    {
        return $this->container;
    }
}
