
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

        <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header card-header-tabs card-header-rose">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">DATA PTK : </span>
                    <ul class="nav nav-tabs" data-tabs="tabs">
                      <li class="nav-item">
                        <a class="nav-link active" href="#profile" data-toggle="tab">
                          <i class="material-icons">contact_mail</i> Profile PTK
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#messages" data-toggle="tab">
                          <i class="material-icons">inventory</i> Berkas Kepegawaian
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#settings" data-toggle="tab">
                          <i class="material-icons">folder_open</i> DUPAK
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      @role('penilai|admin-prov')
                      <li class="nav-item">
                        <a class="nav-link" href="#berita_acara" data-toggle="tab">
                          <i class="material-icons">input</i> Berita Acara
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#hapak" data-toggle="tab">
                            {{-- <span class="material-symbols-outlined">
                                published_with_changes
                                </span> --}}
                          <i class="material-icons">published_with_changes</i> HAPAK
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      @endrole
                      @role('cabdin|admin-prov')
                      <li class="nav-item">
                        <a class="nav-link" href="#verifikasi" data-toggle="tab">
                          <i class="material-icons">checklist</i> Verifikasi
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      @endrole
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="profile">
                    @include('penilais.profile')
                  </div>
                  <div class="tab-pane" id="messages">
                    @include('penilais.kepegawaians')
                  </div>
                  <div class="tab-pane" id="settings">
                    @include('penilais.dupak')
                  </div>
                  @role('penilai|admin-prov')
                  <div class="tab-pane" id="berita_acara">
                    @include('penilais.berita_acara')
                  </div>
                  <div class="tab-pane" id="hapak">
                    @include('penilais.hapak')
                  </div>
                  @endrole
                  @role('cabdin|admin-prov')
                  <div class="tab-pane" id="verifikasi">
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('provinsis.perbaikan',$pak_id)}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <input type="hidden" value="" id="tolak"  name="ditolak">
                        <textarea name='pesan_perbaikan' cols="125" rows="15">
                          Isi Pesan Perbaikan Untuk PTK
                       </textarea>
                          <button type="submit" class="btn btn-success">
                              <span class="btn-label">
                                <i class="material-icons">published_with_changes</i>
                              </span>
                              Perbaikan
                              <div class="ripple-container"></div>
                          </button>


                          <button type="submit" onclick="myFunction()" class="btn btn-danger">
                            <span class="btn-label">
                              <i class="material-icons">published_with_changes</i>
                            </span>
                            Tolak
                            <div class="ripple-container"></div>
                        </button>

                          <a class="btn btn-primary" href="{{ route('provinsis.verif',$pak->id)}}">
                              <span class="btn-label">
                                  <i class="material-icons">done_all</i>
                                </span>
                                Verifikasi
                                <div class="ripple-container"></div>
                          </a>
                          {!! Form::close() !!}
                  </div>
                  @endrole



                </div>
              </div>
            </div>
          </div>
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
    function myFunction() {
      document.getElementById("tolak").value = "ditolak";
    }
</script>

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>


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
