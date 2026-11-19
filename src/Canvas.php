<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation;

use digitalarkivet\iiif\presentation\traits\WithDimensionsTrait;
use digitalarkivet\iiif\presentation\traits\WithDurationTrait;

/**
 * Canvas resource.
 */
class Canvas extends Container
{
	use WithDimensionsTrait;
	use WithDurationTrait;

	/**
	 * {@inheritDoc}
	 */
	public function toArray(): array
	{
		if (!$this->height || !$this->width) {
			throw new IIIFException('Canvas must have width and height.');
		}

		$array = [
			'height' => $this->height,
			'width' => $this->width,
		];

		if ($this->duration) {
			$array['duration'] = $this->duration;
		}

		return [...parent::toArray(), ...$array];
	}
}
