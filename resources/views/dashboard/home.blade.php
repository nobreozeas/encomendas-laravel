@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Painel</h1>
</div>

    <div class="row">
        <div class="col">
            <div style="width:600px;">
                <canvas id="myChart"></canvas>
              </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Jun', 'Jul'],
        datasets: [{
          label: 'Encomendas',
          data: [12000, 19000, 3456, 5987, 2313, 3654],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>

@endpush
