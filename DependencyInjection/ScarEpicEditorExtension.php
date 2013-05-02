<?php

/*
 * This file is part of the Scar EpicEditor package.
 *
 * (c) Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Scar\EpicEditorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Scar epic editor extension.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
class ScarEpicEditorExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->register($config, $container);
    }

    /**
     * Register the extension.
     *
     * @param array            $config    The config.
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container The container builder.
     */
    protected function register(array $config, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $loader->load('form.xml');

        $this->registerClass($config['class'], $container);
        $this->registerResources($container);
        $this->registerConfigs($config, $container);
    }

    /**
     * Register the class to use for the epic editor type.
     *
     * @param string           $class     The class tu use for epic editor type.
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container The container builder.
     */
    protected function registerClass($class, ContainerBuilder $container)
    {
        $container
            ->getDefinition('scar_epic_editor.form.type')
            ->setClass($class);
    }

    /**
     * Register the resources for templating engines.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container The container builder.
     */
    protected function registerResources(ContainerBuilder $container)
    {
        $templatingEngines = $container->getParameter('templating.engines');

        if (in_array('php', $templatingEngines)) {
            $phpFormResources = $container->hasParameter('templating.helper.form.resources')
                ? $container->getParameter('templating.helper.form.resources')
                : array();

            $container->setParameter(
                'templating.helper.form.resources',
                array_merge($phpFormResources, array('ScarEpicEditorBundle:Form'))
            );
        }

        if (in_array('twig', $templatingEngines)) {
            $twigFormResources = $container->hasParameter('twig.form.resources')
                ? $container->getParameter('twig.form.resources')
                : array();

            $container->setParameter(
                'twig.form.resources',
                array_merge($twigFormResources, array('ScarEpicEditorBundle:Form:epic_editor_widget.html.twig'))
            );
        }
    }

    /**
     * Register the configs.
     *
     * @param array                                                   $config    The config.
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container The container builder.
     */
    protected function registerConfigs(array $config, ContainerBuilder $container)
    {
        $container
            ->getDefinition('scar_epic_editor.form.type')
            ->addArgument($config['config'])
            ->addArgument($config['js_path']);
    }
}
