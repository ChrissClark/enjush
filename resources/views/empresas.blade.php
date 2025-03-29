@extends('layout')

@section('title', 'Empresas')

@section('styles')
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/select/3.0.0/css/select.dataTables.css" rel="stylesheet">
  <link href="https://code.highcharts.com/css/highcharts.css" rel="stylesheet">
@endsection

@section('content')
  <section class="">
    <div id="demo-output" style="margin-bottom: 1em;" class="chart-display"></div>
    
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="">Empresas</h2>
      <div>
        <button class="btn btn-outline-primary btn-sm rounded" type="button" onclick="modalGet('{{route('empresas.create')}}', 'Crear empresa')">Agregar Empresa</button>
      </div>
    </div>
    <div class="table-responsive">
      <table id="Empresas" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>NRA</th>
            <th>Sector</th>
            <th>Subsector</th>
            <th>Ubicación</th>
            <th class="text-center">Evaluaciones</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($empresas as $empresa)
            <tr>
              <td>{{$empresa->nombre}}</td>
              <td>{{$empresa->nras->last()->NRA}}</td>
              <td>{{$empresa->subsector->sector->nombre ?? "Hola"}}</td>
              <td>{{$empresa->subsector->nombre}}</td>
              <td>{{$empresa->ubicacion()}}</td>
              <th class="text-center"><a href="{{route('evaluacionEmpresas', $empresa->id)}}">{{$empresa->evaluaciones->count()}}</a></th>
              <td class="text-center">
                <div class="d-flex justify-content-center">              
                  <button class="btn btn-outline-success btn-sm rounded me-2" type="button" onclick="modalGet('{{route('empresas.edit', $empresa->id)}}', 'Editar Empresa')"><i class="far fa-edit"></i></button>
                  <form action="{{route('empresas.destroy', $empresa->id)}}" class="float-right" method="post">
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></button>
                    @csrf
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
@endsection

@section('scripts')
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/select/3.0.0/js/dataTables.select.js"></script>
  <script src="https://cdn.datatables.net/select/3.0.0/js/select.dataTables.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  
  <script>

    const table = new DataTable('#Empresas');
 
    // Create chart
    const chart = Highcharts.chart('demo-output', {
      chart: {
        type: 'pie',
        styledMode: true,
        backgroundColor: '#f4f4f9',
      },
      title: {
        text: 'Empresas'
      },
      series: [{
        data: chartData(table)
      }
      ]
    });
    
    // On each draw, update the data in the chart
    table.on('draw', function () {
        chart.series[0].setData(chartData(table));
    });
    
    function chartData(table) {
        var counts = {};
    
        // Count the number of entries for each position
        table
            .column(4, { search: 'applied' })
            .data()
            .each(function (val) {
                if (counts[val]) {
                    counts[val] += 1;
                }
                else {
                    counts[val] = 1;
                }
            });
    
        return Object.entries(counts).map((e) => ({
            name: e[0],
            y: e[1]
        }));
    }
  </script>
@endsection
