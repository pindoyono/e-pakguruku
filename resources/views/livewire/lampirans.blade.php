<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if($updateMode)
    @include('livewire.update')
@else
    @include('livewire.create')
@endif

<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>No.</th>
            <th>judul</th>
            <th>nilai</th>
            <th>lampiran</th>
            <th width="150px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendidikans as $pendidikan)
        <tr>
            <td>{{ $pendidikan->id }}</td>
            <td>{{ $pendidikan->judul }}</td>
            <td>{{ $pendidikan->nilai }}</td>
            <td>{{ $pendidikan->lampiran }}</td>
            <td>
            <button wire:click="edit({{ $pendidikan->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $pendidikan->id }})" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
