@extends('welcome')
@section('content')
<div class="bg-white dark:bg-gray-800 pb-4">
    <div class="flex flex-col justify-center items-center">

        <div class="w-full max-w-sm p-4 bg-white border mt-5 border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-3xl text-gray-900 text-center relative bottom-4 dark:text-white">Ajouter un admin</h2>
            <form action="{{ route('addAdmin.store') }}" method="POST">
                @csrf
                <!-- <input  type="hidden" name="role_id" value="2" id=""> -->
                <div class="mb-6">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom d'utilisateur</label>
                    <input type="text" name="name" id="nom" value="{{ old('name') }}" class="shadow-sm bg-gray-50 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Mr-Top" >
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow-sm bg-gray-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="mr-top@gmail.com" >
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" value="" id="password" class="shadow-sm bg-gray-50 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                    @error('password')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmer password</label>
                    <input type="password" name="password_confirmation" id="repeat-password" class="shadow-sm bg-gray-50 border {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                    @error('password_confirmation')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" value="" name="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                    </div>
                    <label for="terms" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Je suis d'accord avec les <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">les termes et conditions</a></label>
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Créer un admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
