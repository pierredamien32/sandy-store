@extends('welcome')
@section('content')
<div class="bg-white dark:bg-gray-800 pb-4">
    <div class="flex flex-col justify-center items-center">
        
        <div class="w-full max-w-sm p-4 bg-white border mt-5 border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-3xl text-white text-center relative bottom-4">Ajouter un article</h2>
            <form action="" method="POST">
                @csrf
                <!-- <input  type="hidden" name="role_id" value="2" id=""> -->
                <div class="mb-6">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'article</label>
                    <input type="text" name="name" id="nom" value="" class="shadow-sm bg-gray-50 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Mr-Top" >
                </div>
                <div class="mb-6">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le prix de l'article</label>
                    <input type="number" name="number" id="number" value="" class="shadow-sm bg-gray-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="mr-top@gmail.com" >
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Joindre une image</label>
                    <input type="file" name="file" value="" id="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection