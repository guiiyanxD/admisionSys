<div>
    <div class="card">
        <div class="card-header">
            <div>
                <h4>
                    Recibir Historias Clinicas
                </h4>
            </div>
        </div>
        <div class="card-body">
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Matricula Titular</th>
                        <th>Matricula Beneficiario</th>
                        <th>#Cama</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clinicalStoriesRequest as $item )
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->name }}</td>
                            <td> {{ $item->holder_mat }}</td>
                            <td> {{ $item->beneficiary_mat }}</td>
                            <td> {{ $item->bed_number }}</td>
                            <td>

{{--                                <button type="button" class="btn btn-outline-success" wire:click="edit({{$item->id}})"> Editar </button>
                                <button class="btn btn-danger" wire:click="delete({{$item->id}})">Eliminar</button>--}}
                                <button class="btn btn-success">
                                    Recibir
                                </button>
                                <select name="" id="">
                                    <option value="1"  selected>Recibida</option>
                                    <option value="2" >No Recibida</option>
                                    <option value="3" >Pendiente</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            paginacion
        </div>
    </div>
</div>
