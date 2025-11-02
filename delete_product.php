<?php
require_once "db.php";

// --- Task 4: Role-Based Access Control ---
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'admin'){
    header("location: index.php");
    exit;
}

if(isset($_GET["id"]) && !empty($_GET["id"])){
    // --- Task 4: Prepared Statement ---
    $sql = "DELETE FROM products WHERE id = ?";
    
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_GET["id"]);
        
        if($stmt->execute()){
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again.";
        }
        $stmt->close();
    }
} else {
    header("location: index.php");
    exit();
}
$conn->close();
?>