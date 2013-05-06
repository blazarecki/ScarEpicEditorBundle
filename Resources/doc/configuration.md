# Configuration

Here the bundle configuration base on the [epic editor config](http://oscargodson.github.io/EpicEditor/)

```
scar_epic_editor:
    class: "Scar\EpicEditorBundle\Form\Type\EpicEditorType"
    js_path: "bundles/scarepiceditor/js/epiceditor.min.js"

    config:
        container:            "epiceditor"
        base_path:            "epiceditor"
        client_side_storage:  true
        local_storage_name:   "epiceditor"
        use_native_fullsreen: true
        parser:               marked
        focus_on_load:        false

        file:
            name:            "epiceditor"
            default_content: ""
            auto_save:       100

        theme:
            base:    "/themes/base/epiceditor.css"
            preview: "/themes/preview/preview-dark.css"
            editor:  "/themes/editor/epic-dark.css"

        shortcut:
            modifier:   18
            fullscreen: 70
            preview:    80
            edit:       79
```
