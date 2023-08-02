<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" name="search" class="form-control" placeholder="Buscar usuario por nombre o email">
        </div>
        @if ($users->count())
    
            <div class="card-body">
                <table class="table striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->getRoleNames()->implode(', ')}}</td>
                            <td width="10px"><a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a></td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
       
            
        @else
         <div class="card-body bg-warning">
          <strong>No se encontraron coincidencias </strong> 
         </div>   
        
        @endif
    </div>
</div>
