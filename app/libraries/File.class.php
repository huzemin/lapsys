<?php

/**
 * 文件管理
 *
 */
namespace Lib;
class File {

    public static $paths = array();

    /**
     * 创建目录 - 可多级同时创建
     *
     * @param string $path
     * @return boolean
     */
    public static function createFolder($path) {
        if (file_exists($path)) {
            return true;
        }
        return mkdir($path, 0777, true);
        /**5.0后直接支持多级目录
         * if(!file_exists($path)){
         * self::createFolder(dirname($path));
         * return mkdir($path, 0777);
         * }
         * return true;*/
    }

    /**
     * 生成静态文件
     *
     * @param string $path
     * @param string $file
     * @param string $data
     * @return boolean
     */
    public static function makeHtml($file, $data) {
        $path = dirname($file);
        if (self::createFolder($path)) {
            // $fp = fopen($file, 'w');
            // fwrite($fp, $data);
            // fclose($fp);
            return file_put_contents($file, $data);
        } else {
            return false;
        }
    }

    /**
     * 删除文件
     *
     * @param string $file
     */
    public static function delFile($file) {
        if (file_exists($file)) {
            return @unlink($file);
        }
        return true;
    }

    /**
     * 读取指定目录及其子目录下的指定格式的文件
     *
     * @param string $path
     * @param boolean $subdir
     * @param string $extention
     * @return array
     */
    public static function getFiles($path = '', $subdir = true, $extention = '*') {
        $pattern = '*';
        if ($extention != '*') {
            $pattern = "/\.($extention)$/i"; // extention = html|xml
        }
        $files = array();
        $curimage = 0;
        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    if (is_dir("{$path}/{$file}") && $subdir == true) {
                        $files[$file] = self::getFiles("$path/$file", $subdir, $extention);

                    } else {
                        if ($pattern == '*' || preg_match($pattern, $file)) {
                            $files[] = $file;
                        }
                    }

                }
                closedir($handle);
            }
        }
        return $files;
    }


    public static function getPaths($path = '', $subdir = true, $extention = '*') {
        $pattern = '*';
        if ($extention != '*') {
            $pattern = "/\.($extention)$/i"; // extention = html|xml
        }
        $curimage = 0;
        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    if (is_dir("{$path}/{$file}") && $subdir == true) {
                        self::getPaths("$path/$file", $subdir, $extention);
                    } else {
                        if ($pattern == '*' || preg_match($pattern, $file)) {
                            self::$paths[] = $path . '/' . $file;
                        }
                    }

                }
                closedir($handle);
            }
        }
        return self::$paths;
    }


    // 加载文件
    public static function loadfile($file) {
        $content = '';
        if (file_exists($file)) {
            $content = @file_get_contents($file);
        }
        return $content;
    }

    // 保存文件
    public static function keepfile($file, $content) {
        return @file_put_contents($file, $content);
    }

    // 创建压缩包文件
    public static function makeZipFile($zip, $path, $zipFile, $releate = '', $subdir = true, $extention = '*') {
        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                $pattern = '*';
                if ($extention != '*') {
                    $pattern = "/\.($extention)$/i"; // extention = html|xml
                }

                if (true === $zip->open($zipFile, ZipArchive::CREATE)) {
                    while (false !== ($file = readdir($handle))) {
                        if ($file == '.' || $file == '..') {
                            continue;
                        }

                        $source = preg_replace('/\/+/', '/', $path . '/' . $file);
                        if (is_dir($source)) {
                            if ($subdir == true) {
                                $rel = preg_replace('/\/+/', '/', $releate . '/' . $file);
                                self::makeZipFile($zip, $source, $zipFile, $rel, $subdir, $extention);
                            }
                        } else {
                            $file = preg_replace('/\/+/', '/', $releate . '/' . $file);
                            if ($pattern == '*') {
                                $zip->addFile($source, $file);
                            } elseif (preg_match($pattern, $file)) {
                                $zip->addFile($source, $file);
                                //echo "添加 {$source}->{$file} <br />\n";
                            }
                        }
                    }
                    //$zip->close();
                }
                closedir($handle);
            }
        }
    }

    /*******************************************************************************
     * 解包zip
     *******************************************************************************/
    public static function unzip($zipfile, $target = '') {
        if (!file_exists($zipfile)) {
            return false;
        }
        $zip = new ZipArchive;
        if ($zip->open($zipfile) === true) {
            $target = realpath($target);
            $zip->extractTo($target);
            $zip->close();
            return true;
        }
        return false;
    }

    // 复制目录
    public static function copyDir($sourceDir, $directDir, $subdir = false, $extention = '*') {
        if (is_dir($sourceDir) && File::createFolder($directDir)) {
            $pattern = '*';
            if ($extention != '*') {
                $pattern = "/\.($extention)$/i"; // extention = html|xml
            }
            if ($handle = opendir($sourceDir)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }

                    $source = preg_replace('/\/+/', '/', $sourceDir . '/' . $file);
                    $direct = preg_replace('/\/+/', '/', $directDir . '/' . $file);

                    if (is_dir($source)) {
                        if ($subdir == true && file_exists($source)) {
                            //echo "进入子目录 {$source}->{$direct} <br />\n";
                            self::copyDir($source, $direct, $subdir, $extention);
                        }
                    } else {
                        if (file_exists($source)) {
                            if ($pattern == '*') {
                                copy($source, $direct);
                            } elseif (preg_match($pattern, $file)) {
                                copy($source, $direct);
                            }
                        }
                    }
                }
                closedir($handle);
            }
        }
    }

    // 删除目录及目录下所有文件
    public static function removeDir($dirName) {
        $result = false;
        if (is_dir($dirName)) {
            $handle = opendir($dirName);
            while (($file = readdir($handle)) !== false) {
                if ($file != '.' && $file != '..') {
                    $dir = $dirName . '/' . $file;
                    is_dir($dir) ? self::removeDir($dir) : unlink($dir);
                }
            }
            closedir($handle);
            $result = rmdir($dirName) ? true : false;
        }
        return $result;
    }

   


    function write_file($file, $data) {
        if (empty($data)) return false;
        if (is_array($data)) $array = "<?php\nreturn " . var_export($array, true) . ";\n?>";
        $strlen = file_put_contents($file, $data);
        @chmod($cachefile, 0700);
        return $strlen;
    }

    /***************************************************************************
     * 缩略图
     ***************************************************************************/

    public static function resize($file, $width = 160, $height = 90, $type = 'basic', $sort = true) {

        include_once 'phpThumb/ThumbLib.inc.php';
	    // 判断图片是否存在 --by zemin
        if(!file_exists($file)) {
            if(file_exists(PUBLIC_PTH.$file)) {
                $file = PUBLIC_PTH.$file;
            } else {
                return $file;
            }
        }

        $path = str_replace(UP_PTH, '', $file);
        $dir = dirname($path);
        //self::createFolder(PUBLIC_PTH."thumb/{$width}_{$height}/{$dir}/");
        if (is_string($sort)) {
            $target = $sort;
        } else {
            if ($sort) {
                self::createFolder(THUMB_PTH . "{$width}_{$height}/{$dir}/");
                $target = THUMB_PTH . "{$width}_{$height}/{$path}";
            } else {
                self::createFolder(THUMB_PTH . "{$dir}/");
                $target = THUMB_PTH . "{$path}";
            }
        }

        if (file_exists($target)) {
            return $target;
        }

        $thumb = \PhpThumbFactory::create($file);
        switch ($type) {
            case 'adaptive': // 缩小至合适大小、截取
                $thumb->adaptiveResize($width, $height);
                break;
            default: //缩小，保持高宽比
                $thumb->resize($width, $height);
                break;
        }

        $thumb->save($target, null);
        return $target;
        //$thumb->show();
    }

    public static function crop($file, $startX = 0, $startY = 0, $cropWidth = 100, $cropHeight = 100, $sort = false) {
        include_once 'phpThumb/ThumbLib.inc.php';

        $path = str_replace(PUBLIC_PTH, '', $file);
        $dir = dirname($path);

        $thumb = \PhpThumbFactory::create($file);
        $thumb->crop($startX, $startY, $cropWidth, $cropHeight);
        if (is_string($sort)) {
            $target = $sort;
        } else {
            if ($sort) {
                self::createFolder(THUMB_PTH."{$width}_{$height}/{$dir}/");
                $target = THUMB_PTH."{$width}_{$height}/{$path}";
            } else {
                self::createFolder(THUMB_PTH."{$dir}/");
                $target = THUMB_PTH."{$path}";
            }
        }
        $thumb->save($target, null);
        return $target;
    }
}

// 测试
//header( 'Content-type:text/html; charset=utf-8');
//File::createFolder('E:/Works/xampp/htdocs/xier/home/news/');
?>