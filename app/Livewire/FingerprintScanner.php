<?php

namespace App\Livewire;

use Livewire\Component;

class FingerprintScanner extends Component
{
    public $fingerprint;

    public function captureFingerprint()
    {
        $this->dispatchBrowserEvent('capture-fingerprint');
    }

    public function render()
    {
        return view('livewire.fingerprint-scanner');
    }
}
