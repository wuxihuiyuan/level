<?php /*

*/
class upload
{
    var $saveName; // 保存名
    var $savePath; // 保存路径
    var $fileFormat = array('gif', 'jpg', 'png', 'application/octet-stream'); // 文件格式&MIME限定
    var $overwrite = 0; // 覆盖模式
    var $maxSize = 1048576; // 文件最大字节
    var $ext; // 文件扩展名
    var $thumb = 0; // 是否生成缩略图
    var $thumbWidth = 130; // 缩略图宽
    var $thumbHeight = 130; // 缩略图高
    var $thumbPrefix = "thumb_"; // 缩略图前缀
    var $errno; // 错误代号
    var $returnArray = array(); // 所有文件的返回信息
    var $returninfo = array(); // 每个文件返回信息


    //构造函数
    // @param savePath 文件保存路径
    // @param fileFormat 文件格式限制数组
    // @param maxSize 文件最大尺寸
    // @param overwriet 是否覆盖 1 允许覆盖 0 禁止覆盖

    function upload($savePath, $fileFormat = '', $maxSize = 0, $overwrite = 0 , $fileInput = 'imgFile' , $changeName=1){
        $this->setSavepath($savePath);
		$this->makeDirectory($savePath);//创建上传目录
        $this->setFileformat($fileFormat);
        $this->setMaxsize($maxSize);
        $this->setOverwrite($overwrite);
        $this->setThumb($this->thumb, $this->thumbWidth, $this->thumbHeight);
        $this->errno = 0;
		$this->run($fileInput,$changeName);
    }

    // 上传
    function run($fileInput, $changeName = 1)
    {
		if($_FILES[$fileInput]['error']==4){
		 $this->errno = 4;
		 return false;
		}
        if (isset($_FILES[$fileInput])) {
            $fileArr = $_FILES[$fileInput];
            if (is_array($fileArr['name'])) { //上传同文件域名称多个文件
                for ($i = 0; $i < count($fileArr['name']); $i++) {
                    $ar['tmp_name'] = $fileArr['tmp_name'][$i];
                    $ar['name'] = $fileArr['name'][$i];
                    $ar['type'] = $fileArr['type'][$i];
                    $ar['size'] = $fileArr['size'][$i];
                    $ar['error'] = $fileArr['error'][$i];
                    $this->getExt($ar['name']); //取得扩展名，赋给$this->ext，下次循环会更新
                    $this->setSavename($changeName == 1 ? '' : $ar['name']); //设置保存文件名
                    if ($this->copyfile($ar)) {
                        $this->returnArray[] = $this->returninfo;
                    } else {
                        $this->returninfo['error'] = $this->errmsg();
						if($this->returninfo['error']==1) $this->returnArray[] = $this->returninfo;
                    }
                }
                return $this->errno ? false : true;
            } else { //上传单个文件
                $this->getExt($fileArr['name']); //取得扩展名
                $this->setSavename($changeName == 1 ? '' : $fileArr['name']); //设置保存文件名
                if ($this->copyfile($fileArr)) {
                    $this->returnArray[] = $this->returninfo;
                } else {
                    $this->returninfo['error'] = $this->errmsg();
                    if($this->returninfo['error']==1) $this->returnArray[] = $this->returninfo;
                }
                return $this->errno ? false : true;
            }
            return false;
        } else {
            $this->errno = 10;
            return false;
        }
    }


