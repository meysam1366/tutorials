<?php

class Upload {

    public function MimeType($type)
    {
        $types = finfo_open(FILEINFO_MIME_TYPE);

        return finfo_file($types, $type);

    }

    public function SizeFile($size)
    {
        return @filesize($size);
    }

    public function MoveFile($tmp_name, $dir)
    {
        if(is_uploaded_file($tmp_name)) {
            return move_uploaded_file($tmp_name, $dir);
        }
    }

    public function UploadFile($file, $tmp_name)
    {
        if($this->MimeType($tmp_name) == 'application/zip' || 'text/srt' || 'application/octet-stream') {

            $dir = dirname(__FILE__) . "/img/".rand(1,10).$file;
            return $this->MoveFile($tmp_name, $dir);

        }
    }

}