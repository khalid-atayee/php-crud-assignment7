<?php
require '__partials.php';
// $sql_query = "INSERT INTO crudphpassignments7 (first_name,last_name,email,department) values ('zubair','atayee','khalid@gmail.com','computer science')";
// // var_dump($sql_query);
// $conn->query($sql_query);
// // var_dump($connection);
// if($conn->error){
//     die ('Something went wrong because of this error'. $conn->error);


// }
// {
//     echo "successfully table created ";
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-container">

<?php
if(isset($_GET['delete_id'])){
  $delete_id = $_GET['delete_id'];
  $sql  = "DELETE FROM crudphpassignments7 WHERE id=$delete_id";
  $conn->query($sql);

}

if(isset($_GET['edit_id'])){
    $edit_id = $_GET['edit_id'];
    $sql_query = "SELECT * FROM crudphpassignments7 WHERE id=$edit_id";
    $result = $conn->query($sql_query);
    $data = $result->fetch_assoc();
}

?>

        <div class="form-dev">


            <form action="handlePhpForm.php" method="POST" autocomplete="FALSE" id="submit-form">
                <div class="container-dev">
                    <div class="form-control">
                        <input type="hidden" name="hidden_id" value="<?php echo $data['id']?>">

                        <input type="text" class="input-fields" value="<?php echo isset($data) ? $data['first_name'] : "";  ?>" name="first_name" id="first_name" placeholder="Enter your First Name" required>

                    </div>

                    <div class="form-control">

                        <input type="text" class="input-fields" value="<?php echo isset($data) ? $data['last_name'] : ""   ?>" name="last_name" id="last_name" placeholder="Enter your Last Name" required>

                    </div>

                    <div class="form-control">

                        <input type="text" class="input-fields" value="<?php  echo isset($data)?$data['email']: "" ?>" name="email" id="email" placeholder="Enter your Email" required>

                    </div>

                    <div class="form-control">

                        <input type="text" class="input-fields" value="<?php echo isset($data)?$data['department']: ""?>" name="department" id="department" placeholder="Enter your department" >

                    </div>
                    <div class="form-controle">


                        <button type="submit" name="<?php echo isset($data) ? 'edit_form' : 'submit_form';?>"  class="submit-btn" id="submit">Submit</button>
                        <a href="index.php"  name="submit_form" class="cancel-btn" id="submit">Cancel</a>

                    </div>
                </div>


            </form>
        </div>

        <?php
        $sql_query = "SELECT * FROM crudphpassignments7";
        $data = $conn->query($sql_query);
        $result = $data->fetch_all(MYSQLI_ASSOC);
        // var_dump($result);


        ?>
        
        <div class="table-dev-container">


            <table class="table-class" border style="border-collapse:collapse; ">
                <tr>
                    <th>No</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php
                $count = 1;
                foreach ($result as $record) {

                    echo '
    
                        <tr>
                            <td>' . $count++ . '</td>
                            <td>' . $record['first_name'] . '</td>
                            <td>' . $record['last_name'] . '</td>
                            <td>' . $record['email'] . '</td>
                            <td>' . $record['department'] . '</td>
                            <td><a href = "index.php?edit_id='.$record['id'].'" >Edit</a></td>
                            <td><a href = "index.php?delete_id='.$record['id'].'" >Delete</a></td>
                        </tr>
                    ';
                }

                ?>
            </table>
        </div>

    </div>

</body>

</html>