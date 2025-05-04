<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
</head>
<body class="bg-light min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-primary py-6 px-4">
            <h2 class="text-2xl font-bold text-center text-light">Login</h2>
        </div>
        
        <form action="process/login_process.php" method="post" class="py-8 px-6 space-y-6">
            <div class="space-y-2">
                <label for="nama" class="block text-sm font-medium text-gray-700">Masukan Nama anda</label>
                <div class="relative">
                    <input type="text" id="nama" name="nama" autocomplete="off" placeholder="Nama anda" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent bg-light"
                        required />
                </div>
            </div>
            
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Masukan Password anda</label>
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="Password anda" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent bg-light"
                        required />
                </div>
            </div>
            
            <div>
                <button type="submit" name="submit" 
                    class="w-full bg-secondary hover:bg-primary text-white font-bold py-3 px-4 rounded-md transition duration-300 ease-in-out transform hover:-translate-y-1">
                    Kirim
                </button>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="Register.php" class="text-secondary hover:text-primary font-medium">
                        Daftar disini
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>