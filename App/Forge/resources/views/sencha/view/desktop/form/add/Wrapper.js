Ext.define('Melisa.forge.view.desktop.form.add.Wrapper', {
    extend: 'Melisa.view.desktop.window.Modal',
    alias: 'widget.forgeformadd',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.view.desktop.window.Modal',
        'Melisa.forge.view.desktop.form.add.WrapperController',
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    width: 600,
    height: 400,
    controller: 'forgeformsadd',
    config: {
        isAutoShow: true
    },
    viewModel: {},
    items: [
        {
            xtype: 'form',
            scrollable: true,
            layout: {
                type: 'vbox',
                align: 'stretch'
            }
        }
    ],
    bbar: {
        xtype: 'toolbardefault'
    }
    
});
