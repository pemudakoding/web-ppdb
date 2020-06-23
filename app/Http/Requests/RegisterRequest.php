<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nisn.unique' => 'NISN yang didaftarkan telah terdaftar sebelumnya',
            'nik.unique'  => 'NIK yang didaftarkan telah terdaftar sebelumnya',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_asli' => 'required|string',
            'nama_panggilan' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'bulan_lahir'   => 'required|string',
            'tahun_lahir'   => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama'     => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Khong Hu Cu',
            'kelurahan' => 'required|string|exists:zona_sekolahs,nama_zona',
            'kelurahan_lainnya' => 'nullable|string',
            'alamat' => 'required|string',
            'nisn'  => 'required|min:10|max:10|unique:calon_siswas',
            'nik'   => 'required|min:16|max:16|unique:calon_siswas',
            'no_kk' => 'required|min:16|max:16',
            'no_hp' => 'required|string',
            'sekolah_asal'   => 'required|string',
            'status_sekolah' => 'required|in:Negeri,Swasta',
            'nomor_btq' => 'nullable'
        ];
    }
}
