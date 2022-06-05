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
                <h4 class="card-title">List Pengguna</h4>
              </div>
              <div class="card-title col-md-12">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <br>
                        <input clas="col-sm-5" type="file" name="file" class="form-control">
                    </div>

                    <button class="btn btn-sm btn-success">Import User Data</button>
                    <a class="btn btn-sm btn-warning" href="{{ route('export') }}">Export User Data</a>
                    <a class="btn btn-sm btn-info" href="{{ route('users.create') }}"> Create New User</a>
                </form>
              </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>NIP</th>
                      <th>Wilayah</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th class="disabled-sorting text-right">Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>NIP</th>
                      <th>Wilayah</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th class="text-right">Actions</th>
                    </tr>
                  </tfoot>
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        @if($user->avatar == null)
                        <td>
                            <img height="40px" src="{{asset('storage/avatar/placeholder.jpg')}}" alt="...">
                        </td>
                        @else
                            <td><img height="40px" src="{{asset('storage/avatar/'.$user->avatar)}}" alt="..."></td>
                        @endif
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->wilayah_kerja }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        {{-- @php $user->id = Crypt::encrypt($user->id); @endphp --}}
                        <td class="td-actions text-right">
                            {{-- {{ Crypt::encrypt($user->id) }} --}}
                            {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class="material-icons">person</i></a> --}}
                            <a class="btn btn-primary" href="{{ route('users.edit',Crypt::encrypt($user->id)) }}"><i class="material-icons">edit</i></a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', Crypt::encrypt($user->id)],'style'=>'display:inline']) !!}
                                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                                <button type="submit" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                            {!! Form::close() !!}
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
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
