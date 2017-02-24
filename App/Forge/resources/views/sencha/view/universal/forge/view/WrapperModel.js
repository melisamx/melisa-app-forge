Ext.define('Melisa.forge.view.universal.forge.view.WrapperModel', {
    extend: 'Ext.app.ViewModel',        
    alias: 'viewmodel.forgeforgeview',
    
    stores: {
        connections: {
            autoLoad: true,
            remoteFilter: true,
            remoteSort: true,
            proxy: {
                type: 'ajax',
                url: '{modules.connections}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        }
    }
    
});
