<textarea style="display: none;" <?= $view['form']->block($form, 'attributes'); ?>></textarea>
<div id="epic_editor"></div>

<script type="text/javascript" src="<?= $js_path; ?>"></script>
<script type="text/javascript">
(function() {
    var opts = {
        'container'         : '<?= $options['container']; ?>',
        'basePath'          : '<?= $options['base_path']; ?>',
        'clientSideStorage' : '<?= $options['client_side_storage']; ?>',
        'localStorageName'  : '<?= $options['local_storage_name']; ?>',
        'parser'            : <?= $options['parser']; ?>,
        'focusOnLoad'       : '<?= $options['focus_on_load']; ?>',
        'file' : {
            'name'           : '<?= $options['file']['name']; ?>',
            'defaultContent' : '<?= $options['file']['default_content']; ?>',
            'autoSave'       : '<?= $options['file']['auto_save']; ?>'
        },
        'theme' : {
            'base'    : '<?= $options['theme']['base']; ?>',
            'preview' : '<?= $options['theme']['preview']; ?>',
            'editor'  : '<?= $options['theme']['editor']; ?>'
        },
        'shortcut' : {
            'modifier'   : '<?= $options['shortcut']['modifier']; ?>',
            'fullscreen' : '<?= $options['shortcut']['fullscreen']; ?>',
            'preview'    : '<?= $options['shortcut']['preview']; ?>',
            'edit'       : '<?= $options['shortcut']['edit']; ?>'
        }
    };

    new EpicEditor(opts).load();
})();
</script>
