<?php include ("config.php"); 

if(isset($_REQUEST['submit']))
{
    $email=$_REQUEST['username'];
    $password=md5($_REQUEST['password']);

    $sql = "SELECT * from user WHERE password = '$password' AND (email = '$email' OR mobile = '$email' OR username = '$email') AND status = 0";
    $rs = mysqli_query($con, $sql);
    if($sql_ins = mysqli_fetch_array($rs))
    {
        session_start();
        $_SESSION['name'] = $sql_ins['name'];
        $_SESSION['userid'] = $sql_ins['id'];
        $_SESSION['email'] = $sql_ins['email'];
        $_SESSION['username'] = $sql_ins['username'];
        $_SESSION['login'] = "Success";
        $_SESSION['cat'] = $sql_ins['cat'];

        header("Location: index.php");  
        exit();
    }
    else
    {
        ?>
            <script>
                alert("Incorrect Crediantials");
                window.location.href="login.php";
            </script>
        <?php    
    }
}
else
{
    ?>
        <script>
            alert("Login First");
            window.location.href="login.php";
        </script>
    <?php    
}