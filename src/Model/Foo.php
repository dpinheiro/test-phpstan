<?php

declare(strict_types=1);

namespace App\Model;

final class Foo
{
    private string $bar;

    public function __construct(string $bar)
    {
        $this->bar = $bar;
    }
}
