<?php

include 'config.php';

$id = $_GET['id'];

$res=mysqli_query($con,"SELECT * FROM project_details_final where id=$id");
while($row=mysqli_fetch_array($res)){
    $img=$row["project_img_path"];
    $pdf=$row["project_pdf_path"];
}
unlink($img);
unlink($pdf);


$q = " DELETE FROM `project_details_final` WHERE id = $id ";

mysqli_query($con,$q);

header('location: table.php');
