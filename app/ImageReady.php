<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Image;

class ImageReady extends Model
{

    // IMAGE UPLOAD FUNCTION
	public function imageReadyExtension($recordId, $recordName, $avatar, $directory, $xsWidth, $xsHeight, $smWidth, $smHeight, $mdWidth, $mdHeight)
	{
		$filename = $recordId.'-'.$recordName.'.'.$avatar->getClientOriginalExtension();
	    $filenamexs = 'xs-'.$recordId.'-'.$recordName.'.'.$avatar->getClientOriginalExtension();
	    $filenamesm = 'sm-'.$recordId.'-'.$recordName.'.'.$avatar->getClientOriginalExtension();
	    $filenamemd = 'md-'.$recordId.'-'.$recordName.'.'.$avatar->getClientOriginalExtension();

	    Image::make($avatar)->save(public_path($directory . $filename));
	    
	    // EXTRA SAMLL
	    Image::make($avatar)
	    ->resize($xsWidth, $xsHeight, 
	        function($constraint){
	            $constraint->aspectRatio();
	        })
	    ->resizeCanvas($xsWidth, $xsHeight)
	    ->save(public_path($directory . $filenamexs));
	    
	    // SMALL
	    Image::make($avatar)
	    ->resize($smWidth, $smHeight, 
	        function($constraint){
	            $constraint->aspectRatio();
	        })
	    ->resizeCanvas($smWidth, $smHeight)
	    ->save(public_path($directory . $filenamesm));

	    // MEDIUM
	    Image::make($avatar)
	    ->resize($mdWidth, $mdHeight, 
	        function($constraint){
	            $constraint->aspectRatio();
	        })
	    ->resizeCanvas($mdWidth, $mdHeight)
	    ->save(public_path($directory . $filenamemd));

	    return $filename;
	}
}
