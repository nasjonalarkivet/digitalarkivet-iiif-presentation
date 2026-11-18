<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\content;

use digitalarkivet\iiif\presentation\properties\linking\ServiceCollection;
use digitalarkivet\iiif\presentation\traits\WithDurationTrait;
use digitalarkivet\iiif\presentation\traits\WithFileSizeTrait;
use digitalarkivet\iiif\presentation\traits\WithFormatTrait;
use digitalarkivet\iiif\presentation\traits\WithServiceTrait;

/**
 * Audio resource.
 */
class AudioResource extends ContentResource
{
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
		?int $fileSize = null,
		?float $duration = null,
		?ServiceCollection $service = null,
	) {
		$this->format = $format;
		$this->fileSize = $fileSize;
		$this->duration = $duration;
		$this->service = $service;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getResourcetype(): ResourceType
	{
		return ResourceType::AUDIO;
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
