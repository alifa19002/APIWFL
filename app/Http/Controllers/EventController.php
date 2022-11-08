<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Log\Logger;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('tanggal_event', 'ASC')->get();
        return response()->json(['data' => $events], 200);
    }
    public function store(Request $request)
    {
        $event = Event::create([
                'nama' => $request->input('nama'),
                'harga' => $request->input('harga'),
                'deskripsi' => $request->input('deskripsi'),
                'tanggal_event' => $request->input('tanggal_event'),
                'link_conference' => $request->input('link_conference')
            ]);
            if ($event) {
                return response()->json([
                    'success' => true,
                    'message' => 'Event Berhasil di Buat!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Event Gagal Di buat!',
                ], 400);
            }
    }
    public function show($id)
    {
        $event = Event::select('events.id', 'events.nama', 'events.harga','events.deskripsi', 'events.tanggal_event', 'events.link_conference', 'events.created_at')
        ->where('events.id', $id)->first();
        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Event',
                'data'    => $event
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $event = Event::find($id);
        $event->update($input);
        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Event Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event Gagal Diupdate!',
            ], 500);
        }
    }
    public function destroy($id)
    {
        $event = Event::destroy($id);
        if ($event) {
            return response()->json([
                'success' => true,
                'message' => 'Event berhasil di hapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Event gagal di hapus!',
            ], 500);
        }
    }
}
