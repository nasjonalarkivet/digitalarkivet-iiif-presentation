<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation;

use digitalarkivet\iiif\presentation\content\ContentResource;
use digitalarkivet\iiif\presentation\traits\WithBehaviorTrait;
use digitalarkivet\iiif\presentation\traits\WithHomepageTrait;
use digitalarkivet\iiif\presentation\traits\WithLabelTrait;
use digitalarkivet\iiif\presentation\traits\WithMetadataTrait;
use digitalarkivet\iiif\presentation\traits\WithPartOfTrait;
use digitalarkivet\iiif\presentation\traits\WithProviderTrait;
use digitalarkivet\iiif\presentation\traits\WithRenderingTrait;
use digitalarkivet\iiif\presentation\traits\WithRequiredStatementTrait;
use digitalarkivet\iiif\presentation\traits\WithRightsTrait;
use digitalarkivet\iiif\presentation\traits\WithSeeAlsoTrait;
use digitalarkivet\iiif\presentation\traits\WithServiceTrait;
use digitalarkivet\iiif\presentation\traits\WithSummaryTrait;
use digitalarkivet\iiif\presentation\traits\WithThumbnailTrait;
use digitalarkivet\iiif\presentation\traits\WithTimeModeTrait;

/**
 * Annotation resource.
 */
class Annotation extends Resource
{
	use WithBehaviorTrait;
	use WithHomepageTrait;
	use WithLabelTrait;
	use WithMetadataTrait;
	use WithPartOfTrait;
	use WithProviderTrait;
	use WithRenderingTrait;
	use WithRequiredStatementTrait;
	use WithRightsTrait;
	use WithSeeAlsoTrait;
	use WithServiceTrait;
	use WithSummaryTrait;
	use WithThumbnailTrait;
	use WithTimeModeTrait;

	/**
	 * Body.
	 */
	protected ?ContentResource $body = null;

	/**
	 * Constructor.
	 */
	public function __construct(
		protected string $id,
		protected Target $target,
		protected Motivation $motivation = Motivation::PAINTING,
		bool $isTopLevel = true,
	) {
		$this->isTopLevel = $isTopLevel;
	}

	/**
	 * Sets the body.
	 */
	public function setBody(ContentResource $body): void
	{
		$this->body = $body;
	}

	/**
	 * Returns the body.
	 */
	public function getBody(): ContentResource
	{
		return $this->body;
	}

	/**
	 * {@inheritDoc}
	 */
	public function toArray(): array
	{
		$array = [
			'id' => $this->id,
			'target' => $this->target->toArray(),
			'motivation' => [$this->motivation->value],
		];

		if ($this->label) {
			$array['label'] = $this->label->toArray();
		}

		if ($this->metadata) {
			$array['metadata'] = $this->metadata->toArray();
		}

		if ($this->summary) {
			$array['summary'] = $this->summary->toArray();
		}

		if ($this->requiredStatement) {
			$array['requiredStatement'] = $this->requiredStatement->toArray();
		}

		if ($this->rights) {
			$array['rights'] = $this->rights;
		}

		if ($this->provider) {
			$array['provider'] = $this->provider->toArray();
		}

		if ($this->thumbnail) {
			$array['thumbnail'] = $this->thumbnail->toArray();
		}

		if ($this->behavior) {
			$array['behavior'] = $this->behavior->toArray();
		}

		if ($this->timeMode) {
			$array['timeMode'] = $this->timeMode->value;
		}

		if ($this->seeAlso) {
			$array['seeAlso'] = $this->seeAlso->toArray();
		}

		if ($this->service) {
			$array['service'] = $this->service->toArray();
		}

		if ($this->homepage) {
			$array['homepage'] = $this->homepage->toArray();
		}

		if ($this->rendering) {
			$array['rendering'] = $this->rendering->toArray();
		}

		if ($this->partOf) {
			$array['partOf'] = $this->partOf->toArray();
		}

		if ($this->body) {
			$array['body'] = $this->body->toArray();
		}

		return [...parent::toArray(), ...$array];
	}
}
