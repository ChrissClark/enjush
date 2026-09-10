@extends('layout')

@section('title', 'Perfil de Sustancia')

@section('styles')
@endsection

@section('content')
  <div class="d-flex justify-content-between align-items-center">
    <h1 class="">Perfil de {{$sustancia->nombre}}</h1>
    <div>
      <button class="btn btn-outline-primary btn-sm rounded" type="button" id="uploadPdfBtn">Subir PDF</button>
      <button class="btn btn-outline-success btn-sm rounded" type="button" id="downloadPdfBtn">Descargar PDF</button>
      <input type="file" id="pdfInput" style="display: none;" accept=".pdf" />
    </div>
  </div>

  <section>
    <h2 class="fs-4">Información general del {{$sustancia->nombre}}</h2>
    <p>{{$sustancia->descripcion}}</p>
  </section>
@endsection

@section('scripts')
<script>
  const sustanciaId = {{ $sustancia->id }};
  const pdfInput = document.getElementById('pdfInput');
  const uploadPdfBtn = document.getElementById('uploadPdfBtn');
  const downloadPdfBtn = document.getElementById('downloadPdfBtn');

  // Click en el botón de subir PDF
  uploadPdfBtn.addEventListener('click', function() {
    pdfInput.click();
  });

  // Manejo del cambio de archivo
  pdfInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;

    // Validar que sea PDF
    if (file.type !== 'application/pdf') {
      alert('Por favor selecciona un archivo PDF válido.');
      pdfInput.value = '';
      return;
    }

    // Si ya existe un archivo, preguntar si desea reemplazarlo
    @if($sustancia->pdf_path)
      if (!confirm('Ya existe un archivo PDF. ¿Deseas reemplazarlo?')) {
        pdfInput.value = '';
        return;
      }
    @endif

    // Subir el archivo
    const formData = new FormData();
    formData.append('pdf', file);

    fetch(`/sustancias/${sustanciaId}/uploadPdf`, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('PDF subido correctamente');
        pdfInput.value = '';
        location.reload();
      } else {
        alert('Error: ' + data.message);
      }
    })
    .catch(error => {
      alert('Error al subir el archivo: ' + error);
      console.error('Error:', error);
    });
  });

  // Descargar PDF
  downloadPdfBtn.addEventListener('click', function() {
    fetch(`/sustancias/${sustanciaId}/downloadPdf`)
      .then(response => {
        if (!response.ok) {
          return response.json().then(data => {
            throw new Error(data.message);
          });
        }
        return response.blob();
      })
      .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `{{ $sustancia->nombre }}.pdf`;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);
      })
      .catch(error => {
        alert('Error: ' + error.message);
        console.error('Error:', error);
      });
  });
</script>
@endsection
