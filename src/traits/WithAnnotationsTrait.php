<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\traits;

use digitalarkivet\iiif\presentation\AnnotationPage;

/**
 * Trait for resources with annotations.
 */
trait WithAnnotationsTrait
{
	/**
	 * Annotations.
	 *
	 * @var AnnotationPage[]
	 */
	protected $annotations = [];

	/**
	 * Add annotation.
	 */
	public function addAnnotation(AnnotationPage $annotationPage): void
	{
		$this->annotations[] = $annotationPage;
	}

    /**
     * Returns the annotations.
     *
     * @return AnnotationPage[]
     */
    public function getAnnotations(): array
    {
        return $this->annotations;
    }
}
