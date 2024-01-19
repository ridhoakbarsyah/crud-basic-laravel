@extends('students.layout')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <div class="flex items-center justify-center h-screen">
        <div class="w-1/2 mx-auto bg-white border rounded p-6 mt-10">
            <img class="mx-auto h-10 w-auto mb-2" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif

            <h1 class="text-2xl font-bold mb-4 text-center">Forgot Password?</h1>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-4">
                <p class="text-center font-semibold mb-4">Silahkan masukkan email anda untuk reset password!</p>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" value="" name="email" class="w-full p-2 border rounded-md">
            </div>
            <div class="mb-2">
                <button name="submit" value="Request Password Reset" type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
    </div>
@endsection
