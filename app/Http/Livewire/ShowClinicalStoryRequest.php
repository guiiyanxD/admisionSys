<?php

namespace App\Http\Livewire;

use App\Models\ClinicalStory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowClinicalStoryRequest extends Component
{
    public $clinicalStoriesRequests;
    public $a_paterno;
    public $a_materno;
    public $nombre;

    public $cama;
    public $matricula_titular;
    public $iniciales_titular;
    public $matricula_beneficiario;
    public $iniciales_beneficiario;

    public bool $updateMode = false;

    /*protected array $rules = [
        'nombree' => 'required',

        'titular' => 'required',
//            'regex:/([0-2]+(9|0)+[0-9]+[0-9])+(-)+(((0|5)+[0-9]|(1|6)+[0-2])+([0-3])+([0-9]))+(-)+([A-Z]+[A-Z]+[A-Z])/g',
        'beneficiario' => 'required',
//            'regex:/([0-2]+(9|0)+[0-9]+[0-9])+(-)+(((0|5)+[0-9]|(1|6)+[0-2])+([0-3])+([0-9]))+(-)+([A-Z]+[A-Z]+[A-Z])/g',
        'cama' => 'required',
//            'regex:/([1-3]+[0-5]+[0-9])+(-)+([A-C])/g',
        'nota' => 'required',
    ];*/

    private function format(){
        $this->titular = $this->matricula_titular . '-' . $this->iniciales_titular;
        $this->beneficiario = $this->matricula_beneficiario . '-' . $this->iniciales_beneficiario;
        $this->nombre = $this->a_paterno .' '. $this->a_materno . ' ' . $this->nombre ;

    }

    private function resetInputFields(){
        $this->a_paterno = '';
        $this->a_materno = '';
        $this->nombre = '';
        $this->cama = '';
        $this->matricula_titular = '';
        $this->iniciales_titular = '';
        $this->matricula_beneficiario = '';
        $this->iniciales_beneficiario = '';

    }

    public function store(){
//        $this->format();
//        $this->validate();

        ClinicalStory::create([
            'name' => $this->a_paterno .' '. $this->a_materno . ' ' . $this->nombre,
            'holder_mat' => $this->matricula_titular . '-' . $this->iniciales_titular,
            'beneficiary_mat' => $this->matricula_beneficiario . '-' . $this->iniciales_beneficiario,
            'bed_number' => $this->cama,
            'registrar' => Auth::user()->name,
            'note' => 'Change this note',
        ]);
        $this->resetInputFields();
        session()->flash('message', 'Post Created Successfully.');
    }

    /*public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        ClinicalStory::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }*/

    public function render()
    {
        $this->clinicalStoriesRequests = ClinicalStory::latest()->get();
        return view('livewire.ClinicalStoryRequest.show-clinical-story-request');
    }
}
