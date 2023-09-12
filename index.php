<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "banners/";
    $targetFile = $targetDir . basename($_FILES["bannerImage"]["name"]);
    $uploadOk = 1;
    
    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size (max 5MB)
    if ($_FILES["bannerImage"]["size"] > 5000000) {
        echo "Sorry, the file is too large.";
        $uploadOk = 0;
    }
    
    // Allow only certain file types
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["bannerImage"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now insert the record into the database
            $imageURL = "banners/" . basename($_FILES["bannerImage"]["name"]);
            $conn = new mysqli("localhost", "username", "password", "ecommerce");
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "INSERT INTO banners (image_url) VALUES ('$imageURL')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Banner uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
