<!-- resources/views/livewire/exitModal.blade.php -->
<div>
    <div id="exitModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exitModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exitModalLabel">¿Estás seguro de que quieres salir?</h5>
                </div>
                <div class="modal-body">
                    <p>Si sales de esta página, los cambios no se guardarán.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, quedarme</button>
                    <button type="button" class="btn btn-primary" id="confirmExit">Sí, salir</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const exitModal = new bootstrap.Modal(document.getElementById('exitModal'));
        
        function hasCartData() {
            return localStorage.getItem('cantidadDisponible') || 
                   localStorage.getItem('carrito') || 
                   localStorage.getItem('puntosDisponibles');
        }

        let showModalOnExit = false;

        window.addEventListener("beforeunload", (event) => {
            if (hasCartData() && !showModalOnExit) {
                exitModal.show();
                showModalOnExit = true;
                event.preventDefault();
                event.returnValue = ''; 
            }
        });

        document.getElementById("confirmExit").addEventListener("click", () => {
            localStorage.removeItem('cantidadDisponible');
            localStorage.removeItem('carrito');
            localStorage.removeItem('puntosDisponibles');
            exitModal.hide();
            window.location.href = 'about:blank';  
        });
    });
    </script>
</div>
