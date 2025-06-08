<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithStartRow;
// use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;

class PegawaiImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,SkipsOnError
{
    use Importable,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            'nip'=>$row['nip'],
            'nama'=>$row['nama'],
            'golongan'=>$row['golongan'],
            'tmt1'=>date('Y-m-d',strtotime($row['tmt1'])),
            'jabatan_id'=>$row['jabatan_id'],
            'tmt2'=>date('Y-m-d',strtotime($row['tmt2'])),
            'masa_kerja'=>$row['masa_kerja'],
            'nama_pelatihan'=>$row['nama_pelatihan'],
            'lulus_pelatihan'=>$row['lulus_pelatihan'],
            'lama_kerja'=>$row['lama_kerja'],
            'pendidikan'=>$row['pendidikan'],
            'thn_lulus'=>date('Y',strtotime($row['thn_lulus'])),
            'tgl_lahir'=>date('Y-m-d',strtotime($row['tgl_lahir'])),
            'image'=>$row['image']
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
    public function batchSize(): int
    {
        return 300;
    }
    public function chunkSize(): int
    {
        return 300;
    }
    public function isEmptyWhen(array $row): bool
    {
        return $row['nama'] === null;
    }
    public function onError(\Throwable $e)
    {
        return $e->getMessage();
    }
}
