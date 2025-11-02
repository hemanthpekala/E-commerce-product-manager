<?php
require_once "db.php";

// --- Task 4: Role-Based Access Control ---
// If user is not logged in or is not an 'admin', block access.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'admin'){
    header("location: index.php"); // Redirect to dashboard
    exit;
}

$name = $description = $price = "";
$name_err = $price_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // --- Task 4: Server-Side Validation ---
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a product name.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter a price.";
    } elseif(!is_numeric($_POST["price"])){
        $price_err = "Price must be a number.";
    } else {
        $price = trim($_POST["price"]);
    }
    
    $description = trim($_POST["description"]); // Description is optional
    
    if(empty($name_err) && empty($price_err)){
        // --- Task 4: Prepared Statement ---
        $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
        
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ssd", $param_name, $param_desc, $param_price);
            
            $param_name = $name;
            $param_desc = $description;
            $param_price = $price;
            
            if($stmt->execute()){
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again.";
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
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2>Add New Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" required>
                                <span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>" required>
                                <span class="invalid-feedback"><?php echo $price_err; ?></span>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Add Product">
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>