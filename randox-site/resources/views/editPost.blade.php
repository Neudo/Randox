<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    {{ __("Modifier votre article") }}
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
                    <form action="{{ route('posts.update', $post->slug ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="title">Titre*</label>
                            <span class="italic">150 caractères max.</span>
                            <input id="title" name="title" class="rounded" type="text"
                                   value="{{ $post->title }}">
                        </div>
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="slug">Slug*</label>
                            <span class="italic">150 caractères max.</span>
                            <input id="slug" name="slug" class="rounded" type="text"
                                   value="{{ $post->slug }}">
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label for="image">Image</label>
                            <input id="image" class="rounded" name="image" type="file"
                                   value="{{ $post->image }}">
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="short_desc">Description courte*</label>
                            <span class="italic">Ce texte sera affiché sur la carte de l'article de blog. </span>
                            <textarea id="short_desc" class="rounded"
                                      name="short_desc">{{ $post->short_desc }}</textarea>
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="post_content">Contenu*</label>
                            <textarea id="post_content" class="rounded" rows="20"
                                      name="post_content">{{ $post->content }}</textarea>
                        </div>
                        <button class="btn text-white hover:bg-red-600 bg-red-500 p-2"
                                type="submit">Éditer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
