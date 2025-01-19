<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources\css\app.css')
    <title>Subkorat Admin Login</title>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        @if (Session::has('success'))
            <div class="w-full p-2 border border-green-500 bg-green-300 text-center rounded mt-1 mb-1"> {{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="w-full p-2 border border-red-500 bg-red-300 text-center rounded mt-1 mb-1"> {{ Session::get('error') }}</div>
        @endif
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center font-thai">Subkorat Admin Login</h2>

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 @error('email') border-red-500 @enderror">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email"
                    class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Enter your email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-[15px] text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password"
                    class="block text-gray-700  @error('password') border-red-500 @enderror ">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Enter your password" />
                @error('password')
                    <p class="text-[15px] text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Don't have an account?
            <a href="{{ route('account.register') }}" class="text-blue-600 hover:underline">Register here</a>
        </p>
    </div>
</body>

</html>

</html>
