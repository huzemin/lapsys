<?php
// IPB内核上传类，使用方法：http://www.21andy.com/blog/20080205/824.html
/*
+--------------------------------------------------------------------------
|   Invision Power Board
|   =============================================
|   by Matthew Mecham
|   (c) 2001 - 2006 Invision Power Services, Inc.
|   http://www.invisionpower.com
|   =============================================
|   Web: http://www.invisionboard.com
|   Licence Info: http://www.invisionboard.com/?license
+---------------------------------------------------------------------------
|   > $Date: 2005-10-10 14:03:20 +0100(Mon, 10 Oct 2005) $
|   > $Revision: 22 $
|   > $Author: matt $
+---------------------------------------------------------------------------
|
|   > UPLOAD handling methods(KERNEL)
|   > Module written by Matt Mecham
|   > Date started: 15th March 2004
|
|	> Module Version Number: 1.0.0
+--------------------------------------------------------------------------
| ERRORS:
| 1: No upload
| 2: Not valid upload type
| 3: Upload exceeds $max_file_size
| 4: Could not move uploaded file, upload deleted
| 5: File pretending to be an image but isn't(poss XSS attack)
+--------------------------------------------------------------------------
*/

/**
 * IPS Kernel Pages: Upload
 *
 * This class contains all generic functions to handle
 * the parsing of $_FILE data.
 *
 * Example Usage:
 * <code>
 * $upload = new Upload();
 * $upload->out_file_dir     = './uploads';
 * $upload->max_file_size    = '10000000';
 * $upload->make_script_safe = 1;
 * $upload->allowed_file_ext = array('gif', 'jpg', 'jpeg', 'png');
 * $upload->upload_procezss();
 *
 * if($upload->error_no)
 * {
 *      switch($upload->error_no)
 *      {
 *          case 1:
 *              // No upload
 *              print 'No upload'; exit();
 *          case 2:
 *          case 5:
 *              // Invalid file ext
 *               print 'Invalid File Extension'; exit();
 *          case 3:
 *              // Too big...
 *               print 'File too big'; exit();
 *         case 4:
 *              // Cannot move uploaded file
 *               print 'Move failed'; exit();
 *      }
 *  }
 * print $upload->saved_upload_name . ' uploaded!';
 * </code>
 * ERRORS:
 * 1: No upload
 * 2: Not valid upload type
 * 3: Upload exceeds $max_file_size
 * 4: Could not move uploaded file, upload deleted
 * 5: File pretending to be an image but isn't(poss XSS attack)
 *
 * @package        IPS_KERNEL
 * @author        Matt Mecham
 * @copyright    Invision Power Services, Inc.
 * @version        2.1
 */

/**
 *
 */

/**
 * Upload Class
 *
 * Methods and functions for handling file uploads
 *
 * @package    IPS_KERNEL
 * @author   Matt Mecham
 * @version    2.1
 */
namespace Lib;

class Upload {
    /**
     * Name of upload form field
     *
     * @public string
     */
    public $upload_form_field = 'FILE_UPLOAD';

    /**
     * Out filename *without* extension
     * (Leave blank to retain user filename)
     *
     * @public string
     */
    public $out_file_name = '';

    /**
     * Out dir(./upload) - no trailing slash
     *
     * @public string
     */
    public $out_file_dir = './';
    public $auto_date_dir = true;

    /**
     * maximum file size of this upload
     *
     * @public integer
     */
    public $max_file_size = 2097152;

    /**
     * Forces PHP, CGI, etc to text
     *
     * @public integer
     */
    public $make_script_safe = 1;

    /**
     * Force non-img file extenstion(leave blank if not) (ex: 'ibf' makes upload.doc => upload.ibf)
     *
     * @public string
     */
    public $force_data_ext = '';

    /**
     * Allowed file extensions array('gif', 'jpg', 'jpeg'..)
     *
     * @public array
     */
    public $allowed_file_ext = array('gif', 'jpg', 'jpeg', 'png');

    /**
     * Array of IMAGE file extensions
     *
     * @public array
     */
    public $image_ext = array('gif', 'jpeg', 'jpg', 'jpe', 'png');

    /**
     * Check to make sure an image is an image
     *
     * @public boolean flag
     */
    public $image_check = 1;

    /**
     * Returns current file extension
     *
     * @public string
     */
    public $file_extension = '';

    /**
     * If force_data_ext == 1, this will return the 'real' extension
     * and $file_extension will return the 'force_data_ext'
     *
     * @public string
     */
    public $real_file_extension = '';

    /**
     * Returns error number
     *
     * @public integer
     */
    public $error_no = 0;

    /**
     * Returns if upload is img or not
     *
     * @public integer
     */
    public $is_image = 0;

    /**
     * Returns file name as was uploaded by user
     *
     * @public string
     */
    public $original_file_name = '';

    /**
     * Returns final file name as is saved on disk. (no path info)
     *
     * @public string
     */
    public $parsed_file_name = '';

    /**
     * Returns final file name with path info
     *
     * @public string
     */
    public $saved_upload_name = '';

