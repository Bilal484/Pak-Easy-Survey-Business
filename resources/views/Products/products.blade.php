<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<style>

</style>

<body>
    <div class="container-fluid products-section">
        <div class="row text-center product-title p-5">
            <h1>ALL PRODUCTS </h1>
        </div>
        <div class="container">
            <div class="row p-5">
                <div class="col-md-4 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img src="{{ asset('assets/images/watch-band.jpg') }}">

                            </a>

                            <a type="button" class="add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Review
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">Smart Watch Bands</a></h3>
                            <div class="price">Watch Bands</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img src="{{ asset('assets/images/ring-box.jpg') }}">

                            </a>

                            <a type="button" class="add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal">Review</a>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">Luxury Gift Box for Rings</a></h3>
                            <div class="price">Rings Box</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img src="{{ asset('assets/images/earbuds.jpg') }}">

                            </a>

                            <a type="button" class="add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal">Review</a>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">Earbuds Pro</a></h3>
                            <div class="price">Earbuds</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal review-modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="title text-center">
                        <h5 class="modal-title" id="exampleModalLabel">welcome to EasyBusinessSurvey its just a little survey about products</h5>
                    </div>
                    <form action="">
                        <div class="first">
                            <label for="productPrice">Is this product price reasonable?</label>
                            <select class="form-select" id="productPrice" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="maybe">Maybe</option>
                            </select>
                        </div>
                        <div class="first">
                            <label for="productPrice">Is this product price reasonable?</label>
                            <select class="form-select" id="productPrice" required>
                                <option value="yes" >Yes</option>
                                <option value="no">No</option>
                                <option value="maybe">Maybe</option>
                            </select>
                        </div>
                        <div class="modal-footer justify-content-center">
                        <a href="" class="w-100"><button type="submit" class="btn btn-orangered">Submit</button>
                        </a></div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>