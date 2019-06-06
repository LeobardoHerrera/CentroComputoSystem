<?php
$matricula=trim($_POST["mat"]).'.jpg';
if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")) {
        //cambiar permisos y luego agregar variable 
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "../images/".$matricula)) {
            // chmod("../images/".$matricula,0777);
            //more code here...
            echo "../images/".$matricula;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
} else {
    echo 0;
}