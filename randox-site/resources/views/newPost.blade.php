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

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <form class="flex-col" action="">
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="title">Titre*</label>
                            <span class="italic">150 caractères max.</span>

                            <input name="title" class="rounded" type="text">
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label for="image">Image</label>
                            <input class="rounded" name="image" type="file">
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="shortdesc">Description courte*</label>
                            <span class="italic">Ce texte sera affiché sur la carte de l'article de blog. </span>
                            <textarea class="rounded" name="shortdesc"></textarea>
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="shortdesc">Contenu*</label>
                            <textarea class="rounded" name="shortdesc"></textarea>
                        </div>
                        <button class="rounded-lg mt-4 py-4 px-7 hover:bg-blue-700 transition ease-in bg-blue-600 text-white"  >Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
