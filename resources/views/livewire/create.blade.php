<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Judul:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="judul">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Body:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="nilai" placeholder="Enter Body"></textarea>
        @error('nilai') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Body:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="lampiran" placeholder="Enter Body"></textarea>
        @error('lampiran') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Body:</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput2" wire:model="kegiatan_id" placeholder="Enter Body"></textarea>
        @error('kegiatan_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
