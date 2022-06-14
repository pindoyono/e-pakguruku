@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">Settings</h4>
              </div>
              @if($count==0)
              <div class="col-md-12">
                  <div class="pull-right">
                      <a class="btn btn-sm btn-info" href="{{ route('settings1.create') }}"> Tambah Setting</a>
                    </div>
                </div>
                @endif
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            @foreach ($data as $key => $setting)
            <div class="col-md-12">
                <div class="table-responsive table-sales">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    NO
                                </td>
                                <td>
                                    SETIING
                                </td>
                                <td>Data</td>
                                <td class="text-right">
                                    Value
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Tanggal Berita Acara Atas
                                </td>
                                <td>{{$setting->tgl_berita_acara_atas }}</a></td>
                                <td class="text-right">
                                    <a href="{{route('settings.edit', $setting)}}">
                                        <button class="btn btn-info btn-round btn-sm">
                                            edit
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>
</div>

@endsection



@push('body-scripts')
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>



@endpush
