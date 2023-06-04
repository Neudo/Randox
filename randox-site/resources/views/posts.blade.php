<x-app-layout>
    <div class="mt-2">
        <div class=" sm:px-6 lg:px-2">
            <div class="bg-white inline-block overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 py-2 text-black">
{{--                    <a href="{{ route('new-post') }}">{{ __("Nouveau") }}</a>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
{{--                    {{ __("Vos articles") }}--}}
                </div>
            </div>
        </div>
    </div>
    <div class="">
        @foreach($posts as $post)
        <div class=" mb-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-black">
                    <ul>
                        <li class="flex justify-between items-center">
                            <h4>{{ $post->title }}</h4>
                            <div class="action flex">
                                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Supprimer</button>
                                </form>
                                <div class="btn text-white hover:bg-red-600 bg-red-500 p-2">
                                <a href="http://localhost:3005/post/delete/{{$post->id}}">Supprimer</a></div>
                                <div class="btn text-white ml-3 p-2 hover:bg-yellow-700 bg-yellow-600 ">Editer</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</x-app-layout>
