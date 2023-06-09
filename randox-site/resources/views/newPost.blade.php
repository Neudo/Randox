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
            <ul class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-4 px-4" >
                @foreach($errors->all() as $error)
                    <li class="bg-red-500 text-white mb-4 inline-block p-[10px]" >{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <form class="flex-col" action="{{ route('post.new') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="title">Titre*</label>
                            <span class="italic">150 caractères max.</span>
                            <input id="title" name="title" class="rounded" type="text" value="{{ old('title') }}" >
                        </div>
                        <div class="group mb-6 flex-col">
                            <div>Sélectionnez l'image</div> <br>
                            <label for="image" class="custom-file-upload" >Image</label>
                            <i class="fa fa-cloud-upload"></i>
                            <input id="image" name="image" type="file" accept=".jpg, .jpeg, .png, .svg" hidden value="{{ old('image') }}" >
                            <span id="file-chosen" class="ml-4">Pas de fichier choisi.</span>
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="short_desc">Description courte*</label>
                            <span class="italic">Ce texte sera affiché sur la carte de l'article de blog. </span>
                            <textarea id="short_desc" class="rounded" name="short_desc"  >{{ old('short_desc') }}</textarea>
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="post_content">Contenu*</label>
                            <x-forms.tinymce-editor/>
                        </div>
                        <button type="submit" class="rounded-lg mt-4 py-4 px-7 hover:bg-blue-700 transition ease-in bg-blue-600 text-white"  >Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
