<?php

include("database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
    <h2>Employee Register</h2><br>

    <label>employee id:</label><br>
    <input type="text" name="empid"><br>

    <label>employee first name:</label><br>
    <input type="text" name="fname"><br>

    <label>employee last name:</label><br>
    <input type="text" name="lname"><br>

    <label>employee salary:</label><br>
    <input type="text" name="salary" class="numbers" ><br>

    <label>employee age</label><br>
    <input type= "text" name= "age" class="numbers"  maxlength="2"/><br>

    <input type="submit" name="submit" value="register">
</form>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
   $('.numbers').keyup(function () {
    // Remove non-numeric characters
    this.value = this.value.replace(/[^\d]/g, '');

   


});
</script>
</html>
<?php

if(isset($_POST["submit"])){
   
   
    $id=filter_input(INPUT_POST,"empid",FILTER_VALIDATE_INT);
    $fname=filter_input(INPUT_POST,"fname",FILTER_SANITIZE_SPECIAL_CHARS);
    $lname=filter_input(INPUT_POST,"lname",FILTER_SANITIZE_SPECIAL_CHARS);
    $salary=$_POST["salary"];
    $age=$_POST["age"];

    if(empty($id)){
        echo" fill valid employee id detail";
    }
    elseif(empty($fname)){
        echo" fill first name detail";
    }
    elseif(empty($lname)){
        echo" fill last name detail";
    }
    elseif(empty($salary)){
        echo" fill valid salary";
    }
    elseif(empty($age)){
        echo" fill valid age";
    }
    else{
        

        $sql="INSERT INTO employee(empid,fname,lname) VALUES('$id','$fname','$lname')";
    
        mysqli_query($conn,$sql); 
    
        $sql1="INSERT INTO employee_sal(empid,age,salary) VALUES('$id','$age','$salary')";
       
        mysqli_query($conn,$sql1);
       
        
    }
        
        
        

        mysqli_close($conn);
    
}

?>