<x-app-layout>
    <div class="mt-2">
        <div class=" sm:px-6 lg:px-2">
            <div class="bg-white inline-block overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-2 text-black">
                    <a href="{{ route('new-plan') }}">{{ __("Nouveau") }}</a>
                </div>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    {{ __("Vos abonnements") }}
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="max-w-7xl py-6 mx-auto sm:px-6 lg:px-8">
            <p class="bg-green-400 inline-block px-8 py-4 "> {{ session('success') }}</p>
        </div>
    @endif
    <div class="">
        @foreach($plans as $plan)
            <div class=" mb-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 text-black">
                        <ul class="flex flex-col">
                            <div class="wrapper-top">
                                <li class="flex justify-between items-center">
                                    <h4>{{ $plan->title }}</h4>
                                    <div class="action flex">
                                        <form action="{{ route('plan.delete', $plan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn text-white hover:bg-red-600 bg-red-500 p-2"
                                                    type="submit">Supprimer
                                            </button>
                                        </form>
                                        <a href="{{ route('plan.edit', $plan->id) }}" class="btn text-white ml-3 p-2 hover:bg-yellow-700 bg-yellow-600" title="Modifier l'article" >Modifier</a>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
