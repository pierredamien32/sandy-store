@extends('welcome')

@section('content')
    <div class="bg-white dark:bg-gray-800">
        <h1 class="self-center text-2xl font-semibold text-gray-900 whitespace-nowrap dark:text-white">Mes bracelets</h1>
        <h3 class="text-gray-600 dark:text-gray-300">@if (count($produits) > 1) {{ count($produits) }} produits @else {{ count($produits) }} produit @endif</h3>
        <div class="grid max-w-2xl grid-cols-1 px-4 py-8 mx-auto lg:max-w-7xl gap-y-10 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @if(count($produits) > 0)
        @foreach($produits as $produit)
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="p-8 rounded-t-lg" src="{{ asset('productimage/'.$produit->image) }}" alt="image_bracelet" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-lg font-normal tracking-tight text-gray-900 dark:text-white">{{ $produit->nom_produit }}</h5>
                    </a>
                    <div class="flex items-center justify-end mt-2.5 mb-5">
                        <h5 class="text-md font-semibold tracking-tight text-gray-900 dark:text-white">{{ $produit->description }}</h5>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-[22px] font-bold text-gray-900 dark:text-white">{{ $produit->prix }}fcfa</span>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="flex justify-center items-center h-[100px] italic text-3xl text-gray-900 bg-white dark:text-white dark:bg-gray-800 pb-10">Pas de produit disponible.</p>
    @endif
        </div>
    </div>
@endsection
