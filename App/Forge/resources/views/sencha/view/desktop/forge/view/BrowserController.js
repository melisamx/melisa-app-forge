Ext.define('Melisa.forge.view.desktop.forge.view.BrowserController', {
    extend: 'Melisa.core.ViewController',    
    alias: 'controller.forgeforgebrowser',
    
    requires: [
        'Melisa.ux.confirmation.Button',
        'Melisa.forge.view.desktop.form.add.Wrapper'
    ],
    
    config: {
        windowCreate: null
    },
    
    onItemclickDatabases: function(view, record) {
        
        var me = this,
            vm = me.getViewModel(),
            database = vm.get('database'),
            store;
    
        me.lookup('griDatabases').collapse();
        
        if( !database) {
            
            vm.set('database', record.get('name'));
            return;
        }
        
        vm.set('database', record.get('name'));
        store = vm.getStore('tables');
        store.getProxy().url = [
            vm.get('url'),
            vm.get('idConnection'),
            '/databases/',
            vm.get('database'),
            '/tables/'
        ].join('');
        store.load();
        
    },
    
    onItemclickTable: function(view, record) {
        
        this.addTabRecord(record);
        
    },
    
    addTabRecord: function(record) {
        
        var me = this,
            view = me.lookup('tabRecords'),
            vm = me.getViewModel(),
            tabId = 'table' + record.get('id').replace('-', ''),
            tabRecord = view.down('#' + tabId),
            moduleDelete = vm.get('moduleDelete'),
            moduleCreate = vm.get('moduleCreate');
        
        if( tabRecord) {
            view.setActiveItem(tabRecord);
            return;
        }
        
        tabRecord = view.add({
            xtype: 'gridpanel',
            title: record.get('name'),
            itemId: tabId,
            closable: true,
            reference: tabId,
            viewModel: {
                data: {
                    modules: {
                        'delete': {
                            allowed: moduleDelete.allowed,
                            url: [
                                moduleDelete.url,
                                vm.get('idConnection'),
                                '/databases/',
                                vm.get('database'),
                                '/tables/',
                                record.get('name'),
                                '/delete/'
                            ].join('')
                        },
                        create: {
                            allowed: moduleCreate.allowed,
                            nameSpace: 'Melisa.forge.view.desktop.form.add.Wrapper',
                            url: [
                                '/forge.php/forms/',
                                vm.get('keyDatabase'),
                                '/',
                                vm.get('database'),
                                '/',
                                record.get('name'),
                                '/add/'
                            ].join('')
                        }
                    }
                }
            },
            store: Ext.create('Ext.data.Store', {
                autoLoad: true,
                proxy: {
                    type: 'ajax',
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    },
                    url: [
                        vm.get('url'),
                        vm.get('idConnection'),
                        '/databases/',
                        vm.get('database'),
                        '/tables/',
                        record.get('name'),
                        '/paging/'
                    ].join('')
                }
            }),
            tbar: [
                {
                    iconCls: 'x-fa fa-trash',
                    bind: {
                        melisa: '{modules.delete}',
                        hidden: '{!modules.delete.allowed}',
                        disabled: '{!' + tabId + '.selection}'
                    },
                    plugins: {
                        ptype: 'buttonconfirmation'
                    }
                },
                {
                    iconCls: 'x-fa fa-plus',
                    bind: {
                        melisa: '{modules.create}',
                        hidden: '{!modules.create.allowed}'
                    },
                    listeners: {
                        click: 'moduleRun'
                    }
                }
            ],
            bbar: {
                xtype: 'pagingtoolbar',
                displayInfo: true
            }
        });

        tabRecord.getStore().on('metachange', me.onBeforeLoadRecords, tabRecord);
        view.setActiveItem(tabRecord);
        
    },
    
    onBeforeLoadRecords: function(store,  meta) {
        
        var grid = this,
            metaActual = grid.metaActual;
        
        if( !metaActual) {
            grid.metaActual = meta;
            grid.reconfigure(null, meta);
            return;
        }
        
        if( Ext.Array.equals(metaActual, meta)) {
            return;
        }
        
        grid.reconfigure(null, meta);
        
    }
    
});
