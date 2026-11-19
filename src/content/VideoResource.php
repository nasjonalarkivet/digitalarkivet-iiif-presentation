<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\content;

use digitalarkivet\iiif\presentation\properties\linking\ServiceCollection;
use digitalarkivet\iiif\presentation\traits\WithDimensionsTrait;
use digitalarkivet\iiif\presentation\traits\WithDurationTrait;
use digitalarkivet\iiif\presentation\traits\WithFileSizeTrait;
use digitalarkivet\iiif\presentation\traits\WithFormatTrait;
use digitalarkivet\iiif\presentation\traits\WithServiceTrait;

/**
 * Video resource.
 */
class VideoResource extends ContentResource
{
	use WithDimensionsTrait { setHeight as protected; setWidth as protected; }
	use WithDurationTrait { setDuration as protected; }
	use WithFileSizeTrait { setFileSize as protected; }
	use WithFormatTrait { setFormat as protected; }
	use WithServiceTrait { setService as protected; }

	/**
	 * Constructor.
	 */
	public function __construct(
		protected string $id,
		?string $format = null,
		?int $height = null,
		?int $width = null,
		?int $fileSize = null,
		?float $duration = null,
		?ServiceCollection $service = null,
	) {
		$this->format = $format;
		$this->height = $height;
		$this->width = $width;
		$this->fileSize = $fileSize;
		$this->duration = $duration;
		$this->service = $service;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getResourcetype(): ResourceType
	{
		return ResourceType::VIDEO;
	}

	/**
	 * {@inheritDoc}
	 */
	public function toArray(): array
	{
		$array = [
			'id' => $this->id,
			'type' => $this->getResourcetype()->value,
		];

		if ($this->label) {
			$array['label'] = $this->label->toArray();
		}

		if ($this->format) {
			$array['format'] = $this->format;
		}

		if ($this->height) {
			$array['height'] = $this->height;
		}

		if ($this->width) {
			$array['width'] = $this->width;
		}

		if ($this->fileSize) {
			$array['fileSize'] = $this->fileSize;
		}

		if ($this->duration) {
			$array['duration'] = $this->duration;
		}

		if ($this->service) {
			$array['service'] = $this->service->toArray();
		}

		return $array;
	}
}
