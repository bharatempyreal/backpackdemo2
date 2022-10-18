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

if(!function_exists('asset_storage')){
    function asset_storage(){
        $p = asset('');
        $p=str_replace("public/", "",$p);
        $p.="storage/app/public/image/";
        return $p;
    }
}

if(!function_exists('myisset')){
    function myisset($data){
        return (isset($data) && $data != '') ? $data : '';
    }
}
if (! function_exists('old_empty_or_null')) {
    function old_empty_or_null($key, $empty_value = '')
    {
        $key = square_brackets_to_dots($key);
        $old_inputs = session()->getOldInput();
        if (\Arr::has($old_inputs, $key)) {
            return \Arr::get($old_inputs, $key) ?? $empty_value;
        }
        return null;
    }
}
?>
