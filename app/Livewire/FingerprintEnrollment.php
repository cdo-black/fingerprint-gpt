<?php
// app/Http/Livewire/FingerprintEnrollment.php
namespace App\Http\Livewire;

use Livewire\Component;

class FingerprintEnrollment extends Component
{
    public $fingerprint;

    public function enrollFingerprint()
    {
        $this->dispatch('enroll-fingerprint');
    }

    public function updateFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    public function render()
    {
        return view('livewire.fingerprint-enrollment');
    }
}