    /*-------------------------------------------------------------------------*/
    // CONSTRUCTOR
    /*-------------------------------------------------------------------------*/

    function Upload($setting = array()) {
        $this->__construct($dir);
    }

    function __construct($setting = array()) {
        if (!empty($setting)) {
            foreach ($setting as $field => $val) {
                switch ($field) {
                    case 'upload_form_field':
                        $this->upload_form_field = $val;
                        break;
                    case 'max_file_size':
                        $this->max_file_size = $val;
                        break;
                    case 'out_file_dir':
                        $this->set_out_file_dir($val);
                        break;
                    case 'auto_date_dir':
                        $this->auto_date_dir = $val;
                        break;
                    case 'allowed_file_ext':
                        $this->allowed_file_ext = $val;
                        break;

                }
            }

        }
    }


    /*-------------------------------------------------------------------------*/
    // PROCESS THE UPLOAD
    /*-------------------------------------------------------------------------*/

    /**
     * Processes the upload
     *
     */

    function upload_process() {
        $this->_clean_paths();

        //-------------------------------------------------
        // Check for getimagesize
        //-------------------------------------------------

        if (!function_exists('getimagesize')) {
            $this->image_check = 0;
        }

        $arr = array();
        if (is_array($_FILES[$this->upload_form_field]['name'])) {
            $arr = $_FILES[$this->upload_form_field];
        } else {
            $arr = array(
                'error' => array($_FILES[$this->upload_form_field]['error']),
                'name' => array($_FILES[$this->upload_form_field]['name']),
                'size' => array($_FILES[$this->upload_form_field]['size']),
                'tmp_name' => array($_FILES[$this->upload_form_field]['tmp_name']),
                'type' => array($_FILES[$this->upload_form_field]['type']),
            );
        }

        $date = date('Ymd_His');
        $succ = array();
        foreach ($arr['name'] as $key => $name) {

            //-------------------------------------------------
            // Set up some variables to stop carpals developing
            //-------------------------------------------------

            $FILE_NAME = isset($name) ? $name : '';
            $FILE_SIZE = isset($arr['size'][$key]) ? $arr['size'][$key] : '';
            $FILE_TYPE = isset($arr['type'][$key]) ? $arr['type'][$key] : '';

            //-------------------------------------------------
            // Naughty Opera adds the filename on the end of the
            // mime type - we don't want this.
            //-------------------------------------------------

            $FILE_TYPE = preg_replace('/^(.+?);.*$/', '\\1', $FILE_TYPE);

            //-------------------------------------------------
            // Naughty Mozilla likes to use "none" to indicate an empty upload field.
            // I love universal languages that aren't universal.
            //-------------------------------------------------

            if (!isset($name)
                or $name == ''
                or !$name
                or !$arr['size'][$key]
                or ($name == 'none')
            ) {
                $this->error_no = 1;
                continue;
            }

            if (!is_uploaded_file($arr['tmp_name'][$key])) {
                $this->error_no = 1;
                continue;
            }

            //-------------------------------------------------
            // De we have allowed file_extensions?
            //-------------------------------------------------

            if (!is_array($this->allowed_file_ext) or !count($this->allowed_file_ext)) {
                $this->error_no = 2;
                continue;
            }

            //-------------------------------------------------
            // Get file extension
            //-------------------------------------------------

            $this->file_extension = $this->_get_file_extension($FILE_NAME);

            if (!$this->file_extension) {
                $this->error_no = 2;
                continue;
            }

            $this->real_file_extension = $this->file_extension;

            //-------------------------------------------------
            // Valid extension?
            //-------------------------------------------------

            if (!in_array($this->file_extension, $this->allowed_file_ext)) {
                $this->error_no = 2;
                continue;
            }

            //-------------------------------------------------
            // Check the file size
            //-------------------------------------------------

            if (($this->max_file_size) and ($FILE_SIZE > $this->max_file_size)) {
                $this->error_no = 3;
                continue;
            }

            //-------------------------------------------------
            // Make the uploaded file safe
            //-------------------------------------------------

            $FILE_NAME = preg_replace('/[^\w\.]/', '_', $FILE_NAME);

            $this->original_file_name = $FILE_NAME;

            //-------------------------------------------------
            // Convert file name?
            // In any case, file name is WITHOUT extension
            //-------------------------------------------------

            if ($this->out_file_name) {
                $this->parsed_file_name = $this->out_file_name;
            } else {
                //$this->parsed_file_name = str_replace('.'.$this->file_extension, '', $FILE_NAME);
                $this->parsed_file_name = $date . '_' . ($key + 1);
            }

            //-------------------------------------------------
            // Make safe?
            //-------------------------------------------------

            $renamed = 0;

            if ($this->make_script_safe) {
                if (preg_match('/\.(cgi|pl|js|asp|php|html|htm|jsp|jar)(\.|$)/i', $FILE_NAME)) {
                    $FILE_TYPE = 'text/plain';
                    $this->file_extension = 'txt';
                    $this->parsed_file_name = preg_replace('/\.(cgi|pl|js|asp|php|html|htm|jsp|jar)(\.|$)/i', '$2', $this->parsed_file_name);

                    $renamed = 1;
                }
            }

            //-------------------------------------------------
            // Is it an image?
            //-------------------------------------------------

            if (is_array($this->image_ext) and count($this->image_ext)) {
                if (in_array($this->file_extension, $this->image_ext)) {
                    $this->is_image = 1;
                }
            }

            //-------------------------------------------------
            // Add on the extension...
            //-------------------------------------------------

            if ($this->force_data_ext and !$this->is_image) {
                $this->file_extension = str_replace('.', '', $this->force_data_ext);
            }

            $this->parsed_file_name .= '.' . $this->file_extension;

            //-------------------------------------------------
            // Copy the upload to the uploads directory
            // ^^ We need to do this before checking the img
            //    size for the openbasedir restriction peeps
            //    We'll just unlink if it doesn't checkout
            //-------------------------------------------------

            $this->saved_upload_name = $this->out_file_dir . '/' . $this->parsed_file_name;
            $this->saved_upload_name = str_replace('//', '/', $this->saved_upload_name);
            $succ[$key] = $this->saved_upload_name;

            if (file_exists($this->saved_upload_name)) { // 图片已经存在
                $this->error_no = 6;
                continue;
            }

            if (!@move_uploaded_file($arr['tmp_name'][$key], $this->saved_upload_name)) {
                $this->error_no = 4;
                continue;
            } else {
                @chmod($this->saved_upload_name, 0777);
            }

            if (!$renamed) {
                $this->check_xss_infile();

                if ($this->error_no) {
                    continue;
                }
            }

            //-------------------------------------------------
            // Is it an image?
            //-------------------------------------------------

            if ($this->is_image) {
                //-------------------------------------------------
                // Are we making sure its an image?
                //-------------------------------------------------

                if ($this->image_check) {
                    $img_attributes = @getimagesize($this->saved_upload_name);

                    if (!is_array($img_attributes) or !count($img_attributes)) {
                        // Unlink the file first
                        @unlink($this->saved_upload_name);
                        $this->error_no = 5;
                        continue;
                    } elseif (!$img_attributes[2]) {
                        // Unlink the file first
                        @unlink($this->saved_upload_name);
                        $this->error_no = 5;
                        continue;
                    } elseif ($img_attributes[2] == 1 AND ($this->file_extension == 'jpg' OR $this->file_extension == 'jpeg')) {
                        // Potential XSS attack with a fake GIF header in a JPEG
                        @unlink($this->saved_upload_name);
                        $this->error_no = 5;
                        continue;
                    }
                }
            }

            //-------------------------------------------------
            // If filesize and $_FILES['size'] don't match then
            // either file is corrupt, or there was funny
            // business between when it hit tmp and was moved
            //-------------------------------------------------

            if (filesize($this->saved_upload_name) != $arr['size'][$key]) {
                @unlink($this->saved_upload_name);

                $this->error_no = 1;
                continue;
            }
        }

        return $succ;
    }


