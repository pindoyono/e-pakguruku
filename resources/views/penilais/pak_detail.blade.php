
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
          </div>
            <div class="card-body">
                {{-- <div class="pull-right">
                    <a class="btn btn-sm btn-success" href="{{ route('pendidikans.exporDupak', $pak_id) }}"> export xsl</a>
                </div> --}}
                <div id="accordion" role="tablist">
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                          <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                            <h4 style="font-weight:bold">
                                Data Profile PTK
                            </h4>
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                        <div class="card-body">
                        @include('penilais.profile')
                        </div>
                      </div>
                    </div>
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 style="font-weight: bold">
                                Berkas Kepegawaian
                            </h4>
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            @include('penilais.kepegawaians')
                        </div>
                      </div>
                    </div>
                    <div class="card-collapse">
                      <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 style="font-weight: bold">Daftar Usulan Angka Kredit</h4>
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            @include('penilais.dupak')
                        </div>
                      </div>
                    </div>
                    <div class="card-collapse">
                        <div class="card-header" role="tab" id="headingThree">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#berita_acara" aria-expanded="false" aria-controls="collapseThree">
                              <h4 style="font-weight: bold">Berita Acara PAK</h4>
                              <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                          </h5>
                        </div>
                        <div id="berita_acara" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body">
                              @include('penilais.berita_acara')
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
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
