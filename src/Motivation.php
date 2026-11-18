<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation;

/**
 * Motivations.
 */
enum Motivation: string
{
	case PAINTING = 'painting';
	case COMMENTING = 'commenting';
	case SUPPLEMENTING = 'supplementing';
}
