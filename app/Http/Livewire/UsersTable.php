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
    public $searchId = '';
    public $searchName = '';
    public $searchEmail = '';
    public $searchCreatedAt = '';
    
    public function render()
    {
        $users = User::query()
            ->when($this->searchId, function ($query) {
                $query->where('id', $this->searchId);
            })
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%'.$this->searchName.'%');
            })
            ->when($this->searchEmail, function ($query) {
                $query->where('email', 'like', '%'.$this->searchEmail.'%');
            })
            ->when($this->searchCreatedAt, function ($query) {
                $query->whereDate('created_at', $this->searchCreatedAt);
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.users-table', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function performSearch()
    {
        $this->searchTerm = $this->search;
        $this->resetPage(); 
    }
}
