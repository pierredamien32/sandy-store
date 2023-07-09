@extends('welcome')
@section('content')

<div class="relative overflow-x-auto shadow-md ">
    <div class="p-5 text-3xl flex justify-between items-center font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
        <div>
            Listes des utilisateurs

            <div class="relative mt-3">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher un utilisateur">
            </div>
        </div>
        <div>
            <form action="" method="get">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter un admin</button>
            </form>
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 pb-10">
    @if(count($utilisateurs) > 0)
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    # Order
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom d'utilisateur
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($utilisateurs as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->id}}
                    </th>
                    <td class="px-6 py-4">
                    {{$user->name}}
                    </td>
                    <td class="px-6 py-4">
                    {{$user->email}}
                    </td>
                    <td class="px-6 py-4">
                    {{$user->role->libelle}}
                    </td>
                    <td class="flex items-center px-6 py-4 space-x-6">
                        <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"></a> -->
                        {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button> --}}
                        <a href="{{ route('homeSuperAdmin.edit', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="{{ route('homeSuperAdmin.show', ['id' => $user->id]) }}" method="post">
                            {{$user->id}}
                            @csrf
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-medium text-red-600 dark:text-red-500 hover:underline" type="button">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
        @endforeach

        </tbody>
        @else
            <p class="flex justify-center items-center h-[100vh] font-bold text-3xl">Pas d'utilisateurs</p>
        @endif
    </table>
</div>


<!-- //Modale pour la suppression d'utilisateur -->
<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Voulez-vous vraiment supprimer cet utilisateur ?</h3>
                <div class="flex items-center gap-8 justify-center">
                    <form action="{{ route('homeSuperAdmin.destroy', ['id' => $user->id] ) }}" method="post">
                        {{$user->id}}
                        @csrf
                        @method('DELETE')
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Oui, je suis sûr
                        </button>
                    </form>
                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Non, annuler</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal toggle -->

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-red-300 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only ">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white text-center">Ajouter un Admin</h3>
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
</div>



@endsection
