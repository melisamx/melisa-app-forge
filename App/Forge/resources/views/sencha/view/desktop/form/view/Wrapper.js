Ext.define('Melisa.forge.view.desktop.form.view.Wrapper', {
    extend: 'Ext.grid.Panel',
    
    requires: [
        'Melisa.ux.grid.Filters',
        'Melisa.ux.confirmation.Button',
        'Melisa.core.Module',
        'Melisa.forge.view.desktop.form.view.WrapperController'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'forgeformsview',
    deferEmptyText: true,
    bind: {
        store: '{paging}',
        emptyText: 'No hay registros'
    },
    viewModel: {
        stores: {
            paging: {
                autoLoad: true,
                remoteFilter: true,
                remoteSort: true,
                proxy: {
                    type: 'ajax',
                    url: '{modules.paging}',
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                },
                listeners: {
                    metachange: 'onMetachangeGrid'
                }
            }
        }
    },
    selModel: {
        selType: 'checkboxmodel'
    },
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true
    },
    plugins: [
        {
            ptype: 'autofilters'
        }
    ]
    
});
