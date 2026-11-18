<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\traits;

/**
 * Trait for resources with a format.
 */
trait WithFormatTrait
{
    /**
     * Format.
     */
    protected ?string $format = null;

    /**
     * Set the format.
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    /**
     * Returns the format.
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }
}
