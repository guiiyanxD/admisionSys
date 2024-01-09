<?php

namespace App\Http\Livewire;

use App\Events\ClinicalStoryRequirementEvent;
use App\Models\ClinicalStory;
use App\Models\RequestStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
//use Barryvdh\DomPDF

class ClinicalStoriesRequest extends Component
{
    public $a_paterno, $a_materno, $nombre, $cama, $matricula_titular,
        $matricula_beneficiario, $observacion, $clinicalStoriesRequest,
        $clinical_request_id;

    public $criterio = '';


    public $update_mode = false;
    public $request_mode = true;


    public function recibirHistoriasClinicas(){
        $this->request_mode = !$this->request_mode;
    }

    public function resetInputField(){
        $this->a_paterno = ''; $this->a_materno = ''; $this->nombre = '';
        $this->cama = '';  $this->matricula_titular = ''; $this->matricula_beneficiario = '';
        $this->observacion = '';
    }


    public function getPDF(){
//        $name = 'Juanito Perez';
		$pdf = PDF::loadView('livewire.ClinicalStoriesRequest.pdf', compact($this->clinicalStoriesRequest));
		return $pdf->stream( Carbon::today()->toDateString().'.pdf');
	}

    public function dataValidation(){
        $this->validate(
            [
                'nombre' => 'required',
                'a_paterno' => 'max:50',
                'a_materno' => 'max:50',
                'matricula_titular' => ['required', 'regex:/(19|20)[0-9][0-9][0-1|5-6][0-9][0-9][0-9]-[A-Z][A-Z][A-Z]/'],
                'matricula_beneficiario' => ['nullable','regex:/(19|20)[0-9][0-9][0-1|5-6][0-9][0-9][0-9]-[A-Z][A-Z][A-Z]/'],
                'cama' => ['required', 'regex:/[1-3][0-5][0-9]-[A-C]/'],
            ],
            [
                'nombre' => 'Nombre muy largo',
                'a_paterno' => 'Apellido paterno muy largo',
                'a_materno' => 'Apellido materno',
                'matricula_titular' => 'Matricula con formato: 19980918-AZW',
                'matricula_beneficiario' => 'Matricula con formato: 19980918-AZW',
                'cama' => 'Asegurese que el numero de cama este bien escrito',
            ]
        );
    }

    public function store(){
        $this->dataValidation();
        $request = ClinicalStory::create([
            'name' => $this->nombre, // . ' '. $this->a_paterno . ' '. $this->a_materno ,
            'holder_mat' => $this->matricula_titular,
            'beneficiary_mat' => $this->matricula_beneficiario,
            'bed_number' => $this->cama,
            'dad_name' => $this->a_paterno,
            'mom_name' =>$this->a_materno,
        ]);

        ClinicalStoryRequirementEvent::dispatch($request,1, $this->observacion);

        session()->flash('message', 'Post Created Successfully.');
        $this->resetInputField();
    }

    public function edit($id){

        $clinical_story = ClinicalStory::findOrFail($id);
        $this->clinical_request_id = $clinical_story->id;
        $this->nombre =  $clinical_story->name;
        $this->matricula_titular = $clinical_story->holder_mat;
        $this->matricula_beneficiario = $clinical_story->beneficiary_mat;
        $this->cama = $clinical_story->bed_number;
        $this->observacion = $clinical_story->note;

        $this->update_mode = true;

    }

    public function update(){
        ClinicalStory::where('id', $this->clinical_request_id)->update([
            'name' => $this->nombre . ' ' .  $this->a_paterno . ' ' . $this->a_materno,
            'holder_mat' => $this->matricula_titular,
            'beneficiary_mat' => $this->matricula_beneficiario,
            'bed_number' => $this->cama,
            'registrar' => Auth::user()->name,
            'note' => $this->observacion . '.',
            'date' => Carbon::now()->startOfDay(),
        ]);
        $this->update_mode = false;
        $this->resetInputField();
    }

    public function cancel(){
        $this->update_mode = false;
        $this->resetInputField();
    }

    public function delete($id)
    {
        ClinicalStory::findOrFail($id)->delete();
    }

    public function render()
    {
        $this->clinicalStoriesRequest = ClinicalStory::where(
            [
                ['holder_mat', 'like', '%'.$this->criterio.'%'],
//                ['date','=', Carbon::today('America/La_Paz')->startOfDay()],
            ]
        )->get();
        return view('livewire.ClinicalStoriesRequest.clinical-stories-request');
    }
}
