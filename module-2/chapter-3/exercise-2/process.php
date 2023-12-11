<?php
require_once __DIR__ . "/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addProduct'])) {
        // Process the Add Product form
        $productName = htmlspecialchars($_POST['productName'], ENT_QUOTES, 'UTF-8');
        $productDescription = htmlspecialchars($_POST['productDescription'], ENT_QUOTES, 'UTF-8');
        $productPrice = $_POST['productPrice'];

        if (!empty($productName) && !empty($productDescription) && !empty($productPrice)) {
            addDataToProducts($productName, $productDescription, $productPrice);
        } else {
            echo "Error: Please fill in all the fields for adding a product.";
        }

        header("Location: index.php");
        exit();
    } elseif (isset($_POST['addReview'])) {
        // Process the Add Review form
        $productId = $_POST['productId'];
        $reviewText = htmlspecialchars($_POST['reviewText'], ENT_QUOTES, 'UTF-8');
        $rating = $_POST['rating'];

        if (!empty($productId) && !empty($reviewText) && !empty($rating)) {
            addProductReview($productId, $reviewText, $rating);
        } else {
            echo "Error: Please fill in all the fields for adding a review.";
        }

        header("Location: index.php");
        exit();
    }
}


