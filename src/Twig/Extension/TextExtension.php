<?php

declare(strict_types=1);

namespace Bolt\Twig\Extension;

use Bolt\Helpers\Str;
use Bolt\Twig\Runtime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Text functionality Twig extension.
 */
class TextExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        $safe = ['is_safe' => ['html']];

        return [
            new TwigFilter('json_decode', [Runtime\TextRuntime::class, 'dummy']),
            new TwigFilter('safestring', [$this, 'safeString']),
            new TwigFilter('slug', [$this, 'slug']),
        ];
    }

    public function safeString($str, $strict = false, $extrachars = '')
    {
        return Str::makeSafe($str, $strict, $extrachars);
    }

    public function slug($str): string
    {
        return Str::slug((string) $str);
    }    
}
