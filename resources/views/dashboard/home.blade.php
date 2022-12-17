@extends('layout.app')
@section('titulo_pagina', 'Painel')
@section('content')

    <div class="row">
        <div class="col">
            <div style="width:600px;">
                <canvas id="myChart"></canvas>
              </div>
        </div>
    </div>



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



@endsection
