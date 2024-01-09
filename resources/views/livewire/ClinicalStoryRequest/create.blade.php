<div>
    <form>
        @csrf
        <h5>
            {{__('Nombre')}}
        </h5>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Paterno</span>
            <input type="text"  wire:model="a_paterno" name="a_paterno" class="form-control"  >
            <span class="input-group-text" id="inputGroup-sizing-default">Materno</span>
            <input type="text" wire:model="a_materno" name="a_materno" class="form-control" >
            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
            <input type="text" wire:model="nombre" name="nombre" class="form-control" >
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Cama</span>
            <input type="number" wire:model="cama" name="cama" maxlength="8" class="form-control" aria-label="Sizing example input" >
        </div>
        <h5>
            {{__('Titular')}}
        </h5>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Matricula del titular</span>
            <input type="number" wire:model="matricula_titular" name="matricula_titular" maxlength="8" class="form-control" aria-label="Sizing example input" >
            <span class="input-group-text" id="inputGroup-sizing-default">-</span>
            <input type="text" wire:model="iniciales_titular" name="iniciales_titular" maxlength="3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <h5>
                {{__('Beneficiario')}}
            </h5>

            <div class="form-check">
                <input  class="form-check-input" id="ableBenef" type="checkbox" value="Si" >
                <label  class="form-check-label" for="ableBenef"> Si</label>
            </div>
        </div>

        <div class="input-group mb-3" >
            <span class="input-group-text" >Matricula del beneficiario</span>
            <input type="number" wire:model="matricula_beneficiario" name="matricula_beneficiario" maxlength="8" class="form-control" id="beneficiario1" aria-label="Sizing example input" disabled>
            <span class="input-group-text" >-</span>
            <input type="text" wire:model="iniciales_beneficiario" name="iniciales_beneficiario" maxlength="3" class="form-control" id="beneficiario2" aria-label="Sizing example input" disabled >
        </div>

        <div class="input-group" >
            <button wire:click.prevent="store" class="btn btn-success"> {{__('Agregar')}} </button>
        </div>


    </form>
</div>
