<!-- resources/views/livewire/fingerprint-scanner.blade.php -->
<div>
    <button wire:click="captureFingerprint">Capturar Huella Digital</button>

    <script src="https://unpkg.com/@digitalpersona/core"></script>
    <script src="https://unpkg.com/@digitalpersona/authentication"></script>
    <script>
        window.addEventListener('capture-fingerprint', event => {
            // Llama a la función del SDK de JavaScript para capturar la huella
            captureFingerprintFromDevice().then(fingerprint => {
                @this.set('fingerprint', fingerprint);
            });
        });

        async function captureFingerprintFromDevice() {
            // Inicializa los componentes de DigitalPersona
            const { BioSample } = window["@digitalpersona/core"];
            const { FingerprintsAuth } = window["@digitalpersona/authentication"];

            // Lógica para interactuar con el lector de huellas y obtener la huella
            const api = new FingerprintsAuth();
            const samples = await api.capture();

            // Devuelve los datos de la huella
            return samples.map(sample => sample.data).join(',');
        }
    </script>
</div>
