<?php 

Route::group([
    'prefix'=>'modules',
    'namespace'=>'Modules'
], function() {
    
    require realpath(base_path() . '/routes/modules.php');
    
});

Route::group([
    'prefix'=>'connections'
], function() {
    
    require realpath(base_path() . '/routes/modules/connections.php');
    
});

Route::group([
    'prefix'=>'forms'
], function() {
    
    require realpath(base_path() . '/routes/modules/forms.php');
    
});

Route::group([
    'prefix'=>'records'
], function() {
    
    require realpath(base_path() . '/routes/modules/records.php');
    
});
