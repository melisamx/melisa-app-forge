Ext.define('Melisa.forge.view.desktop.form.add.WrapperController', {
    extend: 'Melisa.controller.Create',
    alias: 'controller.forgeformsadd',
    
    onRender: function() {
        
        var me = this,
            view = me.getView(),
            form = view.down('form'),
            fields = me.getViewModel().get('fields');
        
        form.add(fields);
        
    }    
    
});
