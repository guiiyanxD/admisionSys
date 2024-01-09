<div>
    <div class="card">
        <div class="card-header">
            <h4>{{ __('Agregar historia') }}</h4>
        </div>
        <div class="card-body">
            @if(session()->has('message') )
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if($updateMode)
                @include('$livewire.ClinicalStoryRequest.update')
            @else
                @include('livewire.ClinicalStoryRequest.create')
            @endif

        </div>
    </div>


    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Matricula Titular</th>
                <th>Matricula Beneficiario</th>
                <th>#Cama</th>
                <th>Nota</th>
                <th width="200px">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clinicalStoriesRequests as $item )
                <td> {{ $item->id }}</td>
                <td> {{ $item->name }}</td>
                <td> {{ $item->holder_mat }}</td>
                <td> {{ $item->beneficiary_mat }}</td>
                <td> {{ $item->bed_number }}</td>
                <td> {{ $item->note }}</td>
                <td>
                    <button class="btn"> Editar</button>
                    {{--                    <button type="button" wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm">Delete</button>--}}
                </td>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
