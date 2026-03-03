@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-Black text-center">
                    <h2 class="mb-0">File a Complaint</h2>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('complaint.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 text-center">
                            <x-form-label for="email" class="fw-bold">Email Address</x-form-label>
                            <div class="mt-2">
                            <x-form-input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="rounded-pill shadow-sm p-3 w-75 mx-auto" 
                                placeholder="Enter your email" 
                                required />
                            </div>
                        </div>
                        <div class="mb-4 text-center">
                            <x-form-label for="complaint" class="fw-bold">Your Complaint</x-form-label>
                            <div class="mt-2">
                            <textarea 
                                name="complaint" 
                                id="complaint" 
                                rows="5" 
                                class="form-control shadow-sm p-3 w-75 mx-auto custom-textarea" 
                                placeholder="Write your complaint here..." 
                                required></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Centered form styling */
    .container-fluid {
        background-color: #f0f8ff; /* Light background for the form */
    }

    .card {
        background-color: #ffffff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
    }

    .card-header {
        border-radius: 20px 20px 0 0;
        background-color: #007bff; /* Change to your preferred primary color */
    }

    .card-header h2 {
        font-size: 2rem;
        font-weight: bold;
    }

    /* Form inputs and labels */
    .fw-bold {
        font-weight: 600;
    }

    .custom-textarea {
        resize: vertical;
        font-size: 1rem;
    }

    .form-control {
        border-radius: 10px;
    }

    .rounded-pill {
        border-radius: 50px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-lg {
        font-size: 1.25rem;
        padding: 12px 40px;
    }

    .shadow-sm {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Responsive input field styling */
    .w-75 {
        width: 75% !important;
    }

    /* Ensure good spacing between elements */
    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .mt-2 {
        margin-top: 1rem;
    }

    /* Improve text alignment */
    .text-center {
        text-align: center;
    }

    /* Custom button shadow */
    .btn-primary {
        box-shadow: 0 2px 10px rgba(0, 123, 255, 0.2);
    }

    /* Adjust text inside inputs */
    .form-control, .custom-textarea, .btn {
        font-size: 1.1rem;
        padding: 12px;
    }
</style>
@endsection
