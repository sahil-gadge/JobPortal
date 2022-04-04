session_start();
  if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $password=$_POST['password'];

    $query="SELECT * FROM users WHERE `email`='$email' AND `password` = '$password'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['email'] = $login_user; //Initializing Session 
        header("location: index.php"); // Redirecting To Other page
    }else
    {
        $error = "Incorrect emailid or password";
    }
}