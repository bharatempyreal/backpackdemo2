<?php
if(!function_exists('getStorageUrl')){
    function getStorageUrl($name=''){
        $text = storage_path();
        $path=$text.'\app\public/'.$name;
        return $path;
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
?>
