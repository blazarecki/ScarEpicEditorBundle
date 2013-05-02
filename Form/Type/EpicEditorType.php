<?php

/*
 * This file is part of the Scar EpicEditor package.
 *
 * (c) Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Scar\EpicEditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Epic editor type.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
class EpicEditorType extends AbstractType
{
    /** @var array */
    protected $config;

    /** @var string */
    protected $jsPath;

    /**
     * Create a epic form type object.
     *
     * @param array  $config The config.
     * @param string $jsPath The js path to the epic editor file.
     */
    public function __construct(array $config, $jsPath)
    {
        $this->config = $config;
        $this->jsPath = $jsPath;
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['js_path'] = $options['js_path'];
        $view->vars['options'] = $options['config'];
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'js_path' => $this->jsPath,
                'config'  => $this->config
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'textarea';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'epic_editor';
    }
}
