@extends('layout')

@section('title', 'Acerca de Nosotros')

@section('styles')
  <style>
    h1, h2, h3, h4, h5, h6 {
      color: #007bff;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection

@section('content')
  <h1 class="">Sustancias</h1>
  <!--  -->
  <section class="my-3">
    <h2 class="fs-3">Tabla de Sustancias</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
    <table id="myTable" class="display">
        <thead>
          <tr>
            <th>Column 1</th>
            <th>Column 2</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
          </tr>
          <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
          </tr>
        </tbody>
    </table>
  </section>
@endsection

@section('scriptsTables')
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>$("#myTable").DataTable();</script>
@endsection
