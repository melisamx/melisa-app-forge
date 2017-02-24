<?php 

Route::group([
    'prefix'=>'forge',
], function() {
    
    require realpath(base_path() . '/routes/modules/forge.php');
    
});
