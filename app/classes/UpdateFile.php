<?php

namespace App\Classes;

class UpdateFile
{
    protected $filename;
    protected $maxSize = 2097152;

    public function setName($file,$name="")
    {
        if($name === "") {
            $name = pathinfo($file->file->tmp_name, PATHINFO_FILENAME);
        }
        $name = strtolower(str_replace(["_"," "], "-",$name));
        $hash = md5(microtime());
        $ext = pathinfo($file->file->name, PATHINFO_EXTENSION);
        $this->filename = "{$name}-{$hash}.{$ext}";
    }

    public function getName()
    {
        return $this->filename;
    }

    public function checkSize($file)
    {
        return $file->file->size > $this->maxSize ? true : false;
    }

    public function isImage($file)
    {
        $ext = pathinfo($file->file->name, PATHINFO_EXTENSION);
        $validExt = ["jpg", "jpeg", "png", "bmp", "gif"];

        return in_array($ext, $validExt);
    }

    public function move($file, $file_name="")
    {
        $this->setName($file);
        return $this->isImage($file);
    }
}

?>