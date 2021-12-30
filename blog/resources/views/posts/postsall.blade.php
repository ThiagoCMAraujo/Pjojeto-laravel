@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('register_post') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="" class="sr-only"></label>
                    <textarea name="description" id="description" cols="30" rows="4"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                        placeholder="What's Happening?"></textarea>

                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a class="font-bold" href="">{{ $post->user->name }}</a> <span
                            class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                        <p class="mb-2">{{ $post->description }}</p>

                        <div class="flex items-center">
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Unlike</button>
                                </form>
                            @endif
                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>
                    </div>

                @endforeach
                {{ $posts->links('pagination::semantic-ui') }}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>
@endsection