@extends('welcome')

@section('content')
<div class="bg-white dark:bg-gray-800 pb-4">
    <div class="flex flex-col justify-center items-center">
        <div class="w-full max-w-sm p-4 bg-white border mt-5 border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="{{route('loginUsers')}}" method="POST">
                @csrf
                <h5 class="text-xl text-center font-medium text-gray-900 dark:text-white">Connectez-vous</h5>
                @error('erreur')
                    <div class="flex justify-center items-center">
                        <span class="text-red-600">{{ $message }}</span>
                    </div>
                @enderror
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" >
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                    @error('password')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" >
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Souviens-toi de moi</label>
                    </div>
                    <a href="#" class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Mot de passe oublié?</a>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Se connecter</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    <!-- Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a> -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection