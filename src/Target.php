<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation;

/**
 * Target.
 */
class Target
{
	/**
	 * Constructor.
	 */
	public function __construct(
		protected string $id,
		protected string|TargetType $type
	) {
	}

	/**
	 * Returns an array representation of the target.
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'type' => $this->type instanceof TargetType ? $this->type->value : $this->type,
		];
	}
}
