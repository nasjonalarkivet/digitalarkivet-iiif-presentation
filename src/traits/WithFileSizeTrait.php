<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\traits;

/**
 * Trait for resources with a file size.
 */
trait WithFileSizeTrait
{
    /**
     * File size.
     */
    protected ?int $fileSize = null;

    /**
     * Set the fileSize.
     */
    public function setFileSize(int $fileSize): void
    {
        $this->fileSize = $fileSize;
    }

    /**
     * Returns the fileSize.
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }
}
