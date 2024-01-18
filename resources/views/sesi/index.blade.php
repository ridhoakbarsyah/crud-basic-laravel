@extends('students.layout')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <div class="flex items-center justify-center h-screen">
        <div class="w-1/2 mx-auto bg-white border rounded p-6 mt-10">
            <img class="mx-auto h-10 w-auto mb-2" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>
        
        <form action="/sesi/login" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" value="{{ Session::get('email') }}" name="email" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded-md"  maxlength="6">
                <a href="/forgot-password" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div>
    
            <div class="mb-2">
                <button name="submit" type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Login
                </button>
            </div>
        </form>
    </div>
    </div>
@endsection
