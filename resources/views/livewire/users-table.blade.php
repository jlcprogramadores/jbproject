<div class="text-dark" >
    <style>
        .btn-group-toggle .btn input[type="radio"]:checked + label {
            border-color: #ced4da !important;
        }
        .custom-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .custom-primary-border {
            border-color: #007bff;
        }
    </style>    
    <div class="row d-flex align-items-center">
        <div class="col-sm-2" style="width: 175px;">
            <div class="input-group input-group-sm">
                <label class="input-group-text custom-primary">Mostrar:</label>
                <select wire:model="perPage" class="form-select">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input wire:model.lazy="search" type="text" class="form-control" placeholder="Buscar">
                <button class="btn btn-outline-primary" type="button" wire:click="performSearch">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="input-group input-group-sm">
                <label class="input-group-text custom-primary">Orden por:</label>
                <select wire:model="orderBy" class="form-select">
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Sign Up Date</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2" style="width: 150px;">
            <div class="btn-group btn-group-sm" role="group" aria-label="Orden">
                <input type="radio" wire:model="orderAsc" class="btn-check" name="order" id="asc" value="1">
                <label class="btn btn-outline-primary" for="asc">Ascendente</label>
        
                <input type="radio" wire:model="orderAsc" class="btn-check" name="order" id="desc" value="0">
                <label class="btn btn-outline-primary" for="desc">Descendente</label>
            </div>
        </div>
    </div>
    <table class="table table-striped table-auto w-full mb-6">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>