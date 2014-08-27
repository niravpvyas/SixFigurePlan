<?php
/**
 *  check record is exists or not
 **/
function checkExists($selectField, $matchField, $matchFieldValue, $existsIdValue = 1, $table)
{
    $editTimeCheck = "";
    if($existsIdValue > 0)
    {
        $editTimeCheck = $selectField ." != ".$existsIdValue. " AND ";
    }
   
    $exists_check = mysql_query(" SELECT `$selectField` FROM `$table` WHERE $editTimeCheck `$matchField`='".$matchFieldValue."' ");
    return mysql_num_rows($exists_check);
}

/**
 *  get field value from table which is active
 **/
function getValue($selectField, $matchField, $matchFieldValue, $table)
{
    $selectedFieldValue = "";
    $selectQuery = mysql_query(" SELECT `$selectField` FROM `$table` WHERE $matchField = '".$matchFieldValue."' LIMIT 1 ");
    if (mysql_num_rows($selectQuery) > 0)
    {
        $selectedFieldValue = mysql_fetch_object($selectQuery);
        $selectedFieldValue = $selectedFieldValue->$selectField;
    }
    return $selectedFieldValue;
}

function setImage($fieldName, $imageName, $imageNameNew, $imagePath, $table)
{   
    //$originalImage=$imagePath.$_FILES[$fieldName]['name'];//Original File
    $img = explode('.', $_FILES[$fieldName]['name']);
    $extension = strtolower($img[1]);
    $image_filePath=$_FILES[$fieldName]['tmp_name'];

    /////
    $junkImageName = "";
    $selectJunkImage = mysql_query(" SELECT `image_name` FROM $table WHERE `id` =".$imageNameNew);
    if(mysql_num_rows($selectJunkImage) > 0)
    {
        while($rowJunkImage = mysql_fetch_object($selectJunkImage))
        {
            $junkImageName = $rowJunkImage->image_name;
        }
    }
    ### below code is for create thumb image - start ###
    list($gotwidth, $gotheight, $gottype, $gotattr)= getimagesize($image_filePath);//Find the height and width of the image
    if($extension=="jpg" || $extension=="jpeg" )
    {
        $src = imagecreatefromjpeg($_FILES[$fieldName]['tmp_name']);
    }
    else if($extension=="png")
    {
        $src = imagecreatefrompng($_FILES[$fieldName]['tmp_name']);
    }
    else if($extension=="gif")
    {
        $src = imagecreatefromgif($_FILES[$fieldName]['tmp_name']);
    }
    else
    {
        $errorBlock .= "<li>Image extention must be in jpg, jpeg, png or gif.</li>";
    }
    
    list($width,$height)=getimagesize($_FILES[$fieldName]['tmp_name']);
    $imageSizeArray = array(82);
    if(count($imageSizeArray) > 0)
    {
        for($i=0; $i<=count($imageSizeArray); $i++)
        {
            $imageSize = $imageSizeArray[$i];
            $img_fileName=$imageSize.'_'.$imageNameNew.'.'.$img[1];
            $img_thumb = $imagePath . $img_fileName;
            
            if (file_exists($imagePath.$imageSize.'_'.$junkImageName))
            {
                unlink($imagePath.$imageSize.'_'.$junkImageName);
            }
            
            if($gotwidth>=$imageSize)//Check the image is small that 124px
            {
                $newwidth=$imageSize;//if bigger set it to 124
            }
            else
            {
                $newwidth=$gotwidth;//if small let it be original
            }
            $newheight=round(($gotheight*$newwidth)/$gotwidth);//Find the new height
            $tmp=imagecreatetruecolor($newwidth,$newheight);//Creating thumbnail
            imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
            imagejpeg($tmp,$img_thumb,100);//Create thumbnail image
        }
    }
    ### below code is for create thumb image - start ###

    if (file_exists($imagePath.$junkImageName))
    {
        unlink($imagePath.$junkImageName);
    }
    move_uploaded_file($_FILES[$fieldName]["tmp_name"],$imagePath.$imageNameNew.".".$extension);
    mysql_query(" UPDATE $table SET $fieldName = '".$imageNameNew.".".$extension."' WHERE `id` = ".$imageNameNew );
    return $errorBlock;
}
?>
