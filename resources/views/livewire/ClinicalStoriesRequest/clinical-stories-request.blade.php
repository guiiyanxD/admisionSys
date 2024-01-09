<div>

    @if($request_mode)
        <div class="mb-1 mt-1" wire:click.prevent="recibirHistoriasClinicas()">
            <button class=" btn btn-info">
                Recibir historias
            </button>
        </div>
        @include('livewire.clinicalStoriesRequest.index')
    @else
        <div class="mb-1 mt-1" wire:click.prevent="recibirHistoriasClinicas()">
            <button class=" btn btn-danger">
                Solicitar historias
            </button>
        </div>
        @include('livewire.clinicalStoriesRequest.receive')
    @endif



</div>
