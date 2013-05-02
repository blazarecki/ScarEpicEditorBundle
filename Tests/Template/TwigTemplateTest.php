<?php

/*
 * This file is part of the Scar EpicEditor package.
 *
 * (c) Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Scar\EpicEditorBundle\Tests\Template;

/**
 * Twig template test.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
class TwigTemplateTest extends AbstractTemplateTest
{
    /** @var \Twig_Environment */
    protected $twig;

    /** @var \Twig_Template */
    protected $template;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->twig = new \Twig_Environment(new \Twig_Loader_Filesystem(__DIR__.'/../../Resources/views/Form'));
        $this->template = $this->twig->loadTemplate('epic_editor_widget.html.twig');
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->template);
        unset($this->twig);
    }

    /**
     * {@inheritdoc}
     */
    protected function renderTemplate(array $context = array())
    {
        return $this->template->render($context);
    }
}
