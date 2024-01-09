<div class="card">
    <div class="card-header">
        <h5>Agregar Solicitud</h5>
    </div>
    <div class="card-body">
        <form>
            @csrf

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="a_paterno">Apellido Paterno</label>
                    <input type="text"  wire:model="a_paterno" id="a_paterno" class="form-control" autofocus >
                </div>
                <div class="form-group col-md-4">
                    <label for="a_materno">Apellido Materno</label>
                    <input type="text" wire:model="a_materno" id="a_materno" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Nombres</label>
                    <input type="text" wire:model="nombre" id="nombre" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="matricula_titular">Matricula Titular</label>
                    <input type="text" wire:model="matricula_titular" id="matricula_titular" maxlength="12" class="form-control" >
                    @error('matricula_titular') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="matricula_beneficiario">Matricula Beneficiario</label>
                    <input type="text" wire:model="matricula_beneficiario" id="matricula_beneficiario" maxlength="12" class="form-control" >
                    @error('matricula_beneficiario') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="cama">Numero de cama</label>
                    <input type="text" wire:model="cama" id="cama" maxlength="5" class="form-control" >
                    @error('cama') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group col-md-7">
                    <label for="observacion">Observacion</label>
                    <input type="text" wire:model="observacion" name="observacion" placeholder=" 'Segunda historia',  'Solo internacion',  'Pedir a guaracachi'..." class="form-control" id="observacion">
                </div>
            </div>

            <div class="form-row" >
                <button wire:click.prevent="update()" class="btn btn-success"> {{__('Actualizar')}} </button>
                <button wire:click.prevent="cancel()" class="btn btn-danger"> {{__('Cancelar')}} </button>

            </div>

        </form>
    </div>
</div>

