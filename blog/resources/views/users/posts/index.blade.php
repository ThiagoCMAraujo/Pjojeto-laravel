@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 ">
            <div class="p-6">
                <h1 class="text-2xl text-white font-medium mb-1">{{ $user->name }}</h1>
                <p class="text-white">Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}} and received {{$user->receivedLikes->count()}} {{Str::plural('like', $user->receivedLikes->count())}}</p>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                    {{ $posts->links('pagination::semantic-ui') }}
                @else
                    <p>{{ $user->name }} doesn't have any posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection
