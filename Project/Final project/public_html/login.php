<?php
    include 'db_login.php';
    if($conn == false)
        {
            die("Connection Error");
        }
    
    if(isset($_POST['username']) && isset($_POST['password']))
        {
        function validate($data)
            {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
            }
        $username = validate($_POST["username"]);
        $password = validate($_POST["password"]);
        
        if (empty($username)) 
            {
                header("Location: default.php?error=User Name is required");
                exit();
            }
        else if(empty($password))
            {
                header("Location: default.php?error=Password is required");
                exit();
            }
        else
            {
                $sql ="SELECT * 
                FROM users
                WHERE username='$username' AND password=SHA1('$password')";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) === 1) 
                    {
                        $row = mysqli_fetch_assoc($result);

                        if ($row['username'] === $username && $row['password'] === SHA1($password)) 
                            {
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['usertype'] = $row['usertype'];
                                $_SESSION['id'] = $row['id'];
                                header("Location: home.php");
                                exit();
                            }
                        else
                            {
                                header("Location: default.php?error=Incorect User name or password");
                                exit();
                            }
                    }
                else
                    {
                        header("Location: default.php?error=Incorect User name or password");
                        exit(); 
                    }
            }           
        }
    else
        {
            header("Location: default.php");
            exit();
        }
        
/*
        $sql ="SELECT * 
        FROM users
        WHERE username='$username' AND password=SHA1('$password')";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($result);
        if($row["usertype"]=="user")
        {
            $_SESSION["usertype"]=$row["usertype"];
            echo "user";
            echo $_SESSION["usertype"];
        }
        elseif($row["usertype"]=="admin")
        {
            $_SESSION["usertype"]=$row["usertype"];
            echo "admin";
            echo $_SESSION["usertype"];
        }
        else
        {
            echo "username or password was invalid";
            echo '<td><a class="btn btn-primary" action="default.php" role="button">Return</a></td>';
        }
    } */
?>
