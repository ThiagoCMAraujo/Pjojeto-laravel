@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="">Name</label>
                    <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="name" value = "{{old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="">Email</label>
                    <input type="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="email" value="{{old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="">Password</label>
                    <input type="password" placeholder="*******" autocomplete="on" class="bg-gray-100 border-2 w-full p-4 rounded-lg"
                        name="password" id="password">

                        @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-4">
                    <label for="password_confirmation">Confirm Your Password</label>
                    <input type="password" autocomplete="on" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="*******"
                        name="password_confirmation" id="password_confirmation">
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
