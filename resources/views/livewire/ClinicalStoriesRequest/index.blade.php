<div>
    @if(!$update_mode)
        @include('livewire.clinicalStoriesRequest.create')
    @else
        @include('livewire.clinicalStoriesRequest.update')
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <label for="criterio">
                        {{__('Buscar')}}
                        <input type="text" name="criterio" wire:model="criterio">
                    </label>
                </div>
                <div class="col">
                    <button class="btn btn-info" wire:click.prevent="getPDF()">Imprimir</button>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Titular</th>
                        <th>Beneficiario</th>
                        <th>#Cama</th>
                        <th>Nota</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($clinicalStoriesRequest->count() > 0)
                        @foreach($clinicalStoriesRequest as $item )
                            <tr>
                                <td> {{ $item->id }}</td>
                                <td> {{ $item->name }}</td>
                                <td> {{ $item->holder_mat }}</td>
                                <td> {{ $item->beneficiary_mat }}</td>
                                <td> {{ $item->bed_number }}</td>
                                <td> {{ $item->note }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-success" wire:click="edit({{$item->id}})">Editar</button>
                                    <button class="btn btn-outline-danger" wire:click="delete({{$item->id}})">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-warning justify-content-center">
                            <h3 class="text-white text-center">
                                No existen coincidencias
                            </h3>
                        </div>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            paginacion
        </div>
    </div>
</div>
