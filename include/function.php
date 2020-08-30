<?php
function upload_file($file, $path, $old_path)
{
	$file_name="";
	//echo $old_path;
	//var_dump($_FILES);
	if(isset($_FILES[$file]))
	{
			  $errors= array();

			  $file_name 	= $_FILES[$file]['name'];
			   $file_size 	=$_FILES[$file]['size'];
			  $file_tmp 	=$_FILES[$file]['tmp_name'];
			  $file_type	=$_FILES[$file]['type'];

			  $arr = explode(".",$file_name);
			  $file_ext = strtolower($arr[count($arr)-1]);

			  $expensions= array("jpeg","jpg","png");

			  //
			  if(in_array($file_ext,$expensions)=== false){
				  echo "ext error";//die();
				 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
			  }


			  if($file_size < 10)
				{

				 $errors[]='File is not supported.';
			  }

			  //generate file name with path parameter and current date
			  $file_name= $path.date("Y_m_d_His").".".$file_ext;

			  if(empty($errors)==true){
				 move_uploaded_file($file_tmp,$file_name);
				 //delete old file
				 if(file_exists($old_path)) unlink($old_path);

				 //echo $file_name.": IN file";die();
			  }
				else
				{

//					print_r($errors);die();
					$file_name = null;
					$_SESSION['file_error'] = $errors;
			  }
		   }

		   return $file_name;
}


?>
<?php
function getYouTubeVideoId($url)
{
	//echo $url;
	//$video_id = null;
	$video_id = null;
	$url = parse_url($url);

	if(!isset($url['host']))
	{
		$video_id=null;
	}
	else
	if (strcasecmp($url['host'], 'youtu.be') === 0)
	{
		#### (dontcare)://youtu.be/<video id>
		$video_id = substr($url['path'], 1);
	}
	elseif (strcasecmp($url['host'], 'www.youtube.com') === 0)
	{
		if (isset($url['query']))
		{
			parse_str($url['query'], $url['query']);
			if (isset($url['query']['v']))
			{
				#### (dontcare)://www.youtube.com/(dontcare)?v=<video id>
				$video_id = $url['query']['v'];
			}
		}
		if ($video_id == null)
		{
			$url['path'] = explode('/', substr($url['path'], 1));
			if (in_array($url['path'][0], array('e', 'embed', 'v')))
			{
				#### (dontcare)://www.youtube.com/(whitelist)/<video id>
				$video_id = $url['path'][1];
			}
		}
	}
	return $video_id;
}

?>
