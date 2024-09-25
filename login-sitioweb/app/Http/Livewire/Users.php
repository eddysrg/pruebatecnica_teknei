<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Users extends Component
{

    public $users = [];
    public $editingUser = null;
    public $isOpen = false;

    public function mount()
    {
        $this->users = session()->get('users', []);
    }

    public function fetchUser()
    {
        $response = Http::get('https://randomuser.me/api/');
        $userData = $response->json()['results'][0];

        $newUser = $userData;

        $users = session()->get('users', []);

        $users[] = $newUser;

        session(['users' => $users]);

        $this->users = $users;
    }

    public function selectUser($index)
    {
        $this->editingUser = $this->users[$index];
        $this->editingUser['index'] = $index;
        $this->isOpen = true;
    }

    public function updateUser()
    {
        $this->validate([
            'editingUser.name.title' => 'required|regex:/^[a-zA-Z\s]+$/',
            'editingUser.name.first' => 'required|regex:/^[a-zA-Z\s]+$/',
            'editingUser.name.last' => 'required|regex:/^[a-zA-Z\s]+$/',
            'editingUser.location.city' => 'required|regex:/^[a-zA-Z\s]+$/',
            'editingUser.location.state' => 'required|regex:/^[a-zA-Z\s]+$/',
            'editingUser.location.country' => 'required|regex:/^[a-zA-Z\s]+$/',
            'editingUser.location.postcode' => 'required|regex:/^\d+$/',
            'editingUser.email' => 'required|email',
        ]);

        // Actualizar el array de usuarios en la sesión
        $users = session()->get('users', []);
        $users[$this->editingUser['index']] = $this->editingUser; // Reemplazar con los datos editados
        session(['users' => $users]);

        $this->users = $users; // Refrescar la lista de usuarios

        // Cerrar el modal
        $this->isOpen = false;
        $this->editingUser = null; // Limpiar el usuario en edición
    }

    public function resetForm()
    {
        $this->reset(['editingUser']);
        $this->resetErrorBag();
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.users');
    }
}
