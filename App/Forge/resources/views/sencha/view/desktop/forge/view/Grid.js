Ext.define('Melisa.forge.view.desktop.forge.view.Grid', {
    extend: 'Ext.grid.Panel',    
    alias: 'widget.forgeforgeviewgrid',
    
    emptyText: 'No hay conexiones registradas',
    deferEmptyText: true,
    bind: {
        store: '{connections}'
    },
    columns: [
        {
            dataIndex: 'name',
            text: 'Nombre',
            flex: 1
        },
        {
            dataIndex: 'driverName',
            text: 'Driver',
            width: 180
        },
        {
            dataIndex: 'hostname',
            text: 'Host',
            flex: 1
        },
        {
            dataIndex: 'port',
            text: 'Puerto',
            flex: 1
        },
        {
            xtype: 'datecolumn',
            dataIndex: 'updatedAt',
            text: 'Fecha modificación',
            flex: 1,
            format:'d/m/Y h:i:s a',
            hidden: true
        }
    ],
    selModel: {
        selType: 'checkboxmodel'
    },
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true
    },
    listeners: {
        itemdblclick: 'onItemDblClickConnections'
    }
});
