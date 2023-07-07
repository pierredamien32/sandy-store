@extends('welcome')
@section('content')
<div class="bg-white dark:bg-gray-800 pb-4">
    <div class="flex flex-col justify-center items-center">

        <div class="w-full max-w-sm p-10 bg-white border mt-5 border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-3xl text-gray-900 text-center relative bottom-4 dark:text-white">Ajouter un produit</h2>
                    @if (session()->has('message'))
                        <div class="flex justify-center items-center w-full bg-green-300">
                            <div class="text-center text-green-500">{{ session()->get('message') }}</div>
                        </div>
                    @endif
            <form action="{{ route('addArticle.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- <input  type="hidden" name="role_id" value="2" id=""> -->
                <div class="mb-6">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du produit</label>
                    <input type="text" name="nom_produit" id="nom" value="{{ old('nom_produit') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="bracelet" >
                    @error('nom_produit')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Le prix du produit</label>
                    <input type="number" name="prix" id="number" value="{{ old('prix') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="1000" >
                    @error('prix')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description du produit</label>
                    <input type="text" name="description" id="nom" value="{{ old('description') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="bracelet..." >
                </div>
                <div class="mb-6">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité en stock</label>
                    <input type="number" name="stock" id="number" value="{{ old('stock') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="100" >
                    @error('stock')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Joindre une image</label>
                    <input type="file" name="file" value="{{ old('file') }}" id="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >
                    @error('file')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
