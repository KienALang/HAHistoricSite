<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/16/2018
 * Time: 17:19
 */

class File_Model
{
    function __construct()
    {
    }

    function upload($fileTemp, $targetDirectory) # $fileTemp is the file is kept in the temp folder at the Server.
    {
        return move_uploaded_file($fileTemp, $targetDirectory);
    }

    function remove($targetDirectory)
    {
        if ($targetDirectory != null) {
            return unlink($targetDirectory);
        }
    }


}