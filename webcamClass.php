<?php
require_once( dirname( __FILE__ ) . '/connectionClass.php' );
include "include/session.php";
class webcamClass extends connectionClass{
    private $imageFolder="images/avatars/";
    
    //This function will create a new name for every image captured using the current data and time.
    private function getNameWithPath(){
        $name = $this->imageFolder.date('YmdHis').".jpg";
        return $name;
    }
    
    //function will get the image data and save it to the provided path with the name and save it to the database
    public function showImage(){
        $file = file_put_contents( $this->getNameWithPath(), file_get_contents('php://input') );
        if(!$file){
            return "ERROR: Failed to write data to ".$this->getNameWithPath().", check permissions\n";
        }
        else
        {
            $this->saveImageToDatabase($this->getNameWithPath());         // this line is for saveing image to database
            return $this->getNameWithPath();
        }
        
    }
    
 
    
     public function saveImageToDatabase($imageurl){
        $image=$imageurl;
        if($image){
			
			$_SESSION['avatar']=$image;
			
        }
    }    
}
