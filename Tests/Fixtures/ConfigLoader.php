<?php

/*
 * This file is part of the Scar EpicEditor package.
 *
 * (c) Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Scar\EpicEditorBundle\Tests\Fixtures;

use Symfony\Component\Yaml\Yaml;

/**
 * Load config for test.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
class ConfigLoader
{
    /**
     * Parse a file.
     *
     * @param string $filename The filename.
     *
     * @return array The file representation.
     */
    static public function load($filename)
    {
        return Yaml::parse(sprintf(__DIR__.'/config/yaml/%s', $filename));
    }
}
