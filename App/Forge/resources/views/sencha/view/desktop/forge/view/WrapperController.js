Ext.define('Melisa.forge.view.desktop.forge.view.WrapperController', {
    extend: 'Melisa.core.ViewController',    
    alias: 'controller.forgeforgeview',
    
    requires: [
        'Melisa.forge.view.desktop.forge.view.Browser',
        'Melisa.forge.view.universal.forge.view.BrowserModel'
    ],
    
    onItemDblClickConnections: function(view, record) {
        
        this.addTabConnection(record);
        
    },
    
    addTabConnection: function(record) {
        
        var me = this,
            view = me.getView(),
            vm = me.getViewModel(),
            tabId = 'connection' + record.get('id').replace('-', ''),
            tabConnection = view.down('#' + tabId);
        
        if( !tabConnection) {
            tabConnection = view.add({
                xtype: 'forgeforgeviewbrowser',
                title: record.get('name'),
                itemId: tabId,
                closable: true
            });
            tabConnection.getViewModel().set({
                url: vm.get('modules.databases'),
                idConnection: record.get('id'),
                moduleDelete: vm.get('modules.recordsDelete'),
            })
        }
        
        view.setActiveItem(tabConnection);
        
    }
    
});
