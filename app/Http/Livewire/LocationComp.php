<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Location;
use Intervention\Image\Facades\Image;
use App\Models\Voiture;
use App\Models\TypeVoiture;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class LocationComp extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = "bootstrap";
    public $search = "";
    public $filtreVoiture = "", $filtreClient = "";
    public $addLocation = [];
    public $inputFileIterator = 0;
    public $addPhoto = null;
    public $editLocation = [];
    public $editPhoto = null;
    public $inputEditFileIterator = 0;
    public $editHasChanged;
    public $editLocationOldValues = [];


    /**protected function rules () {
        return [
            
            "editVoiture.titre" => ["required", Rule::unique("voitures", "titre")->ignore($this->editVoiture["id"])],
            "editVoiture.matricule" => ["required", Rule::unique("voitures", "matricule")->ignore($this->editVoiture["id"])],
            
            "editVoiture.modele" => "required",
            "editVoiture.kilometrage" => "required",
            "editVoiture.nbrPlace" => "required",
            "editVoiture.description" => "required",
            "editVoiture.prix" => "required",
            'editVoiture.type_voiture_id' => 'required|exists:App\Models\TypeVoiture,id',

        ];
    } **/

    public function render()
    {
        Carbon::setLocale("fr");


        $locationQuery = Location::query();

        /**if($this->editVoiture != []){
            $this->showUpdateButton();
        }**/
        if ($this->search != "") {
            $this->resetPage();
            $locationQuery->where("titre", "LIKE", "%" . $this->search . "%")
                ->orWhere("nom", "Like", "%" . $this->search . "%");
        }
        if ($this->filtreVoiture != "") {
            $locationQuery->where("voiture_id", $this->filtreVoiture);
        }

        if ($this->filtreClient != "") {
            $locationQuery->where("client_id", $this->filtreClient);
        }
        /**if($this->editVoiture != []){
            $this->showUpdateButton();
        }**/
        return view('livewire.locations.index', [
            "locations" => $locationQuery->latest()->paginate(5),
            "voitures" => Voiture::orderBy("titre", "ASC")->get(),
            "clients" => Client::orderBy("nom", "ASC")->get()
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function showAddLocationModal()
    {
        $this->resetValidation();
        $this->addLocation = [];
        $this->addPhoto = null;
        $this->inputFileIterator++;
        $this->dispatchBrowserEvent("showModal");
    }

    public function closeModal()
    {

        $this->dispatchBrowserEvent("closeModal");
    }

    public function ajoutLocation()
    {

        $validateArr = [
            "addLocation.client" => "required",
            "addLocation.voiture" => "required",
            "addLocation.dateDebut" => "required",
            "addLocation.dateFin" => "required",

        ];

        $validatedData = $this->validate($validateArr);
        $location = Location::create([
            "client_id" => $validatedData["addLocation"]["client"],
            "voiture_id" => $validatedData["addLocation"]["voiture"],
            "dateDebut" => $validatedData["addLocation"]["dateDebut"],
            "dateFin" => $validatedData["addLocation"]["dateFin"],
        ]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Vehicule ajouté avec succès!"]);

        $this->closeModal();
    }
}
