<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;


class UsersImport implements WithHeadingRow,ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
        '*.name' => 'required',
            '*.email' => 'required|unique:users,email',
            '*.password' => 'required',
            '*.roles' => 'required',
                // '*.agama' => 'required',
                // '*.pangkat_golongan' => 'required',
                '*.username' => 'required|unique:users,username',
                // '*.pendidikan' => 'required',
                // '*.jenis_guru' => 'required',
                // '*.tugas_tambahan' => 'required',
                // '*.wilayah_kerja' => 'required',
                // '*.jenis_kelamin' => 'required',
                // '*.alamat_sekolah' => 'required',
                // '*.alamat_rumah' => 'required',
                // '*.tempat_lahir' => 'required',
                // '*.tanggal_lahir' => 'required',
                // '*.nuptk' => 'required',
                // '*.no_sk_cpns' => 'required',
                // '*.tmt_cpns' => 'required',
                // '*.tmt_pns' => 'required',
                // '*.no_hp' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            $user = User::create([
                //
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'roles' => $row['roles'],
                'agama' => $row['agama'],
                'pangkat_golongan' => $row['pangkat_golongan'],
                'username' => $row['username'],
                'pendidikan' => $row['pendidikan'],
                'jenis_guru' => $row['jenis_guru'],
                'tugas_tambahan' => $row['tugas_tambahan'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'alamat_sekolah' => $row['alamat_sekolah'],
                'alamat_rumah' => $row['alamat_rumah'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' =>  Carbon::parse($row['tanggal_lahir']),
                'nuptk' => $row['nuptk'],
                'no_sk_cpns' => $row['no_sk_cpns'],
                'tmt_cpns' => Carbon::parse($row['tmt_cpns']),
                'tmt_pns' => Carbon::parse($row['tmt_pns']),
                'no_hp' => $row['no_hp'],
                'sekolah' => $row['sekolah'],
                'kartu_pegawai' => $row['kartu_pegawai'],
                'karsu' => $row['karsu'],
            ]);
            $user->assignRole($row['roles']);
        }
    }

}
