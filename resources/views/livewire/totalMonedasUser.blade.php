<!-- Payment Methods modal -->
<div class="modal fade" id="paymentMethods" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-6">
          <h4 class="mb-2">Monedas que tienes!</h4>
          <p>placeholder</p>
        </div>
        @foreach ($totalMonedasUser as $moneda)
        <div class="d-flex justify-content-between align-items-center border-bottom py-4 mb-4">
          <div class="d-flex gap-4 align-items-center">
            <img src="{{ $moneda['imagen_url'] }}" class="img-fluid w-px-50 h-px-30 rounded" alt="visa-card">
            <h6 class="m-0">{{ $moneda['nombre'] }}</h6>
          </div>
          <p class="m-0">{{ $moneda['puntos'] }}</p> <!-- Mostrado en todas las resoluciones -->
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<!-- / Payment Methods modal -->
