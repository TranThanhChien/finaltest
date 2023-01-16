<?php
include '../controller/common.php';
include '../common/db.php'; 
include '../model/teacher.php';
include '../common/define.php';

function deleteDir($dirPath) {
    if (!is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
if(isset($_GET["delete_teacher"])) {
    $id = $_GET["delete_teacher"];
    delete_teacher($id);
    $dirname = "../../assets/avatar/{$id}";
    deleteDir($dirname);
    header('Location: ./teacher_search.php');
}