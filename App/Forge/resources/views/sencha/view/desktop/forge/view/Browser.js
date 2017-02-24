Ext.define('Melisa.forge.view.desktop.forge.view.Browser', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.forgeforgeviewbrowser',
    
    requires: [
        'Melisa.forge.view.desktop.forge.view.BrowserController',
        'Melisa.forge.view.universal.forge.view.BrowserModel'
    ],
    
    controller: 'forgeforgebrowser',
    layout: {
        type: 'hbox',
        align: 'stretch'
    },
    viewModel: {
        type: 'forgeforgeviewbrowser'
    },
    items: [
        {
            xtype: 'gridpanel',
            reference: 'griDatabases',
            title: 'Base de datos',
            collapseDirection: 'left',
            collapsible: true,
            split: true,
            hideHeaders: true,
            flex: .1,
            bind: {
                store: '{databases}'
            },
            columns: [
                {
                    dataIndex: 'name',
                    text: 'Nombre',
                    flex: 1
                }
            ],
            listeners: {
                itemclick: 'onItemclickDatabases'
            }
        },
        {
            xtype: 'gridpanel',
            title: 'Tablas',
            collapseDirection: 'left',
            collapsible: true,
            split: true,
            hideHeaders: true,
            flex: .2,
            bind: {
                store: '{tables}',
                title: 'Tablas en {griDatabases.selection.name}'
            },
            columns: [
                {
                    dataIndex: 'name',
                    text: 'Tablas',
                    flex: 1
                }
            ],
            listeners: {
                itemclick: 'onItemclickTable'
            }
        },
        {
            xtype: 'tabpanel',
            reference: 'tabRecords',
            split: true,
            flex: .7
        }
    ]
});