<?php

/*
 * This file is part of the Scar EpicEditor package.
 *
 * (c) Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Scar\EpicEditorBundle\Tests;

use Scar\EpicEditorBundle\ScarEpicEditorBundle;

/**
 * Scar epic editor bundle test.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
class ScarEpicEditorBundleTest extends \PHPUnit_Framework_TestCase
{
    public function testBundle()
    {
        $bundle = new ScarEpicEditorBundle();

        $this->assertInstanceOf('Symfony\Component\HttpKernel\Bundle\Bundle', $bundle);
    }
}