    // 单个文件上传
    function copyfile($fileArray)
    {
        $this->returninfo = array();
        // 返回信息
        $this->returninfo['name'] = $fileArray['name'];
        $this->returninfo['saveName'] = $this->saveName;
        $this->returninfo['size'] = number_format(($fileArray['size']) / 1024, 0, '.',
            ' '); //以KB为单位
        $this->returninfo['type'] = $fileArray['type'];
        // 检查文件格式
        if (!$this->validateFormat()) {
            $this->errno = 11;
            return false;
        }
        // 检查目录是否可写
        if (!@is_writable($this->savePath)) {
            $this->errno = 12;
            return false;
        }
        // 如果不允许覆盖，检查文件是否已经存在
        if ($this->overwrite == 0 && @file_exists($this->savePath . $fileArray['name'])) {
            $this->errno = 13;
            return false;
        }
        // 如果有大小限制，检查文件是否超过限制
        if ($this->maxSize != 0) {
            if ($fileArray["size"] > $this->maxSize) {
                $this->errno = 14;
                return false;
            }
        }
        // 文件上传
        if (!move_uploaded_file($fileArray["tmp_name"], $this->savePath . $this->
            saveName)) {
            $this->errno = $fileArray["error"];

            return false;
        } elseif ($this->thumb) { //创建缩略图
            $CreateFunction = "imagecreatefrom" . ($this->ext == 'jpg' ? 'jpeg' : $this->
                ext);
            $SaveFunction = "image" . ($this->ext == 'jpg' ? 'jpeg' : $this->ext);
            if (strtolower($CreateFunction) == "imagecreatefromgif" && !function_exists("imagecreatefromgif")) {
                $this->errno = 16;
                return false;
            } elseif (strtolower($CreateFunction) == "imagecreatefromjpeg" && !
            function_exists("imagecreatefromjpeg")) {
                $this->errno = 17;
                return false;
            } elseif (!function_exists($CreateFunction)) {
                $this->errno = 18;
                return false;
            }

            $Original = @$CreateFunction($this->savePath . $this->saveName);
            if (!$Original) {
                $this->errno = 19;
                return false;
            }
            $originalHeight = ImageSY($Original);
            $originalWidth = ImageSX($Original);
            $this->returninfo['originalHeight'] = $originalHeight;
            $this->returninfo['originalWidth'] = $originalWidth;
            if (($originalHeight < $this->thumbHeight && $originalWidth < $this->thumbWidth)) {
                // 如果比期望的缩略图小，那只Copy
                copy($this->savePath . $this->saveName, $this->savePath . $this->thumbPrefix . $this->
                    saveName);
            } else {
                if ($originalWidth > $this->thumbWidth) { // 宽 > 设定宽度
                    $thumbWidth = $this->thumbWidth;
                    $thumbHeight = $this->thumbWidth * ($originalHeight / $originalWidth);
                    if ($thumbHeight > $this->thumbHeight) { //高 > 设定高度
                        $thumbWidth = $this->thumbHeight * ($thumbWidth / $thumbHeight);
                        $thumbHeight = $this->thumbHeight;
                    }
                } elseif ($originalHeight > $this->thumbHeight) { //高 > 设定高度
                    $thumbHeight = $this->thumbHeight;
                    $thumbWidth = $this->thumbHeight * ($originalWidth / $originalHeight);
                    if ($thumbWidth > $this->thumbWidth) { //宽 > 设定宽度
                        $thumbHeight = $this->thumbWidth * ($thumbHeight / $thumbWidth);
                        $thumbWidth = $this->thumbWidth;
                    }
                }
                if ($thumbWidth == 0)
                    $thumbWidth = 1;
                if ($thumbHeight == 0)
                    $thumbHeight = 1;
                $createdThumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
                if (!$createdThumb) {
                    $this->errno = 20;
                    return false;
                }
                if (!imagecopyresampled($createdThumb, $Original, 0, 0, 0, 0, $thumbWidth, $thumbHeight,
                    $originalWidth, $originalHeight)) {
                    $this->errno = 21;
                    return false;
                }
                if (!$SaveFunction($createdThumb, $this->savePath . $this->thumbPrefix . $this->
                    saveName)) {
                    $this->errno = 22;
                    return false;
                }
            }
			if ($this->delete) $this->del($this->savePath . $this->saveName);
        }
        // 删除临时文件
        if (!@$this->del($fileArray["tmp_name"])) {
            return false;
        }
        return true;
    }

    // 文件格式检查,MIME检测
    function validateFormat()
    {
        if (!is_array($this->fileFormat) || in_array(strtolower($this->ext), $this->
            fileFormat) || in_array(strtolower($this->returninfo['type']), $this->
            fileFormat))
            return true;
        else
            return false;
    }
    //获取文件扩展名
    function getExt($fileName)
    {
        $ext = explode(".", $fileName);
        $ext = $ext[count($ext) - 1];
		$ext = $ext=="jpeg" ? "jpg" : $ext;
        $this->ext = strtolower($ext);
    }

