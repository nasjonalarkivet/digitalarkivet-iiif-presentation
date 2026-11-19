<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation;

/**
 * Target types.
 */
enum TargetType: string
{
	case Annotation = 'Annotation';
	case AnnotationCollection = 'AnnotationCollection';
	case Canvas = 'Canvas';
	case Choice = 'Choice';
	case Collection = 'Collection';
	case Manifest = 'Manifest';
	case Scene = 'Scene';
	case SpecificResource = 'SpecificResource';
	case Timeline = 'Timeline';
    case Composite = 'Composite';
    case Independents = 'Independents';
    case List = 'List';
}
