@extends('layouts/app')

@section('pageTitle', 'Resource Report')

@section('content')
  <div class="container float-center">
    <div class="container header">
      <i class="float-right fas fa-info-circle fa-2x i-symbol"></i>

      <h1>Resource Report</h1>

      <table class="table resource-report">
        <tr id="resource-report-header">
          <th>Primary Function #</th>
          <th>Primary Function</th>
          <th>Total Resources</th>
        </tr>
        <tbody>
          @php($total = 0) <!-- create total variable -->
            @foreach ($report as $rep)
              <tr>
                <td>{{$rep->id}}</td>
                <td>{{$rep->description}}</td>
                <td>{{$rep->total}}</td>
                    <? $total += $rep->total ?> <!-- sum all resource count -->
              </tr>
            @endforeach
              <tr id="resource-report-header">
                <td></td>
                <td> <b>Total</b> </td>
                <td> <b>{{$total}}</b> </td> <!-- display total -->
              </tr>
        </tbody>
      </table>
    </div>
  </div>

@endsection
