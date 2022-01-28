<?php
namespace App\Http\traits;

trait photos{
    public function uploadPhoto($image,$path)
    {
          //create photo name
          $photoName = uniqid() . '.' . $image->extension(); //exttension method in request class
          $image->move(public_path('/dist/img/'.$path), $photoName); //public_path() absolute path
        return  $photoName ;
    }
    public function deletePhoto($path)
    {
        if(file_exists($path)){
            unlink($path);
            return true ;
        }
        return false ;
    }
}
