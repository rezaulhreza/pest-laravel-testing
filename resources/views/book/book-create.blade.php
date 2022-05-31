@extends('components.layouts.app')

@section('content')

<section>
    <div class="max-w-2xl mx-auto bg-white p-16">


        <form action="/books" method="POST">
            @csrf
        <div class="grid gap-6 mb-6 lg:grid-cols-2">
            @error('title')
            <div class="text-red-500 mt-2 text-sm">

            {{ $message }}
             </div>
    @enderror
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                <input name="title" type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" >
            </div>
            <div>
                <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Author</label>
                <input name="author" type="text" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" >

            </div>
            @error('author')
            <div class="text-red-500 mt-2 text-sm">

                {{ $message }}
            </div>
            @enderror

            <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Status</label>
                <select name="status" type="text" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" >
                @foreach (\App\Models\BookUser::$statuses  as $key=>$status)
                <option value="{{ $key }}">{{ $status }}</option>
                @endforeach

                </select>
            </div>
            @error('status')
            <div class="text-red-500 mt-2 text-sm">

                {{ $message }}
            </div>
            @enderror
        </div>


        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>


    </div>
</section>

@endsection
