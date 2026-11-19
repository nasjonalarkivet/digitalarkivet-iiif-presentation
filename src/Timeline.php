<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation;

use digitalarkivet\iiif\presentation\traits\WithDurationTrait;

/**
 * Timeline resource.
 */
class Timeline extends Container
{
	use WithDurationTrait;

	/**
	 * {@inheritDoc}
	 */
	public function toArray(): array
	{
		if (!$this->duration) {
			throw new IIIFException('Timeline must have duration.');
		}

		return [...parent::toArray(), 'duration' => $this->duration];
	}
}
