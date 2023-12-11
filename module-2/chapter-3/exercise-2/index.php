<?php
require_once __DIR__ . "/database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-n3JcB3b/4XsWks9jhH6SYth1v0L/c1YO9QRibFWfl8whA4zyW4+WqzQ3Jrz9IDBznjE8i8T37ciDLdpAqQFS4Q=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css"> <!-- Link to the custom styles -->

    <title>Products Reviews</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Product Review</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="process.php">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Product Description</label>
                            <textarea class="form-control" id="productDescription" name="productDescription" rows="3"
                                      required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Product List -->
    <h2 class='my-4'>Products</h2>
    <div class="row">
        <?php
        $products = readFromProducts();
        if (count($products) > 0) {
            foreach ($products as $product) {
                echo '<div class="col-md-4">';
                echo '<div class="card mb-4">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $product['name'] . '</h5>';
                echo '<p class="card-text">' . $product['description'] . '</p>';
                echo '<p class="card-text">Price: $' . $product['price'] . '</p>';
                $reviews = readFromReviews($product['id']);

                // Number of reviews
                $numReviews = count($reviews);

                if ($numReviews > 0) {
                    echo '<p class="card-text fst-italic fs-6">' . $numReviews . ' reviews</p>';
                    echo '<ul class="list-group">';
                    foreach ($reviews as $review) {
                        echo '<li class="list-group-item">';
                        echo '<div class="row">';
                        echo '<div class="col-10">';
                        echo '<p class="mb-1">' . $review['review'] . '</p>';
                        echo '<div class="rating">';
                        $rating = $review['rating'];
                        echo '<p class="mb-0">';
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span class="text-warning">&#9733;</span>'; // Filled star symbol
                            } else {
                                echo '<span class="text-warning">&#9734;</span>'; // Empty star symbol
                            }
                        }
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>No reviews found.</p>';
                }

                // Add Review Button
                echo '<button type="button" class=" mt-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReviewModal-' . $product['id'] . '">Add Review</button>';

                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Add Review Modal
                echo '<div class="modal fade" id="addReviewModal-' . $product['id'] . '" tabindex="-1" aria-labelledby="addReviewModalLabel-' . $product['id'] . '" aria-hidden="true">';
                echo '<div class="modal-dialog">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h5 class="modal-title" id="addReviewModalLabel-' . $product['id'] . '">Add Review</h5>';
                echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<form method="post" action="process.php">';
                echo '<input type="hidden" name="productId" value="' . $product['id'] . '">';

                echo '<div class="mb-3">';
                echo '<label for="reviewText-' . $product['id'] . '" class="form-label">Review</label>';
                echo '<textarea class="form-control" id="reviewText-' . $product['id'] . '" name="reviewText" rows="3" required></textarea>';
                echo '</div>';

                echo '<div class="mb-3">';
                echo '<label for="ratingInput-' . $product['id'] . '" class="form-label">Rating</label>';
                echo '<input type="number" class="form-control" id="ratingInput-' . $product['id'] . '" name="rating" min="1" max="5" step="0.1" required>';
                echo '</div>';

                echo '<button type="submit" class="btn btn-primary" name="addReview">Add Review</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No products found.</p>';
        }
        ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

