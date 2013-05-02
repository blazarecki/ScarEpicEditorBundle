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

use Scar\EpicEditorBundle\Tests\Fixtures\ConfigLoader;

/**
 * Abstract template test.
 *
 * @author Benjamin Lazarecki <benjamin.lazarecki@gmail.com>
 */
abstract class AbstractTemplateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Renders a template.
     *
     * @param array $context The template context.
     *
     * @return string The template output.
     */
    abstract protected function renderTemplate(array $context = array());

    /**
     * Normalizes the output by removing the heading whitespaces.
     *
     * @param string $output The output.
     *
     * @return string The normalized output.
     */
    protected function normalizeOutput($output)
    {
        return preg_replace('/^\s+/m', '', $output);
    }

    public function testRender()
    {
        $output = $this->renderTemplate(
            array(
                'form'      => $this->getMock('Symfony\Component\Form\FormView'),
                'js_path'   => 'js_path',
                'options'   => ConfigLoader::load('base.yml'),
            )
        );

        $expected = <<<EOF
<textarea style="display: none;" ></textarea>
<div id="epic_editor"></div>
<script type="text/javascript" src="js_path"></script>
<script type="text/javascript">
(function() {
var opts = {
'container'         : 'options.container',
'basePath'          : 'options.base_path',
'clientSideStorage' : 'options.client_side_storage',
'localStorageName'  : 'options.local_storage_name',
'parser'            : options.parser,
'focusOnLoad'       : 'options.focus_on_load',
'file' : {
'name'           : 'options.file.name',
'defaultContent' : 'options.file.default_content',
'autoSave'       : 'options.file.auto_save'
},
'theme' : {
'base'    : 'options.theme.base',
'preview' : 'options.theme.preview',
'editor'  : 'options.theme.editor'
},
'shortcut' : {
'modifier'   : 'options.shortcut.modifier',
'fullscreen' : 'options.shortcut.fullscreen',
'preview'    : 'options.shortcut.preview',
'edit'       : 'options.shortcut.edit'
}
};
new EpicEditor(opts).load();
})();
</script>

EOF;

        $this->assertSame($expected, $this->normalizeOutput($output));
    }
}
