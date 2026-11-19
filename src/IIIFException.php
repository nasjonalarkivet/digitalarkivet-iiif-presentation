<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation;

use RuntimeException;

/**
 * Thrown when a resource is built in a way that violates the IIIF specification.
 */
class IIIFException extends RuntimeException
{
}
