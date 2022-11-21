<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Http\Client\ResponseSequence;

use function PHPUnit\Framework\returnSelf;

class PatientController extends Controller
{
    /**
     * Membuat Method Index */
    public function index () {
        $patients = Patient::all ();

        $data = [
            "pesan" => "Data Semnua Pasien",
            "data" => $patients
        ];
        # Mengembalikan data (json)
        return response()->json($data, 200);
    }


    /**
     * Membuat Method Store */ 
    public function store (Request $request) {
        $validateData = $request->validate([
            "name" => "required",
            "phone" => "required | numeric",
            "address" => "required",
            "status" => "required",
            "in_date_at" => "required",
            "out_date_at" => "required"
        ]);
        # Menggunakan model patient untuk input data
        $patient = Patient::create ($validateData);

        $data = [
            "Pesan" => "Data Berhasil Ditambahkan",
            "data" => $patient
        ];
        # Mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    /**
     * Membuat Method Show */
    public function show (Request $request, $id) {
        $patient = Patient::find($id);

        if ($patient) {
            $data = [
                "Pesan" => "Detail Pasien",
                "data" => $patient
            ];
            return response()->json($data, 200);
        }
        else {
            $data = [
                "Pesan" => "Tidak ada data"
            ];
            # Mengembalikan data (json) dan kode 404 (not found)
            return response()->json($data, 404);
        }
    }

    /**
     * Membuat Method Update */
    public function update (Request $request, $id) {
        $patient = Patient::find ($id);

        if ($patient) {
            $input = [
                "name" => $request->name?? $patient->name,
                "phone" => $request->phone?? $patient->phone,
                "address" => $request->address?? $patient->address,
                "status" => $request->status?? $patient->status,
                "in_date_at" => $request->in_date_at?? $patient->in_date_at,
                "out_date_at" => $request->out_date_at?? $patient->out_date_at
            ];
            $patient->update($input);
            $data = [
                "Pesan" => "Data Di Update",
                "data" => $patient
            ];
            # Mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }
        else {
            $data = [
                "Pesan" => "Tidak ada data"
            ];
            # Mengembalikan data (json) dan kode 404 (not found)
            return response()->json($data, 404);
        }
    }

    /**
     * Membuat Method Destroy */
    public function destroy ($id) {
        $patient = Patient::find($id);

        if ($patient) {
            $patient->delete();
            $data = [
                "Pesan" => "Data Berhasil Di Hapus"
            ];
            return response()->json($data, 200);
        }
        else {
            $data = [
                "Pesan" => "Tidak Ada Data"
            ];
            # Mengembalikan data (json) dan kode 404 (not found)
            return response()->json($data, 404);
        }
    }

    /**
     * Membuat Method Search by name
     */
    public function search (Request $request) {}

    /**
     * Membuat Method Positive Patient
     */
    public function positive (Request $request) {}

    /**
     * Membuat Methid Recovered Patient
     */
    public function recovered(Request $request) {}

    /**
     * <embuat Method Dead Patient
     */
    public function dead (Request $request) {}

}
