<textarea style="display: none;" <?php echo $view['form']->block($form, 'attributes'); ?>></textarea>
<div id="epic_editor"></div>

<script type="text/javascript" src="<?php echo $js_path; ?>"></script>
<script type="text/javascript">
(function() {
    var opts = {
        'container'         : '<?php echo $options['container']; ?>',
        'basePath'          : '<?php echo $options['base_path']; ?>',
        'clientSideStorage' : '<?php echo $options['client_side_storage']; ?>',
        'localStorageName'  : '<?php echo $options['local_storage_name']; ?>',
        'parser'            : <?php echo $options['parser']; ?>,
        'focusOnLoad'       : '<?php echo $options['focus_on_load']; ?>',
        'file' : {
            'name'           : '<?php echo $options['file']['name']; ?>',
            'defaultContent' : '<?php echo $options['file']['default_content']; ?>',
            'autoSave'       : '<?php echo $options['file']['auto_save']; ?>'
        },
        'theme' : {
            'base'    : '<?php echo $options['theme']['base']; ?>',
            'preview' : '<?php echo $options['theme']['preview']; ?>',
            'editor'  : '<?php echo $options['theme']['editor']; ?>'
        },
        'shortcut' : {
            'modifier'   : '<?php echo $options['shortcut']['modifier']; ?>',
            'fullscreen' : '<?php echo $options['shortcut']['fullscreen']; ?>',
            'preview'    : '<?php echo $options['shortcut']['preview']; ?>',
            'edit'       : '<?php echo $options['shortcut']['edit']; ?>'
        }
    };

    new EpicEditor(opts).load();
})();
</script>
