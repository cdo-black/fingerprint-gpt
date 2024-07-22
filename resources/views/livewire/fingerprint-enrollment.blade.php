<!-- resources/views/livewire/fingerprint-enrollment.blade.php -->
<div>
    <button wire:click="enrollFingerprint">Registrar Huella Digital</button>

    <script src="https://unpkg.com/@digitalpersona/core"></script>
    <script src="https://unpkg.com/@digitalpersona/enrollment"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('enroll-fingerprint', function () {
                enrollFingerprintFromDevice().then(fingerprint => {
                    Livewire.dispatch('updateFingerprint', fingerprint);
                });
            });
        });

        async function enrollFingerprintFromDevice() {
            // Inicializa los componentes de DigitalPersona
            const { BioSample } = window["@digitalpersona/core"];
            const { Enrollment } = window["@digitalpersona/enrollment"];

            try {
                const api = new Enrollment(/* API configuration */);
                const samples = await api.enroll(/* user credentials and other params */);

                // Devuelve los datos de la huella
                return samples.map(sample => sample.data).join(',');
            } catch (error) {
                console.error('Error enrolling fingerprint:', error);
                return null;
            }
        }
    </script>
</div>
