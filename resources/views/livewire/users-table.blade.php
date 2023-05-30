<div class="text-dark" >
    <style>
    .btn-check:checked+.btn-outline-secondary {
        background-color:#ced4da;
        color: #212529;
        border: 1px #ced4da;
    }
    .btn-outline-secondary {
        border-color: #ced4da;
    }
    .size {
        max-width: 100%;
        width: auto;
    }
    .filters th input {
        /* border: none; */
        border-color: #cbe4ff;
        background-color: transparent;
        color: #007bff;

    }
    .filters th input::placeholder {
        color: #007bff;
        background-color: transparent;

    }
    .form-control[readonly]{
        background-color: transparent;
    }
    </style>    
    <div class="row d-flex align-items-center size">
        <div class="col-sm-2" style="width: 175px;">
            <div class="input-group input-group-sm">
                <label class="input-group-text">Mostrar:</label>
                <select wire:model="perPage" class="form-select">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="input-group input-group-sm">
                <label class="input-group-text">Orden por:</label>
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
                <label class="btn btn-outline-secondary color" for="asc">
                    <i class="fas fa-arrow-up"></i>
                </label>
            
                <input type="radio" wire:model="orderAsc" class="btn-check" name="order" id="desc" value="0">
                <label class="btn btn-outline-secondary color" for="desc">
                    <i class="fas fa-arrow-down"></i>
                </label>
            </div>
        </div>
    </div>
    <table class="table table-striped table-auto w-full mb-6">
        <thead>
            <tr class="filters">
                <th class="px-1 py-1">
                    <input wire:model="searchId" type="text" class="form-control" placeholder="ID">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="searchName" type="text" class="form-control" placeholder="Name">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="searchEmail" type="text" class="form-control" placeholder="Email">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="searchCreatedAt" type="text" class="form-control" placeholder="Created At">
                </th>
                <th class="px-1 py-1">
                    <input tabindex="-1" type="text" style="pointer-events: none; border: none;" class="form-control" placeholder="Acciones" readonly>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('usuarios.destroy',$user->id) }}" method="POST">
                            @can('usuarios.show')
                            <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                            @endcan
                            @can('usuarios.edit')
                            <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>    
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('usuarios.destroy')    
                            <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>