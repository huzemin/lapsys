<?php

if(!function_exists('get_client_ip')) {
    /**
     * 获取客户端IP地址
     * @return string
     */
    function get_client_ip() {
        return Request::getClientIp();
    }
}

if(!function_exists('pf')) {
    /**
     * @desc        自定义输出var_dump格式
     * @author      huzemin
     * @param       string $url        数据
     **/
    if(!function_exists('pf')) {
        function pf($var, $message='', $fixed=true){
            if($fixed) {
                // $fixed_css = 'position:fixed;top:0;left:0;z-index:10000';
                $fixed_css='';
            }
            echo "<pre style='border: 1px solid #DA5555; background: #F8F8F8;box-shadow: 0px 1px 2px rgba(202, 0, 0, 0.7);color:darkgreen;margin:5px auto;padding:20px;font-size:12px;text-align:left;word-wrap: break-word;border-radius: 5px;{$fixed_css}'> ";
            if(is_array($var))
                print_r($var);
            elseif(is_object($var))
                var_dump($var);
            else{
                if(!empty($message))
                    echo "{$message}" . HTML_BR;
                echo  "Type: " . gettype($var) .' -->  ' . $var;
            }

            echo "</pre>";
        }
    }
}

if(!function_exists('lang')) {
    function lang($key, Array $replace = array()) {
        return Lang::get($key, $replace);
    }
}

if(!function_exists('valid_email')) {
    function valid_email($email_str) {
        $preg = "#^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$#";
        if(preg_match($preg, $email_str)) {
            return true;
        }
        return false;
    }
}

if(!function_exists('get_upload_path')) {
    function get_upload_path($type = null) {
        $date = date('Ymd');
        switch ($type) {
            case 'public':
                $path = public_path().'/uploads/images/';
                break;
            case 'avatar':
                $path = public_path().'/uploads/avatar/';
                break;
            case 'cache':
                $path = storage_path().'/uploads/';
                break;
            default:
                $path = public_path().'/uploads/default/'.$type.'/';
                break;
        }
        return str_replace('\\',DIRECTORY_SEPARATOR,$path.$date.'/');
    }
}
if(!function_exists('get_upload_filename')) {
    function generate_rand_file($extension) {
        return time().mt_rand(0,9999).'.'.$extension;
    }
}

if(!function_exists('generate_upload_target')) {
    function generate_upload_target($extension, $type="") {
        $target = array(
            'filename' => generate_rand_file($extension),
            'path'=> get_upload_path($type),
            'ext' => $extension,
            );
        $target['target'] = str_replace('\\', DIRECTORY_SEPARATOR, $target['path'].$target['filename']);
        $target['store'] =  str_replace(public_path(), '', $target['target']);
        return $target;
    }
}

if(!function_exists('resize')) {
    // 图片缩放
    function resize($file,$width = 100,$height = 100,$type = 'basic',$absolute = false) {
       $target = \Lib\File::resize($file,$width,$height,$type);
       if($absolute) {
            return $target;
       } else {
            return str_replace(PUBLIC_PTH, '', $target);
       }
    }
}

if(!function_exists('do_upload')) {
    // 图片上传
    function do_upload($field,$folder,$relative = true, $auto_date_dir = true) {
        $uploadObj = new \Lib\Upload(array(
            'upload_form_field' => $field,
            'auto_date_dir'     => $auto_date_dir,
            'out_file_dir'      => UP_PTH . $folder .'/',
            'allowed_file_ext'  => array('gif', 'jpg', 'jpeg', 'png')
        ));
        $upfile_arr = $uploadObj->upload_process();
        if(count($upfile_arr) > 0 && $relative) {
            foreach($upfile_arr as $key => &$value) {
                $value = str_replace(PUBLIC_PTH, '', $value);
            }
        }
        return $upfile_arr;
    }
}