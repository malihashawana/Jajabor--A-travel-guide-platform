<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <!-- Back Button Section -->
    <div class="py-4">
        <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 font-semibold text-lg">
            ← Back 
        </a>
    </div>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6">
                <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">About Our Company</h3>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Welcome to our company! We are committed to providing the best services and products to our customers. Our team is dedicated to ensuring customer satisfaction and continuous improvement in our processes.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Image and Description Block 1 -->
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/ocean_paradise2.jpg') }}" alt="Team Image 1" class="rounded-lg shadow-md w-full h-64 object-cover">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">Our Vision</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-center mt-2">
                            We aim to be a leading company in our industry, setting standards for excellence and innovation.
                        </p>
                    </div>
                    
                    <!-- Image and Description Block 2 -->
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/background.jpg') }}" alt="Background Image" class="rounded-lg shadow-md w-full h-64 object-cover">
                        <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">Our Mission</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-center mt-2">
                            Our mission is to deliver high-quality products and services that exceed our customers' expectations.
                        </p>
                    </div>
                </div>

                <!-- Meet the Team Section -->
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Meet the Development Team</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Team Member 1 -->
                        <div class="text-center">
                            <div class="w-32 h-32 mx-auto overflow-hidden rounded-full">
                                <img src="{{ asset('images/zami1.jpg') }}" alt="Developer 1" class="w-full h-full object-cover">
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mt-4 mb-2">Asir Abrar Tonish</h4>
                            <p class="text-gray-700 dark:text-gray-300 text-lg">Frontend Developer</p>
                        </div>

                        <!-- Team Member 2 -->
                        <div class="text-center">
                            <div class="w-32 h-32 mx-auto overflow-hidden rounded-full">
                                <img src="{{ asset('images/zami2.jpg') }}" alt="Developer 2" class="w-full h-full object-cover">
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mt-4 mb-2">Hasan Sarwar Zami</h4>
                            <p class="text-gray-700 dark:text-gray-300 text-lg">FullStack Developer</p>
                        </div>

                        <!-- Team Member 3 -->
                        <div class="text-center">
                            <div class="w-32 h-32 mx-auto overflow-hidden rounded-full">
                                <img src="{{ asset('images/tasnim.jpg') }}" alt="Developer 3" class="w-full h-full object-cover">
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mt-4 mb-2">Tasnim Zaman Khan</h4>
                            <p class="text-gray-700 dark:text-gray-300 text-lg">UI/UX Designer</p>
                        </div>

                         <!-- Team Member 4 -->
                        <div class="text-center flex flex-col items-center justify-center">
                            <div class="w-32 h-32 mx-auto overflow-hidden rounded-full">
                                <img src="{{ asset('images/maliha.jpg') }}" alt="Developer 4" class="w-full h-full object-cover">
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mt-4 mb-2 text-center">Shawana Maliha</h4>
                            <p class="text-gray-700 dark:text-gray-300 text-lg">Dudhbhat</p>
                        </div>

                    </div>
                </div>

                <div class="mt-8 text-center">
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Join Us</h4>
                    <p class="text-gray-700 dark:text-gray-300">
                        We are always looking for talented individuals to join our team. Contact us to learn more about career opportunities.
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
