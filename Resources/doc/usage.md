# Usage

This bundle provide a form type name ``epic_editor``.

To add a epic_editor type to your form:

```
$form = $this->createFormBuilder()
    ->add('editor', 'epic_editor')
    // ...
```

To render the epic editor in your view:

```
{{ form_widget(form.editor) }}
```

You can specify the base path to your epic editor version

```
# app/config/config.yml
scar_epic_editor:
    js_path: "scarepiceditor/epiceditor.min.js"
```

``` php
$builder->add('field', 'epic_editor', array(
    'js_path' => 'scarepiceditor/epiceditor.min.js',
));
```

You can pass some option to the editor like this

``` php
$builder->add('field', 'epic_editor', array(
    'config' => array(
        'container'           => 'myContainer',
        'base_path'           => 'path/to/my/js',
        'client_side_storage' => false,
        'local_storage_name'    =>  'MyName',
        'parser'                =>  'marked',
        'focus_on_load'         =>  true,
        'file' => array(
            'name'            =>  'myFileName',
            'default_content' =>  'foo',
            'auto_save'       =>  false,
        ),
        'theme' => array(
           'base'    =>  'path/to/base.css'
           'preview' =>  'path/to/preview.css'
           'editor'  =>  'path/to/editor.css'
        ),
        'shortcut' => array(
            'modifier'   =>  1
            'fullscreen' =>  2
            'preview'    =>  3
            'edit'       =>  4
        ),
));
```

You can also use your own EpicEditorType class

```
scar_epic_editor:
    class: Path\To\MyClass
```
