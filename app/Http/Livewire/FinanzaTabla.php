<?php

namespace App\Http\Livewire;

use App\Models\Finanza;
use Livewire\Component;
use Livewire\WithPagination;

class FinanzaTabla extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $orderBy = 'id';
    public $orderAsc = true;
    // nombres de los inputs
    public $no = '';
    public $fecha_entrada = '';

    public function render()
    {
        $finanzas = Finanza::query()
            ->when($this->no, function ($query) {
                $query->where('id', $this->no);
            })
            ->when($this->fecha_entrada, function ($query) {
                $query->where('fecha_entrada', 'like', '%'.$this->fecha_entrada.'%');
            })

            // ->when($this->searchEmail, function ($query) {
            //     $query->where('email', 'like', '%'.$this->searchEmail.'%');
            // })
            // ->when($this->searchCreatedAt, function ($query) {
            //     $query->whereDate('created_at', $this->searchCreatedAt);
            // })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.finanza-tabla', compact('finanzas'))
            ->with('i', (request()->input('page', 1) - 1) * $finanzas->perPage());
    }
}
