<?php
require_once "db.php";
$username = $password = "";
$username_err = $password_err = $register_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // --- Server-side validation (Task 4) ---
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Check for errors before inserting
    if(empty($username_err) && empty($password_err)){
        
        // --- Prepared Statement to prevent SQL Injection (Task 4) ---
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
            
            if($stmt->execute()){
                header("location: login.php");
            } else {
                $register_err = "Username already taken.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Create Account</h2>
                    <?php 
                    if(!empty($register_err)){
                        echo '<div class="alert alert-danger">' . $register_err . '</div>';
                    }        
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                        <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>