<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $searchTerm = '';

    public function render()
    {
        $users = User::search($this->searchTerm)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.users-table', compact('users'));
    }

    public function performSearch()
    {
        $this->searchTerm = $this->search;
    }
}
