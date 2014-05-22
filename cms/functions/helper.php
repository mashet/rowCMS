<?

function getExtension($str){
	$rVal="";
	$pos=strrpos($str,".");
	// echo "<br />str=".$str.",Pos=".$pos.",Len=".strlen($str)."<br />";
	if($pos!==false)
	{
	$rVal=substr($str,($pos+1));
	}
return $rVal;
}


function createRandomPassword() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double)microtime()*1000000);
	    $i = 0;
		$pass = '' ;
		while ($i <= 7) {
		     $num = rand() % 33;
			 $tmp = substr($chars, $num, 1);
			 $pass = $pass . $tmp;
			 $i++;
		}
	return $pass;
}
    



function p($content, $class = 'test'){
	echo '<p class="' . $class . '">' . $content . '</p>';
}
  
  


function isSelected($Value, $Selected){ // Use for selecting dropdown value, use this instead of selected="selected"  <= echo isSelected(12, $Beds); =>
	if ($Selected == $Value){
		$output = " selected=\"selected\"";
	}
  
  return $output;
}
  
    
	
function resizeImageAllTypes($filename,$max_width,$max_height='',$newfilename="",$withSampling=true){ 
	if($newfilename=="") 
		$newfilename=$filename; 
	// Get new sizes 
	list($width, $height) = getimagesize($filename); 
	
	//-- dont resize if the width of the image is smaller or equal than the new size. 
	if($width<=$max_width) 
		$max_width=$width; 
		
	$percent = $max_width/$width; 
	
	$newwidth = $width * $percent; 
	if($max_height=='') { 
		$newheight = $height * $percent; 
	} else 
		$newheight = $max_height; 
	
	// Load 
	$thumb = imagecreatetruecolor($newwidth, $newheight); 
	$ext = strtolower(getExtension($filename)); 
	
	if($ext=='jpg' || $ext=='jpeg') 
		$source = imagecreatefromjpeg($filename); 
	if($ext=='gif') 
		$source = imagecreatefromgif($filename); 
	if($ext=='png') 
		$source = imagecreatefrompng($filename); 
	
	// Resize 
	if($withSampling) 
		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); 
	else    
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); 
		
	// Output 
	if($ext=='jpg' || $ext=='jpeg') 
		return imagejpeg($thumb,$newfilename); 
	if($ext=='gif') 
		return imagegif($thumb,$newfilename); 
	if($ext=='png') 
		return imagepng($thumb,$newfilename); 
}  

function get_content($url){		
				
				$target_url = $url;
				
				$userAgent = 'IE 7 – Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)';

				// make the cURL request to $target_url
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
				curl_setopt($ch, CURLOPT_URL,$target_url);
				curl_setopt($ch, CURLOPT_FAILONERROR, true);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_AUTOREFERER, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				$html= curl_exec($ch);
				if (!$html) {
					echo "<br />cURL error number:" .curl_errno($ch);
					echo "<br />cURL error:" . curl_error($ch);
					exit;
				}
				
				return $html;
} 
?>