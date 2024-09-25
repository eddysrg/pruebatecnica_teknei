<div class="space-y-10">
    <button wire:click='fetchUser' class="bg-blue-500 p-2 text-white font-semibold rounded">Obtener Usuario</button>

    <div class="w-full grid grid-cols-5 justify-items-center items-center gap-y-3">
        <h4 class="font-semibold">Nombre</h4>
        <h4 class="font-semibold">Dirección</h4>
        <h4 class="font-semibold">Código Postal</h4>
        <h4 class="font-semibold">Correo</h4>
        <h4 class="font-semibold">Editar</h4>

        @foreach ($users as $index => $user)
        <p>
            {{$user['name']['title'] . " " . $user['name']['first'] . " " . $user['name']['last']}}
        </p>

        <p>
            {{$user['location']['city'] . " " . $user['location']['state'] . " " .
            $user['location']['country']}}
        </p>

        <p>
            {{$user['location']['postcode']}}
        </p>

        <p>
            {{$user['email']}}
        </p>

        <button wire:click='selectUser({{$index}})' class="bg-blue-500 text-white font-semibold rounded py-2 px-5">
            Editar
        </button>
        @endforeach
    </div>

    <div x-data="{ isOpen: @entangle('isOpen') }" x-show="isOpen" x-cloack class="fixed z-50 inset-0 overflow-y-hidden"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div x-show="isOpen" class="fixed inset-0 bg-gray-800 bg-opacity-75 transition-opacity"
            @click="$wire.resetForm()"></div>

        <div class="flex justify-center items-center min-h-screen">
            <div @click.away="$wire.resetForm()" class="w-4/5 p-6 bg-white shadow-lg rounded z-10">
                <form action="" wire:submit.prevent='updateUser'>

                    <h3 class="mb-2 font-semibold text-xl">Nombre Completo</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="title">Title</label>
                            <input class="rounded" type="text" name="title" id="title"
                                wire:model.defer='editingUser.name.title'>
                            @error('editingUser.name.title')
                            <span class="text-red-500 text-sm">Formato no valido, no insertar números solo letras</span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="">First</label>
                            <input class="rounded" type="text" wire:model.defer='editingUser.name.first'>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="">Last</label>
                            <input class="rounded" type="text" wire:model.defer='editingUser.name.last'>
                        </div>
                    </div>

                    <h3 class="mb-2 mt-3 font-semibold text-xl">Dirección</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="">City</label>
                            <input class="rounded" type="text" wire:model.defer='editingUser.location.city'>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="">State</label>
                            <input class="rounded" type="text" wire:model.defer='editingUser.location.state'>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="">Country</label>
                            <input class="rounded" type="text" wire:model.defer='editingUser.location.country'>
                        </div>
                    </div>

                    <h3 class="mb-2 mt-3 font-semibold text-xl">Datos complementarios</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="">Postcode</label>
                            <input class="rounded" type="text" wire:model.defer='editingUser.location.postcode'>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="">Email</label>
                            <input class="rounded" type="text" wire:model.defer='editingUser.email'>
                        </div>
                    </div>

                    <button type="button" class="bg-red-500 text-white font-semibold rounded py-2 px-5 mt-5"
                        @click="$wire.resetForm()">
                        Cancelar
                    </button>
                    <input type="submit" value="Guardar"
                        class="bg-blue-500 text-white font-semibold rounded py-2 px-5 mt-5 cursor-pointer">
                </form>
            </div>
        </div>
    </div>


</div>