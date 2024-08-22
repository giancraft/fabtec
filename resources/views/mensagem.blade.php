@if (session('toast'))
    @php
        $toast = session('toast');
    @endphp
    <div id="toast-message" class="alert alert-{{ $toast['type'] }} alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; right: 10px; max-width: 300px; min-width: 150px; z-index: 1050;">
        {{ $toast['message'] }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        setTimeout(function() {
            var toastMessage = document.getElementById('toast-message');
            if (toastMessage) {
                toastMessage.classList.remove('show');
                toastMessage.classList.add('fade');
                setTimeout(function() {
                    toastMessage.remove();
                }, 150); // Tempo para remover o elemento depois da animação
            }
        }, 3000); // Tempo em milissegundos para mostrar a mensagem (5 segundos)
    </script>
@endif