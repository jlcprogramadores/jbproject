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
    <div class="d-flex flex-row">
        <div class="p-2">
            <div class="input-group input-group-sm">
                <label class="input-group-text size">Mostrar:</label>
                <select wire:model="perPage" class="form-select">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
        </div>
        <div class="p-2">
            <div class="input-group input-group-sm">
                <label class="input-group-text size">Orden por:</label>
                <select wire:model="orderBy" class="form-select">
                    <option value="id">no</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Sign Up Date</option>
                </select>
            </div>
        </div>
        <div class="p-2">
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
    <table class="table table-sm table-striped table-auto w-full mb-6">
        <thead>
            <tr class="filters">
                <th class="px-1 py-1">
                    <input wire:model="searchId" type="text" class="form-control" placeholder="No.">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="searchName" type="text" class="form-control" placeholder="Nombre">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="searchEmail" type="text" class="form-control" placeholder="Correo">
                </th>
                <th class="px-1 py-1">
                    <input wire:model="es_activo" type="text" class="form-control" placeholder="Es Activo">
                </th>
                <th class="th-azul">Roles</th>
                @can('usuarios.acciones')
                    <th class="th-azul">Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php
                $i = ($users->currentPage() - 1) * $users->perPage() + 1;
            @endphp
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $i++ }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    @if ($user->es_activo)
                                                <td><p class="badge bg-success">Activado</p></td>
                                            @else
                                                <td><p class="badge bg-danger">Innactivo</p></td>
                                            @endif
                                            {{-- <td>{{$user->roles}}</td> --}}
                                            @if (isset($user->roles[0]))
                                            <?php
                                                $iter = 0;
                                                $rolecito = '';
                                            ?>
                                            @foreach($user->roles as $rol)
                                                <?php
                                                    if ($iter == 0) {
                                                        $rolecito = $rolecito . $rol->name;
                                                    }else{
                                                        $rolecito = $rolecito . ', ';
                                                        $rolecito = $rolecito . $rol->name;
                                                    }
                                                    $iter ++;
                                                ?>
                                                @endforeach
                                                <td>{{$rolecito}}</td>
                                            @else
                                                <td>Sin Rol</td>
                                            @endif
                    @can('usuarios.acciones')
                        <td>
                            <form action="{{ route('usuarios.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary " href="{{ route('usuarios.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>                            
                                @csrf
                                @method('DELETE')  
                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
</div>