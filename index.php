

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBook - Find Your Ideal Location</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0118D8',
                        secondary: '#1B56FD',
                        accent: '#E9DFC3',
                        light: '#FFF8F8',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-light">
    <header class="min-h-screen flex flex-col">
     
        <nav class="py-6 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center">
                    <i class="fa-solid fa-earth-americas text-primary text-2xl mr-2"></i>
                    <span class="font-bold text-2xl text-primary">SpaceBook</span>
                </div>
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="Login.php" class="text-gray-700 hover:text-secondary font-medium">Login</a>
                    <a href="Register.php" class="bg-secondary hover:bg-primary text-white px-5 py-2 rounded-full font-medium transition-colors duration-300">
                        Register
                    </a>
                </div>
             
            </div>
        </nav>

      
        <div class="flex-grow flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
              
                    <div class="order-2 lg:order-1">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                            Find and Book <span class="text-primary">Perfect Spaces</span> for Any Occasion
                        </h1>
                        <p class="mt-6 text-xl text-gray-600 max-w-lg">
                            Our platform makes it simple to discover, reserve, and enjoy ideal locations for your meetings, events, and gatherings.
                        </p>
                        <div class="mt-10 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="Register.php" class="bg-primary hover:bg-secondary text-white text-lg font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                                Get Started
                            </a>
                            <a href="Login.php" class="bg-white hover:bg-gray-100 border border-gray-300 text-gray-800 text-lg font-semibold py-3 px-8 rounded-full shadow-md hover:shadow-lg transition-all duration-300 text-center">
                                Sign In
                            </a>
                        </div>
                    </div>
                    
                   
                    <div class="order-1 lg:order-2 relative">
                        <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-accent/50 animate-pulse"></div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 rounded-full bg-secondary/20 animate-pulse"></div>

                    </div>
                </div>
            </div>
        </div>

      
        <div class="text-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" class="fill-current">
                <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,100L1360,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z"></path>
            </svg>
        </div>
    </header>

    
    <section id="features" class="bg-secondary py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white">Discover Our Features</h2>
                <div class="mt-2 w-16 h-1 bg-accent mx-auto rounded-full"></div>
                <p class="mt-6 text-xl text-white/90 max-w-2xl mx-auto">
                    Everything you need to find and book the perfect space
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
             
                <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-accent/30 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-map-marker-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Find Spaces Easily</h3>
                    <p class="text-gray-600">
                        Browse through our curated selection of spaces and filter by location, capacity, amenities, and more.
                    </p>
                </div>
                
             
                <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-accent/30 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-calendar-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Booking</h3>
                    <p class="text-gray-600">
                        Book your desired space in just a few clicks with our streamlined reservation system.
                    </p>
                </div>
                
                
                <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-accent/30 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-user-shield text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Secure & Verified</h3>
                    <p class="text-gray-600">
                        All spaces on our platform are verified and your booking information is kept secure.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fa-solid fa-earth-americas text-accent text-2xl mr-2"></i>
                        <span class="font-bold text-2xl text-accent">SpaceBook</span>
                    </div>
                    <p class="mt-2 text-gray-400 text-center md:text-left">
                        The modern way to book spaces.
                    </p>
                </div>
                
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors duration-300">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition-colors duration-300">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                </div>
            </div>
            
        </div>
    </footer>
</body>
</html>

