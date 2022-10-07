<?php
if(!function_exists('getStorageUrl')){
    function getStorageUrl($name=''){
        $text = public_path();
        $path=str_replace('\public', '', $text);
        return $path.'/storage/app/public/'.$name;
    }
}
?>
