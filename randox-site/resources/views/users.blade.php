<x-app-layout>
    <div class="mt-2">

    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    {{ __("Liste des utilisateurs") }}
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="max-w-7xl py-6 mx-auto sm:px-6 lg:px-8">
            <p class="bg-green-400 inline-block px-8 py-4 "> {{ session('success') }}</p>
        </div>
    @endif
    <div>
        @foreach($users as $user)
                <?php $isAdmin = false;

                if ($user->isAdmin){
                    $isAdmin= true;
                }

                ?>
            <div class=" mb-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 text-black">
                        <ul class="flex flex-col">
                            <div class="wrapper-top">
                                <li class="flex justify-between items-center">
                                    <form class="mr-4 flex justify-between w-full" action="{{ route('user.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="wrapper-infos">
                                            <h4>{{ $user->name }}</h4>
                                            <p>{{$user->email}}</p>
                                            <input type="hidden" name="isAdmin" value="0">
                                            <input <?= $isAdmin ? 'checked' : '' ?> type="checkbox" name="isAdmin"
                                                   value="1">
                                            <label for="isAdmin">Admin</label>
                                        </div>

                                        <button class="btn text-white hover:bg-blue-600 bg-blue-500 p-2"
                                                type="submit">Modifier
                                        </button>
                                    </form>
                                    <div class="action flex">
                                        <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn text-white hover:bg-red-600 bg-red-500 p-2"
                                                    type="submit">Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $users->links() }}
</x-app-layout>
