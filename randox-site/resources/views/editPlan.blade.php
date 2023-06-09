<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    {{ __("Modifier le forfait") }}
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
                    <form class="flex-col" action="{{ route('plan.update', $plan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="title">Titre*</label>
                            <span class="italic">150 caractères max.</span>
                            <input id="title" name="title" class="rounded" type="text" value="{{ isset($plan->title) ? $plan->title : old('title') }}" >
                        </div>
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="info">Informations*</label>
                            <span class="italic">150 caractères max.</span>
                            <input id="info" name="info" class="rounded" type="text" value="{{ isset($plan->info) ? $plan->info : old('info') }}">
                        </div>
                        <div class="group mb-6 flex flex-col">
                            <label class="font-bold" for="stripe_id">Stripe ID*</label>
                            <span class="italic">ID du produit, disponible la fiche produit, sur stripe.</span>
                            <input id="stripe_id" name="stripe_id" class="rounded" type="text" value="{{ isset($plan->stripe_id) ? $plan->stripe_id : old('stripe_id') }}">
                        </div>
                        <div class="group mb-6 flex-col">
                            <div>Sélectionnez l'image</div> <br>
                            <label for="image" class="custom-file-upload" >Image</label>
                            <i class="fa fa-cloud-upload"></i>
                            <input id="image" name="image" type="file" accept=".jpg, .jpeg, .png, .svg" hidden value="{{ old('image') }}" >
                            <span id="file-chosen" class="ml-4">Pas de fichier choisi.</span>
                        </div>
                        <div class="group flex mb-6 flex-col">
                            <label class="font-bold" for="price">Prix</label>
                            <input id="price" class="rounded" name="price" type="number" step="0.01" value="{{ isset($plan->price) ? $plan->price : old('price')}}" />
                        </div>
                        <button type="submit" class="rounded-lg mt-4 py-4 px-7 hover:bg-blue-700 transition ease-in bg-blue-600 text-white"  >Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
