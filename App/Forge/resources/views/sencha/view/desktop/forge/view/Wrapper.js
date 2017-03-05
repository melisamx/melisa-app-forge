Ext.define('Melisa.forge.view.desktop.forge.view.Wrapper', {
    extend: 'Ext.tab.Panel',
    
    requires: [
        'Melisa.forge.view.desktop.forge.view.Grid',
        'Melisa.forge.view.desktop.forge.view.WrapperController',
        'Melisa.forge.view.universal.forge.view.WrapperModel',
        'Melisa.core.Module'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'forgeforgeview',
    tabPosition: 'bottom',
    iconCls: 'x-fa fa fa-database',
    viewModel: {
        type: 'forgeforgeview'
    },
    items: [
        {
            title: 'Conexiones', 
            layout: 'fit',
            items: [
                {
                    xtype: 'forgeforgeviewgrid',
                    region: 'center',
                    tbar: [
                        {
                            iconCls: 'x-fa fa-plus',
                            bind: {
                                melisa: '{modules.connections}',
                                hidden: '{!modules.connections.allowed}',
                            },
                            listeners: {
                                click: 'moduleRun'
                            }
                        }
                    ]
                }
            ]
        }
    ]
    
});
