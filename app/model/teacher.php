<?php
// include_once "../../app/common/db.php"; 
$host = "localhost";
$user= "root";
$password="";
$db="qltbb";
$connection= new mysqli($host,$user,$password,$db);

function getAllTeacher($teacherName) {
    global $connection;

    $sql = "SELECT * FROM teachers ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function getTeacherNameByID($id){
    global  $connection;
    
    $sql = "SELECT * FROM teachers WHERE id ='$id'";

    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result, MYSQLI_ASSOC);

    return $row;
}

function search_teachers_by_specialized_and_keyword($specialized, $keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.specialized = '$specialized' 
    AND (teachers.name LIKE '%$keyword%' OR teachers.description LIKE '%$keyword%' OR teachers.degree LIKE '%$keyword%') ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}
function search_teachers_by_specialized($specialized) //READ
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.specialized = '$specialized' ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function search_teachers_by_keyword($keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.name LIKE '%$keyword%' 
            OR teachers.description LIKE '%$keyword%' 
            OR teachers.degree LIKE '%$keyword%' ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}
function delete_teacher($id) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM teachers
            WHERE teachers.id=$id";
    $connection->query($sql);

    return true;
}
function get_teacher_by_id($id)
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.id = $id  LIMIT 1";

    $result = $connection->query($sql);
    $teacher_info = mysqli_fetch_assoc($result);

    return $teacher_info;
}
?>
