Ext.define('Melisa.forge.view.desktop.form.view.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.forgeformsview',
    
    onMetachangeGrid: function(store, meta) {
        
        var me = this,
            grid = me.getView(),
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
