<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources\css\app.css')
    <title>Subkorat Account Register</title>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center font-thai">Subkorat Register</h2>  

        <!-- Register Form -->
        <form method="POST" action="{{ route('account.processRegiter') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 @error('username') border-red-500 @enderror">Username</label>
                <input
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    id="username"
                    class="w-full p-2 border border-gray-300 rounded mt-1"
                    placeholder="Enter your Username"
                    value="{{ old('email') }}"
                    
                />
            <div class="mb-4">
                <label for="email" class="block text-gray-700 @error('email') border-red-500 @enderror">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    id="email"
                    class="w-full p-2 border border-gray-300 rounded mt-1"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    
                />
                @error('email')
                <p class="text-[15px] text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700  @error('password') border-red-500 @enderror ">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full p-2 border border-gray-300 rounded mt-1"
                    placeholder="Enter your password"
                    
                />
                @error('password')
                <p class="text-[15px] text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700  @error('password_confirmation') border-red-500 @enderror ">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="confirmation_password"
                    class="w-full p-2 border border-gray-300 rounded mt-1"
                    placeholder="Confirm your password"
                    
                />
                @error('password')
                <p class="text-[15px] text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Register
            </button>
        </form>
        <p class="mt-6 text-center text-gray-600">
            <a href="{{ route('account.login') }}" class="text-blue-600 font-english hover:underline"><--- Back to Login</a>
        </p>
    </div>
</body>
</html>

</html>
