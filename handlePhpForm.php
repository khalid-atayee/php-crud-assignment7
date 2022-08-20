<?php
require '__partials.php';

if(isset($_POST['submit_form'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql_query = "INSERT INTO crudphpassignments7 (first_name,last_name,email,department) values ('$first_name','$last_name','$email','$department')";
    $conn->query($sql_query);
    if(!$conn->error){
       
    }
    else
    {
        die('something went wrong becasue of this error '.$conn->error);
    }
    header('location:index.php');
    
}


if(isset($_POST['edit_form'])){
    // header('location:test.php');
    $id = $_POST['hidden_id'];
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql_query = "UPDATE crudphpassignments7 SET first_name='$first_name',
    last_name='$last_name',
    email='$email',
    department='$department' WHERE id=$id";
    $result = $conn->query($sql_query);
    if($result){
        header('location:index.php');
    }

    else
    {
        echo $conn->error;
    }


}




?>