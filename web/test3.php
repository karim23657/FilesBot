<?php
$file_name = $_FILES['UploadedFile']['name'];
$target_path = "uploads/".$file_name;
if(move_uploaded_file($_FILES['UploadedFile']['tmp_name'], $target_path)) {
echo "فایل ". $file_name ." با موفقیت آپلود شد";}
else {
echo "متاسفانه مشکلی در حین عملیات آپلود رخ داد،لطفا مجددا امتحان کنید";}
?>
