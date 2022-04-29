<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $title = 'Lowongan Kerja';
        // if (request('category')) {
        //     $title = "Semua Lowongan Kerja";
        // }
        // return view('loker.loker', [
        //     'title' => 'All Events' . $title,
        //     'active' => 'events',
        //     'lokers' => Vacancy::latest()->filter(request(['search']))->paginate(6)->withQueryString()
        // ]);
        $lokers = Vacancy::latest()->filter(request(['search']))->paginate(6)->withQueryString();
        return response()->json([
            'success' => true,
            'message' => 'Semua Lowongan Kerja',
            'data' => $lokers
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('loker.view', [
        //     'title' => 'Detail Lowongan Kerja',
        //     'active' => 'loker',
        //     'loker' => $vacancy,
        // ]);
        // $post = Vacancy::latest()->get();
        $loker = Vacancy::whereId($id)->first();

        if ($loker!=null) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Loker!',
                'data'    => $loker
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Loker Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}
