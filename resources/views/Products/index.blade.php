<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>

    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container-fluid products-section">
        <div class="row text-center product-title p-5">
            <h1>ALL PRODUCTS</h1>
        </div>
        <div class="container">
            <div class="row p-5">
                @php
                    $referralLevel = Auth::user()->referral_level ?? 0;
                    $maxProductsToShow = $referralLevel == 0 ? 3 : ($referralLevel == 1 ? 5 : 7);
                @endphp
                @foreach ($products->take($maxProductsToShow) as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="#" class="image">
                                    <img src="{{ asset($product->image_url) }}">
                                </a>
                                @php
                                    $hasReviewed = Auth::user()
                                        ->reviews()
                                        ->where('product_id', $product->id)
                                        ->exists();
                                @endphp
                                @unless ($hasReviewed)
                                    <a href="#" class="add-to-cart" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $product->id }}">
                                        Review
                                    </a>
                                @else
                                    <button type="button" class="add-to-cart" disabled>
                                        Already Reviewed
                                    </button>
                                @endunless
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                                <div class="price">{{ $product->description }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($products->take($maxProductsToShow) as $product)
        <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $product->id }}">Submit Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('products.review.store', ['product' => $product->id]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="review">Review</label>
                                <textarea id="review" class="form-control @error('review') is-invalid @enderror" name="review" rows="4"
                                    required></textarea>
                                @error('review')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- JavaScript (optional, if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
