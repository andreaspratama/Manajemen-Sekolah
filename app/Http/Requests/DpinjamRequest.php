<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DpinjamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'unit' => 'required',
            'tanggal' => 'required|unique:pinjams,tanggal',
            'j_awal' => 'required',
            'j_akhir' => 'required',
            'kelas' => 'required',
            'siswa' => 'required',
            'guru' => 'required',
            'materi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'unit.required' => 'Unit tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'tanggal.unique' => 'Tanggal sudah dipakai oleh unit lain',
            'j_awal.required' => 'Jam Awal tidak boleh kosong',
            'j_akhir.required' => 'Jam Akhir tidak boleh kosong',
            'kelas.required' => 'Kelas tidak boleh kosong',
            'siswa.required' => 'Siswa tidak boleh kosong',
            'guru.required' => 'Guru tidak boleh kosong',
            'materi.required' => 'Materi tidak boleh kosong',
        ];
    }
}
