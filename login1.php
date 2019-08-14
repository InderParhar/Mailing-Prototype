<?php
$error = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $email_error = "Email required";
        $error++;
    }
    if (empty($_POST["password"])) {
        $pwd_error = "Password required";
        $error++;
    } else {
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];

        $_SESSION['username'] = $email;
        $_SESSION['password'] = $password;
        header("Location:index.php");
    }
}
?>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<style>
    table
    {
        border: 1px solid grey;
        border_collapse: collapse;
    }
    th
    {
        border: 1px solid black;
        border_collapse: collapse;

    }
    th,td{
        padding: 20px;
    }
    th{
        text-align: center;
    }
</style>

<!--form structure-->
<form action="" method="post">

    <table width='300' align="center" >
        <tr><th> SIGN IN </th></tr><br><br>
        <tr><td>
                <label> Email </label>
                <br>
                <input type="text"  class="form-control" name="email" placeholder="Enter Email">
                <div><?php
if (isset($email_error)) {
    echo "*" . $email_error;
};
?></div>
                <br><br>
            </td></tr>
        <tr><td>
                <label> Password </label><br>
                <input type="password"  class="form-control" name="password" placeholder="Enter password">
                <span><?php
                    if (isset($email_error)) {
                        echo "*" . $pwd_error;
                    };
?></span>
        <tr><td>
                <input class="btn btn-info" value="Submit" type="Submit" name='Log In'>
                <br><br>
                <button type="reset">Clear </button>
                <br><br>
                <div class="error">  <?php
                    if (isset($error_msg)) {
                        echo "*" . $error_msg;
                    };
?></div>
            </td></tr>
        <br><br>
        </form>
    </table>
