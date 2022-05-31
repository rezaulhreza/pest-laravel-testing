@extends('components.layouts.app')

@section('content')





    <section>
        <ol class="list-reset flex px-6">
            <li><a href="#" class="text-blue-600 hover:text-blue-700">{{ 'Home' }}</a></li>
            <li><span class="text-gray-500 mx-2">/</span></li>
            <li class="text-gray-500">{{ 'Login' }}</li>
          </ol>
        <div class="max-w-2xl mx-auto bg-white p-16">



            <form action="/login" method="POST">
                @csrf
            <div class="grid gap-6 mb-6 lg:grid-cols-2">

                <div>
                    @error('email')
<div class="text-red-500 mt-2 text-sm">

{{ $message }}
</div>
@enderror
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input name="email" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" >
                </div>
            </div>
            @error('password')
            <div class="text-red-500 mt-2 text-sm">

            {{ $message }}
            </div>
            @enderror
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" >
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>


        </div>
    </section>

    @endsection
