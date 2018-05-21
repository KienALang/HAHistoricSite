<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/17/2018
 * Time: 20:40
 */
require_once 'models/file_model.php';

class File_Service
{
    protected $fileModel;

    function __construct()
    {
        $this->fileModel = new File_Model();
    }

    public function upload($file, $fileType)
    {
        $fileName = $file['name'];
        $targetDir = $this->getTargetDir($fileName, $fileType);
        $this->fileModel->upload($file['tmp_name'], $targetDir);
        return $targetDir;
    }

    public function remove($oldFiles)
    {
        foreach ($oldFiles as $path)
            $this->fileModel->remove($path);
    }

    public function validateFile($file, $type)
    {
        $fileSize = $file['size'];

        $maxSize = ($type == 'image') ? 2000000 : (($type == 'pdf') ? 5000000 : -1);
        if ($maxSize > 0 && $maxSize < $fileSize) {
            if ($maxSize == 2000000) {
                return "File hình ảnh vượt kích thước cho phép. Vui lòng chọn file nhỏ hơn 2MB";
            } elseif ($maxSize == 5000000) {
                return "File tài liệu vượt quá kích thước cho phép. Vui lòng chọn file nhỏ hơn 5MB.";
            }
        }
        $fileExtension = $this->getFileExtension($file['name']);
        if ($type === 'image') {
            if (!in_array($fileExtension, ['png', 'jpg', 'jpeg'])) {
                return "File hình ảnh không đúng định dạng. Vui lòng chọn file JPEG hoặc PNG.";
            }
        } elseif ($type === 'pdf') {
            if (!in_array($fileExtension, ['pdf'])) {
                return "File tài liệu không đúng định dạng. Vui lòng chọn file PDF.";
            }
        }

        return null;
    }

    private function getFileExtension($fileName)
    {
        $arrName = explode(".", $fileName);
        return strtolower(end($arrName));
    }

    private function getTargetDir($fileName, $fileType)
    {
        // rename the file
        $arrName = explode(".", $fileName);
        $extension = end($arrName);
        $oldName = str_replace('.' . $extension, "", $fileName);
        $fileName = $oldName . '-' . time() . '.' . $extension;

        // get target by type
        $dir = 'upload/' . $fileType . 's/' . $fileName;
        return $dir;
    }
}