    //设置上传文件的最大字节限制
    // @param $maxSize 文件大小(bytes) 0:表示无限制
    function setMaxsize($maxSize)
    {
        $this->maxSize = $maxSize;
    }
    //设置文件格式限定
    // @param $fileFormat 文件格式数组
    function setFileformat($fileFormat)
    {
        if (is_array($fileFormat)) {
            $this->fileFormat = $fileFormat;
        }
    }

    //设置覆盖模式
    // @param overwrite 覆盖模式 1:允许覆盖 0:禁止覆盖
    function setOverwrite($overwrite)
    {
        $this->overwrite = $overwrite;
    }


    //设置保存路径
    // @param $savePath 文件保存路径：以 "/" 结尾，若没有 "/"，则补上
    function setSavepath($savePath)
    {
        $this->savePath = substr(str_replace("\\", "/", $savePath), -1) == "/" ? $savePath :
            $savePath . "/";
    }

    //设置缩略图
    // @param $thumb = 1 产生缩略图 $thumbWidth,$thumbHeight 是缩略图的宽和高
    function setThumb($thumb, $thumbPrefix, $thumbWidth = 0, $thumbHeight = 0)
    {
        $this->thumb = $thumb;
        $this->thumbPrefix = $thumbPrefix;
        if ($thumbWidth)
            $this->thumbWidth = $thumbWidth;
        if ($thumbHeight)
            $this->thumbHeight = $thumbHeight;
    }

    //设置文件保存名
    // @saveName 保存名，如果为空，则系统自动生成一个随机的文件名
    function setSavename($saveName)
    {
        if ($saveName == '') { // 如果未设置文件名，则生成一个随机文件名
            $name = date('YmdHis') . rand(100, 999) . '.' . $this->ext;
        } else {
            $name = $saveName;
        }
        $this->saveName = $name;
    }

    //删除文件
    // @param $file 所要删除的文件名
    function del($fileName)
    {
        if (!@unlink($fileName)) {
            $this->errno = 15;
            return false;
        }
        return true;
    }

    // 返回单个上传文件的信息
    function getInfo()
    {
        return $this->returninfo;
    }


    //返回多个上传文件信息

    function getfile()
    {
        return $this->returnArray;
    }


    // 得到错误信息
    function errmsg()
    {
        $errormsg = array(
								  0 => '1',
								  1 => '上传的文件过大!', 
								  2 => '上传的文件过大!',
								  3 => '文件只有部分被上传!', 
								  4 => '没有提交任何上传信息!', 
								  6 => '创建缩略图失败，您的PHP版本过低!', 
								  7 => '创建缩略图失败，您的PHP版本过低!', 
								  10 => '表单文件域不存在!', 
								  11 => '不允许上传该格式文件!', 
								  12 => '上传目录不存在或不可写!', 
								  13 => '该文件已上传!', 
								  14 => '上传的文件过大!', 
								  15 => '1', 
								  16 => 'Your version of PHP does not appear to have GIF thumbnailing support.',
            17 => 'Your version of PHP does not appear to have JPEG thumbnailing support.',
            18 => 'Your version of PHP does not appear to have pictures thumbnailing support.',
            19 => 'An error occurred while attempting to copy the source image . 
                     Your version of php (' . phpversion() .
            ') may not have this image type support.', 20 =>
            'An error occurred while attempting to create a new image.', 21 =>
            'An error occurred while copying the source image to the thumbnail image.', 22 =>
            'An error occurred while saving the thumbnail image to the filesystem. 
                     Are you sure that PHP has been configured with both read and write access on this folder?', );
        if ($this->errno == 0)
            return false;
        else
            return $errormsg[$this->errno];
    }

    //创建目录

    function makeDirectory($directoryName)
    {

        $temp = $directoryName;

        if (!is_dir($temp)) {
            $oldmask = umask(0);
            if (!mkdir($temp, 0777))
                exit("不能建立目录 $temp");
            umask($oldmask);
        }

        return $temp;
    }

}
?>