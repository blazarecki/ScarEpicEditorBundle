<?php

/*
 * This file is part of the Scar EpicEditor package.
 *
 * (c) Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Scar\EpicEditorBundle\Tests\DependencyInjection;

use Scar\EpicEditorBundle\DependencyInjection\ScarEpicEditorExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Test the scar epic editor extension.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
class ScarEpicEditorExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Symfony\Component\DependencyInjection\ContainerBuilder */
    protected $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->container = new ContainerBuilder();

        $this->container->setParameter('templating.engines', array('php', 'twig'));

        $this->container->registerExtension($extension = new ScarEpicEditorExtension());
        $this->container->loadFromExtension($extension->getAlias());
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->container);
    }

    public function testFormType()
    {
        $this->container->compile();

        $this->assertInstanceOf(
            'Scar\EpicEditorBundle\Form\Type\EpicEditorType',
            $this->container->get('scar_epic_editor.form.type')
        );
    }

    public function testTwigResources()
    {
        $this->container->compile();

        $this->assertTrue(
            in_array(
                'ScarEpicEditorBundle:Form:epic_editor_widget.html.twig',
                $this->container->getParameter('twig.form.resources')
            )
        );
    }

    public function testPhpResources()
    {
        $this->container->compile();

        $this->assertTrue(
            in_array('ScarEpicEditorBundle:Form',
            $this->container->getParameter('templating.helper.form.resources'))
        );
    }

    public function testClass()
    {
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__.'/../Fixtures/config/yaml/'));
        $loader->load('use_another_class.yml');

        $this->container->compile();

        $this->assertInstanceOf(
            'Scar\EpicEditorBundle\Tests\Fixtures\Form\Type\OtherClassFormType',
            $this->container->get('scar_epic_editor.form.type')
        );
    }
}
