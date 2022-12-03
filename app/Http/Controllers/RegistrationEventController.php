<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationEventController extends Controller
{
    public function index()
    {
        $regs = Registration::orderBy('created_at', 'DESC')->get();
        return response()->json($regs, 200);
    }
    public function store(Request $request)
    {
        $register = Registration::create([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('user_id'),
            'status_bayar' => 'Menunggu Pembayaran'
        ]);
        if ($register) {
            return response()->json([
                'success' => true,
                'message' => 'You have registered to the event!',
                'id' => $register->id
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed, try again!',
            ], 400);
        }
    }
    public function show($id)
    {
        $register = Registration::select('users.nama AS nama_lengkap', 'users.no_telp', 'registrations.id',
                    'registrations.user_id', 'events.nama AS nama_event', 'events.deskripsi',
                    'events.tanggal_event', 'events.harga', 'registrations.status_bayar',
                    'registrations.bukti_bayar')
                    ->join('events', 'events.id', '=', 'registrations.event_id')
                    ->join('users', 'users.id', '=', 'registrations.user_id')
                    ->where('registrations.id', $id)->first();
        if ($register) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Registrasi Event',
                'data'    => $register
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Detail Registrasi Tidak Ditemukan!'
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $register = Registration::find($id);
        $register->update($input);
        if ($register) {
            return response()->json([
                'success' => true,
                'message' => 'Registrasi Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Registrasi Gagal Diupdate!',
            ], 500);
        }
    }
    public function payment(Request $request, $id)
    {
        $register = Registration::find($id);
        // $register->update($input);
        $register->status_bayar = 'Menunggu Konfirmasi';
        $register->bukti_bayar = $request->input('bukti_bayar');
        if ($register->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Pembayaran telah dilakukan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Bukti Pembayaran Gagal diupload!',
            ], 500);
        }
    }
    public function destroy($id)
    {
        $register = Registration::destroy($id);
        if ($register) {
            return response()->json([
                'success' => true,
                'message' => 'Post has been deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Delete Post has been failed!',
            ], 500);
        }
    }
}
