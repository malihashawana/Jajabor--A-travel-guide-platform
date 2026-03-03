<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <style>
    body {
        background: url('https://img.freepik.com/premium-photo/blue-christmas-composition-with-stars-trendy-xmas-background-mockup-modern-design-free-space-text-copy-space-flat-lay-top-view_429124-738.jpg?semt=ais_hybrid') 
                    no-repeat center center fixed;
        background-size: cover;
        color: white;
    }
    .card {
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
    }
    /* Set black font color for modal labels */
    .modal .form-label {
        color: black;
    }
</style>
</head>
<body>
    <div class="container mt-5">
        <!-- Dashboard Button -->
        <div class="d-flex justify-content-between mb-4">
            <a href="/dashboard" class="btn btn-light">Go to Dashboard</a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-4">
            <!-- Search Bar -->
            <form action="{{ route('reviews.index') }}" method="GET" class="d-flex">
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    class="form-control"
                    placeholder="Search for a hotel or location"
                />
                <button type="submit" class="btn btn-primary ms-2">Search</button>
            </form>

            <!-- Share Experience Button -->
            <button
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#shareExperienceModal"
            >
                Share Your Experience
            </button>
        </div>

        <!-- Reviews List -->
        <div class="card">
            <div class="card-header">Reviews</div>
            <ul class="list-group list-group-flush">
                @forelse($reviews as $review)
                    <li class="list-group-item">
                        <strong>{{ $review->reviewer }}</strong> reviewed
                        <em>{{ $review->review_for }}</em>:<br />
                        {{ $review->comment }}
                        <span class="text-muted float-end">
                            {{ $review->created_at->diffForHumans() }}
                        </span>
                    </li>
                @empty
                    <li class="list-group-item">No reviews found.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Share Experience Modal -->
    <div
        class="modal fade"
        id="shareExperienceModal"
        tabindex="-1"
        aria-labelledby="shareExperienceModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareExperienceModalLabel">
                        Share Your Experience
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="reviewer" class="form-label">Your Name</label>
                            <input
                                type="text"
                                id="reviewer"
                                name="reviewer"
                                class="form-control"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="review_for" class="form-label">
                                Location/Hotel Name
                            </label>
                            <input
                                type="text"
                                id="review_for"
                                name="review_for"
                                class="form-control"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Your Comment</label>
                            <textarea
                                id="comment"
                                name="comment"
                                class="form-control"
                                rows="4"
                                required
                            ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Post Review</button>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
