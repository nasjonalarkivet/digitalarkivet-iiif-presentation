<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\properties\descriptive\provider;

use digitalarkivet\iiif\presentation\LanguageStrings;
use digitalarkivet\iiif\presentation\traits\WithHomepageTrait;
use digitalarkivet\iiif\presentation\traits\WithLabelTrait;
use digitalarkivet\iiif\presentation\traits\WithLogoTrait;
use digitalarkivet\iiif\presentation\traits\WithSeeAlsoTrait;

/**
 * Agent.
 * @link https://iiif.io/api/presentation/3.0/#provider
 */
class Agent
{
    use WithHomepageTrait;
    use WithLabelTrait { setLabel as protected; }
    use WithLogoTrait;
	use WithSeeAlsoTrait;

    /**
     * Constructor.
     */
    public function __construct(
		protected string $id,
		LanguageStrings $label
	) {
        $this->label = $label;
    }

    /**
     * Returns an array representation of the agent descriptive property.
     */
    public function toArray(): array
    {
		$array = [
			'id' => $this->id,
			'type' => 'Agent',
			'label' => $this->label->toArray(),
		];

		if ($this->homepage) {
			$array['homepage'] = $this->homepage->toArray();
		}

		if ($this->logo) {
			$array['logo'] = $this->logo->toArray();
		}

		if ($this->seeAlso) {
			$array['seeAlso'] = $this->seeAlso->toArray();
		}

        return $array;
    }
}