    /*-------------------------------------------------------------------------*/
    // INTERNAL: Check for XSS inside file
    /*-------------------------------------------------------------------------*/

    /**
     * Checks for XSS inside file.  If found, sets error_no to 5 and returns
     *
     * @param void
     */

    function check_xss_infile() {
        // HTML added inside an inline file is not good in IE...

        $fh = fopen($this->saved_upload_name, 'rb');

        $file_check = fread($fh, 512);

        fclose($fh);

        if (!$file_check) {
            @unlink($this->saved_upload_name);
            $this->error_no = 5;
            return;
        } # Thanks to Nicolas Grekas from comments at www.splitbrain.org for helping to identify all vulnerable HTML tags

        else if (preg_match('#<script|<html|<head|<title|<body|<pre|<table|<a\s+href|<img|<plaintext#si', $file_check)) {
            @unlink($this->saved_upload_name);
            $this->error_no = 5;
            return;
        }
    }

    /*-------------------------------------------------------------------------*/
    // INTERNAL: Get file extension
    /*-------------------------------------------------------------------------*/

    /**
     * Returns the file extension of the current filename
     *
     * @param string Filename
     */

    function _get_file_extension($file) {
        return strtolower(str_replace('.', '', substr($file, strrpos($file, '.'))));
    }

    /*-------------------------------------------------------------------------*/
    // INTERNAL: Clean paths
    /*-------------------------------------------------------------------------*/

    /**
     * Trims off trailing slashes
     *
     */

    function _clean_paths() {
        $this->out_file_dir = preg_replace('#/$#', '', $this->out_file_dir);
    }

    function set_out_file_dir($base_dir) {
        $this->out_file_dir = $base_dir;
        if ($this->auto_date_dir) {
            $this->out_file_dir .= '/' . date('Ym') . '/';
        }
        $this->out_file_dir = str_replace('//', '/', $this->out_file_dir);
        if ($this->out_file_dir != './') {
            File::createFolder($this->out_file_dir);
        }
    }
}

?>