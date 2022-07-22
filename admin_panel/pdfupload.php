<?php
include 'config.php';
if(isset($_POST['submit'])){
    $target_dir = "upload_files/";
    $target_dir2 = "upload_images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $target_file2 = $target_dir2 . basename($_FILES["fileimg"]["name"]);
    $uplaodOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imgFileType = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["file"]["tmp_name"],$target_file) && move_uploaded_file($_FILES["fileimg"]["tmp_name"],$target_file2)){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $sql = "insert into project_details_final(project_title,project_description,project_pdf_path,project_img_path) values('$title','$description','$target_file','$target_file2')";
        $query=mysqli_query($con,$sql);

        if($query){
            header('localtion:forms.php');
            echo "Submitted Successfully!!!!";
        }
        else{
            echo "Please try again..";
        }
    }
}

