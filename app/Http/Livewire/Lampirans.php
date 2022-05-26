<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pendidikan;


class Lampirans extends Component
{
    public $pendidikans, $pak, $judul, $nilai, $lampiran, $kegiatan_id, $pak_id, $pendidikan_id;
    public $updateMode = false;


    public function mount($pak)
    {
        $this->pak_id = $pak;
    }

    public function render()
    {
        $this->pendidikans = Pendidikan::all();
        return view('livewire.lampirans');
    }

    private function resetInputFields(){
        $this->judul = '';
        $this->nilai = '';
        $this->lampiran = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'judul' => 'required',
            'nilai' => 'required',
            'lampiran' => 'required',
            'kegiatan_id' => 'required',
        ]);

        Pendidikan::create($validatedDate);

        session()->flash('message', 'Post Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $this->pendidikan_id = $id;
        $this->judul = $pendidikan->judul;
        $this->nilai = $pendidikan->nilai;
        $this->lampiran = $pendidikan->lampiran;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $pendidikan = pendidikan::find($this->pendidikan_id);
        $pendidikan->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'pendidikan Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Pendidikan::find($id)->delete();
        session()->flash('message', 'Pendidikan Deleted Successfully.');
    }

}
