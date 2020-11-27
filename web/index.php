
<!DOCTYPE html>
<html lang="en">
<head>
      <title>FREE HOST</title>
      <style type="text/css"> 
        body, table { 
          font-family: tahoma; font-size: 14px; 
        } 
          
        ul { 
            list-style: none; line-height: 22px; 
        } 
          
        li.file { 
            color: #2f6d13; background: transparent url("image/file.png") no-repeat left 3px; 
            padding-left: 24px; 
        } 
        
        li.folder { 
            color: #e6981c; background: transparent url("image/folder.png") no-repeat left 3px;
            padding-left: 24px; 
        } 
        
        </style>
   </head>
   <body>
   <form enctype="multipart/form-data" action="test3.php" method="post" >
<input name="MAX_FILE_SIZE" value="100000000" type="hidden" />
<label>فایل پیوست را انتخاب نمایید:</label>
<input type="file" name="UploadedFile" />
<input type="submit" value="آپلود" />
</form>
      <?php 
      
        function getFileList($folderName, $fileType = "") { 
            if (substr($folderName, strlen($folderName) - 1) != "/") { 
                $folderName .= '/'; 
            } 
            
            echo '<h3>List of ' . $fileType . ' files in folder : <span style="color:brown">' . $folderName . '</span></h3>'; 
            
            echo '<ul>'; 
            
            foreach (glob($folderName . '*' . $fileType) as $filename) {
                
                if (is_dir($filename)) {
                    $type = 'folder'; 
                } else { 
                    $type = 'file'; 
                } 
            
                echo '<li class="' . $type . '"><a href="uploads/' . str_replace($folderName, '', $filename) . '" target="_blank" title="'.$type.'">' . str_replace($folderName, '', $filename) . '</a></li>'; 
            } 
            
            echo '</ul>'; 
        } 
        
        
        
            // call the function getFileList('files'); // list all files getFileList('files','.png'); // list only png files 
        getFileList('uploads');
        
        ?> 
   </body>
</html>
 <a href="uploads/" target="_blank" title="دیروز ۱۶:۵۳"></a>