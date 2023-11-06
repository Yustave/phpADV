<?php

namespace App\Classes;

use App\Classes\Session;

class UploadFile{
    
    protected $maxsize = 2410202020;
    protected $path;

    public function setname($file,$name = ""){
        if($name === ""){
            $name = pathinfo($file->file->name,PATHINFO_FILENAME);
        }

        $name = strtolower(str_replace(["","-",","],"_",$name));
        $hash = md5(microtime());
        $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
        return $name . $hash.".".$ext;
    }

    public function checksize($file){
        return $file->file->size > $this->maxsize ? False : true;
    }

    public function isImage($file){
        $ext = pathinfo($file->file->name,PATHINFO_EXTENSION);
        $validExt = ["jpg","jpeg","png","bmp"];

        return in_array($ext, $validExt);
    }

    public function getPath(){
        return  $this->path;
    }

    public function move($file){
        $name = $this->setname($file);

        if($this->isImage($file)){
            if($this->checksize($file)){
                $path = APP_ROOT."\public\assets\uploads/";
                    $this->path = URL_ROOT."assets/uploads/". $name;
                    $file_path = $path . $name;
                    return move_uploaded_file($file->file->tmp_name,$file_path);
            }else{
                Session::flash("error","File size can't be handel");
                Redirect::back();
            }
        }else{
            Session::flash("error","Only Image can be upload");
            Redirect::back();
        }
    }
}

?>