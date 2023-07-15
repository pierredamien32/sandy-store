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
                        {{-- <h5 class="text-md font-semibold tracking-tight text-gray-900 dark:text-white">{{ $produit->description }}</h5> --}}
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-[22px] font-bold text-gray-900 dark:text-white">{{ $produit->prix }}fcfa</span>
                        <form action="" method="post">
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Ajouter au panier
                            </button>
                        </form>
                        {{-- <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter au panier</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="flex justify-center items-center h-[100px] italic text-3xl text-gray-900 bg-white dark:text-white dark:bg-gray-800 pb-10">Pas de produit disponible.</p>
    @endif
        </div>
    </div>

<!-- Modal toggle -->


  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Téléphone</h3>
                  <form class="space-y-6" action="#">
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre numéro de téléphone</label>
                        <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90475836" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">S'enregistrer</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

@endsection
