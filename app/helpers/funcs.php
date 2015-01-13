<?php

if(!function_exists('get_client_ip')) {
    /**
     * 获取客户端IP地址
     * @return string
     */
    function get_client_ip() {
        return Request::server('REMOTE_ADDR','Unknown');
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