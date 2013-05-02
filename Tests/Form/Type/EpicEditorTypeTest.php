<?php

/*
 * This file is part of the Scar EpicEditor package.
 *
 * (c) Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Scar\EpicEditorBundle\Tests\Form\Type;

use Scar\EpicEditorBundle\Form\Type\EpicEditorType;
use Scar\EpicEditorBundle\Tests\Fixtures\ConfigLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Form\Forms;

/**
 * Test the epic editor form type.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
class EpicEditorTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Symfony\Component\Form\FormFactoryInterface */
    protected $factory;

    /** @var \Scar\EpicEditorBundle\Form\Type\EpicEditorType */
    protected $epicEditorType;

    /** @var array */
    protected $config;

    /**
     * {@inheritdooc}
     */
    protected function setUp()
    {
        $this->config = ConfigLoader::load('base.yml');

        $this->epicEditorType = new EpicEditorType($this->config, 'js/path/epiceditor.js');

        $this->factory = Forms::createFormFactoryBuilder()
            ->addType($this->epicEditorType)
            ->getFormFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->factory);
        unset($this->epicEditorType);
    }

    public function testInitialState()
    {
        $this->assertSame(
            'js/path/epiceditor.js',
            \PHPUnit_Framework_Assert::readAttribute($this->epicEditorType, 'jsPath')
        );

        $this->assertSame(
            $this->config,
            \PHPUnit_Framework_Assert::readAttribute($this->epicEditorType, 'config')
        );
    }

    public function testFormVars()
    {
        $form = $this->factory->create('epic_editor');
        $view = $form->createView();

        $this->assertArrayHasKey('js_path', $view->vars);
        $this->assertSame('js/path/epiceditor.js', $view->vars['js_path']);

        $this->assertArrayHasKey('options', $view->vars);
        $this->assertSame($this->config, $view->vars['options']);
    }
}
