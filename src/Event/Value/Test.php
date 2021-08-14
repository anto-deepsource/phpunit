<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Code;

use PHPUnit\Metadata\MetadataCollection;

/**
 * @psalm-immutable
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class Test
{
    /**
     * @psalm-var class-string
     */
    private string $className;

    private string $methodName;

    private string $methodNameWithDataSet;

    private string $dataSet;

    private string $file;

    private int $line;

    private MetadataCollection $metadata;

    /**
     * @psalm-param class-string $className
     */
    public function __construct(string $className, string $methodName, string $methodNameWithDataSet, string $dataSet, string $file, int $line, MetadataCollection $metadata)
    {
        $this->className             = $className;
        $this->methodName            = $methodName;
        $this->methodNameWithDataSet = $methodNameWithDataSet;
        $this->dataSet               = $dataSet;
        $this->file                  = $file;
        $this->line                  = $line;
        $this->metadata              = $metadata;
    }

    /**
     * @psalm-return class-string
     */
    public function className(): string
    {
        return $this->className;
    }

    public function methodName(): string
    {
        return $this->methodName;
    }

    public function usesProvidedData(): bool
    {
        return !empty($this->dataSet);
    }

    public function methodNameWithDataSet(): string
    {
        return $this->methodNameWithDataSet;
    }

    public function dataSet(): string
    {
        return $this->dataSet;
    }

    public function file(): string
    {
        return $this->file;
    }

    public function line(): int
    {
        return $this->line;
    }

    public function metadata(): MetadataCollection
    {
        return $this->metadata;
    }
}
