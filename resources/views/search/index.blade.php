@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Search blog posts...
            </h1>
        </div>
    </div>
    @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    <div class="pt-15 w-4/5 m-auto">
        <form action="/search/query" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search ..."
                   class="pl-4 pr-10 py-3 loading-none rounded-lg shadow-sm
            focus:outline-none focus:shadow-outline text-gray-600 font-medium">
            <button type="submit" class="bg-green-500 uppercase bg-transparent
             text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Search
            </button>
        </form>
    </div>

    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="/blog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Create Post
            </a>
        </div>
    @endif
    @foreach($posts as $post)
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            <div>
                <img src="{{ asset('images/' . $post->image_path) }}" width="700px" alt="">
            </div>
            <div>
                <h2 class="text-gray-700 font-bold text-5xl pb-4">
                    {{ $post->title }}
                </h2>
                <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">
                    {{ $post->user->name }}
                </span> , Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $post->description }}
                </p>
                <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Keep Reading
                </a>

                @if(isset(\Illuminate\Support\Facades\Auth::user()->id) && \Illuminate\Support\Facades\Auth::user()->id == $post->user_id)
                    <span class="float-right">
                    <a class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2" href="/blog/{{ $post->slug }}/edit">Edit</a>
                </span>
                    <span class="float-right">
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="text-red-500 pr-3" type="submit">
                            Delete
                        </button>
                    </form>
                </span>
                @endif

            </div>
        </div>
    @endforeach
@endsection