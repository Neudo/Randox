<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    {{ __("Nouveau post") }}
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="max-w-7xl py-6 mx-auto sm:px-6 lg:px-8">
            <ul class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                @foreach($errors->all() as $error)
                    <li class="bg-red-500 text-white mb-4" >{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <form class="flex-col" action="{{ route('post.new') }}" method="POST">
                        @csrf
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="title">Titre*</label>
                            <span class="italic">150 caractères max.</span>
                            <input id="title" name="title" class="rounded" type="text" value="{{ old('title') }}" >
                        </div>
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="slug">Slug*</label>
                            <span class="italic">150 caractères max.</span>
                            <input id="slug" name="slug" class="rounded" type="text" value="{{ old('slug') }}">
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label for="image">Image</label>
                            <input id="image" class="rounded" name="image" type="file" value="{{ old('image') }}" >
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="short_desc">Description courte*</label>
                            <span class="italic">Ce texte sera affiché sur la carte de l'article de blog. </span>
                            <textarea id="short_desc" class="rounded" name="short_desc"  >{{ old('short_desc') }}</textarea>
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="post_content">Contenu*</label>
                            <textarea id="post_content" class="rounded" rows="20" name="post_content" >{{ old('post_content') }}</textarea>
                        </div>
                        <button type="submit" class="rounded-lg mt-4 py-4 px-7 hover:bg-blue-700 transition ease-in bg-blue-600 text-white"  >Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
