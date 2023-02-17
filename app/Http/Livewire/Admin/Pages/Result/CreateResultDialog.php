<?php

namespace App\Http\Livewire\Admin\Pages\Result;

use Livewire\Component;
use App\Models\Result;
use Illuminate\Support\Carbon;

class CreateResultDialog extends Component
{
    public bool $initializing = true;
    public array $prize = [];
    public $date = "";

    protected array $rules = [
        'prize.periode' =>'required|numeric|integer',
        'prize.first' => 'required|numeric',
        'prize.second' => 'required|numeric',
        'prize.third' => 'required|numeric',
    ];
    protected array $validationAttributes = [
        'prize.periode' =>'periode',
        'prize.first' => 'first',
        'prize.second' => 'second',
        'prize.third' => 'third',
    ];

    public function init()
    {
        $dt = Carbon::now();
        $dt->between($dt->createFromTimeString('00:00'),$dt->createFromTimeString('12:00'));
        $periode = Result::max('periode')+1;

        $this->date = $dt->format('Y-m-d');
        $this->prize['periode'] = $periode;
        $this->prize['first'] = rand(100000,999999);
        $this->prize['second'] = rand(100000,999999);
        $this->prize['third'] = rand(100000,999999);

        $this->initializing = false;
    }

    public function submit()
    {
        $this->validate($this->rules, [], $this->validationAttributes);

        try {
            Result::create([
                'periode' => $this->prize['periode'],
                'first' => $this->prize['first'],
                'second' => $this->prize['second'],
                'third' => $this->prize['third'],
                'starter' => random_int(1000, 9999) . "," . random_int(1000, 9999) . "," . random_int(1000, 9999) .  "," . random_int(1000, 9999) . "," . random_int(1000, 9999) . "," .random_int(1000, 9999),
                'consolation' => random_int(1000, 9999) . "," . random_int(1000, 9999) . "," . random_int(1000, 9999) .  "," . random_int(1000, 9999) . "," . random_int(1000, 9999) . "," .random_int(1000, 9999),
                'complete' => 0,
                'created_at' => Carbon::parse($this->date),
                'updated_at' => Carbon::now()
            ]);
        } catch (\Exception $e) {
            return $this->dispatchBrowserEvent('flash', ['type' => 'error', 'message' => 'Terjadi Kesalahan Mohon Ulangi Kembali!']);
        }

        $this->emit('refreshLivewireDatatable');
        $this->dispatchBrowserEvent('flash', ['type' => 'success', 'message' => 'Berhasil Input Prize!']);
        $this->dispatchBrowserEvent('close-create-dialog');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.pages.result.create-result-dialog');
    }
}