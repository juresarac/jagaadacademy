<?php

function connectToDatabase()
{
    $conn = new mysqli('localhost', 'root', '', 'products');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function createProductsTable($conn)
{
    $createTableQuery = "CREATE TABLE IF NOT EXISTS Products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        price INT NOT NULL
    )";
    if ($conn->query($createTableQuery) === false) {
        handleQueryError($conn);
    }
}

function createReviewsTable($conn)
{
    $createTableQuery = "CREATE TABLE IF NOT EXISTS Reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product_id INT NOT NULL,
        review TEXT NOT NULL,
        rating FLOAT NOT NULL,
        FOREIGN KEY (product_id) REFERENCES Products(id)
    )";
    if ($conn->query($createTableQuery) === false) {
        handleQueryError($conn);
    }
}

function initializeDatabase()
{
    $conn = connectToDatabase();
    createProductsTable($conn);
    createReviewsTable($conn);
    $conn->close();
}

function readFromProducts()
{
    $products = [];
    $conn = connectToDatabase();

    $sql = "SELECT * FROM Products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        handleQueryError($conn);
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
    }

    $stmt->close();
    $conn->close();
    return $products;
}

function addDataToProducts($name, $description, $price)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO Products (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $price);

    if ($stmt->execute() === false) {
        handleQueryError($conn);
    }

    $stmt->close();
    $conn->close();
}

function readFromReviews(int $id)
{
    $reviews = [];
    $conn = connectToDatabase();

    $sql = "SELECT * FROM Reviews WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        handleQueryError($conn);
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reviews[] = $row;
            }
        }
    }

    $stmt->close();
    $conn->close();
    return $reviews;
}

function addProductReview($product_id, $review, $rating)
{
    $conn = connectToDatabase();

    $stmt = $conn->prepare("INSERT INTO Reviews (product_id, review, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $product_id, $review, $rating);

    if ($stmt->execute() === false) {
        handleQueryError($conn);
    }

    $stmt->close();
    $conn->close();
}

function handleQueryError($conn)
{
    echo "Error: " . $conn->error;
    $conn->close();
    exit;
}


initializeDatabase();


