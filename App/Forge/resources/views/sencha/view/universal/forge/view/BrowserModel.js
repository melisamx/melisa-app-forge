Ext.define('Melisa.forge.view.universal.forge.view.BrowserModel', {
    extend: 'Ext.app.ViewModel',        
    alias: 'viewmodel.forgeforgeviewbrowser',
    
    stores: {
        databases: {
            autoLoad: true,
            remoteFilter: false,
            remoteSort: false,
            proxy: {
                type: 'ajax',
                url: '{modules.databases}{idConnection}/databases/',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        tables: {
            autoLoad: true,
            remoteFilter: false,
            remoteSort: false,
            proxy: {
                type: 'ajax',
                url: '{url}{idConnection}/databases/{database}/tables/',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        columns: {
            autoLoad: false,
            remoteFilter: false,
            remoteSort: false,
            proxy: {
                type: 'ajax',
                url: '{url}/{idConnection}/databases/{database}/{table}/columns/',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        records: {
            autoLoad: false,
            remoteFilter: false,
            remoteSort: false,
            proxy: {
                type: 'ajax',
                url: '{url}/{idConnection}/databases/{database}/{table}/records/',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        }
    }
    
});
