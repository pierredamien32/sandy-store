@extends('welcome')
@section('content')
<div class="bg-white dark:bg-gray-800 pb-4">
    <div class="flex flex-col justify-center items-center">

        <div class="w-full max-w-sm p-10 bg-white border mt-5 border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-3xl text-gray-900 text-center relative bottom-4 dark:text-white">Modifier un produit</h2>
                    {{-- @if (session()->has('message'))
                        <div class="flex justify-center items-center w-full bg-green-300">
                            <div class="text-center text-green-700">{{ session()->get('message') }}</div>
                        </div>
                    @endif --}}
            <form action="{{ route('homeSuperAdmin.update', $user->id) }}" method="POST">
                @csrf
                    {{-- <input  type="text" name="id" value="{{ $produit->id }}" id=""> --}}
                <div class="mb-6">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom d'utilisateur</label>
                    <input type="text" name="name" id="nom" value="{{ $user->name }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="bracelet" >
                    @error('nom_produit')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="shadow-sm bg-gray-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="mr-top@gmail.com" >
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-center items-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-red-300 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only ">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white text-center">Modification du produit </h3>

            </div>
        </div>
    </div>
</div> --}}
