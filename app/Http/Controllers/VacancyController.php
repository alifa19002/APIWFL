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
        // $lokers = Vacancy::latest()->filter(request(['search']))->paginate(6)->withQueryString();
        $lokers = Vacancy::select('vacancies.id', 'vacancies.company_id', 'vacancies.posisi', 'vacancies.insentif', 'vacancies.min_pengalaman', 'vacancies.jobdesc', 'vacancies.kriteria', 'vacancies.link_pendaftaran', 'vacancies.domisili', 'vacancies.created_at', 'vacancies.updated_at', 'companies.nama_perusahaan', 'users.foto_profil')
        ->join('companies', 'companies.id', '=', 'vacancies.company_id')->join('users', 'users.company_id', '=', 'companies.id')
        ->orderBy('vacancies.created_at', 'DESC')
        ->filter(request(['search']))->paginate(6);

        // if($lokers->lastPage() > 1){
        //     $getLokers = ['current_page' => $lokers->currentPage(), 'data' => $lokers->unique('id'), 'next_page_url' => 'https://apiwfl.herokuapp.com/api/loker?'.($lokers->currentPage()+1)];
        // }else{
        //     $getLokers = ['current_page' => $lokers->currentPage(), 'data' => $lokers->unique('id'), 'next_page_url' => NULL];
        // }
        return response()->json($lokers, 200);
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
        $vacancy = Vacancy::create([
            'company_id' => $request->input('company_id'),
            'posisi' => $request->input('posisi'),
            'jobdesc' => $request->input('jobdesc'),
            'kriteria' => $request->input('kriteria'), 
            'domisili' => $request->input('domisili'),
            'min_pengalaman' => $request->input('min_pengalaman'),
            'insentif' => $request->input('insentif'),
            'link_pendaftaran' => $request->input('link_pendaftaran'),
        ]);

        if ($vacancy) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Disimpan!',
            ], 400);
        }
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
        // $loker = Vacancy::whereId($id)->first();
        $loker = Vacancy::where('vacancies.id',$id)
        ->join('companies', 'companies.id', '=', 'vacancies.company_id')->join('users', 'users.company_id', '=', 'companies.id')
        ->select('vacancies.id', 'vacancies.company_id', 'vacancies.posisi', 'vacancies.insentif', 'vacancies.min_pengalaman', 'vacancies.jobdesc', 'vacancies.kriteria', 'vacancies.link_pendaftaran', 'vacancies.domisili', 'vacancies.created_at', 'vacancies.updated_at', 'companies.nama_perusahaan', 'users.foto_profil')->get();
        // ->whereRaw("`events`.`date` >= '$signupday' AND `events`.`date` <= '$today'")
        // ->whereId($id)->first();
        if ($loker!=null) {
            return response()->json(['data'    => $loker], 200);
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

    //update masi bingung
    public function update(Request $request, Vacancy $vacancy)
    {
        $rules = [
            'posisi' => 'required|max:255',
            'jobdesc' => 'required',
            'company_id' => 'required'
        ];
        $validatedData = $request->validate($rules);
        $validatedData["company_id"] = auth()->user()->id;

        $vacancy = Vacancy::where('id', $vacancy->id)->update($validatedData);
        if ($vacancy) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Diupdate!',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy = Vacancy::destroy($vacancy->id);
        if ($vacancy) {
            return response()->json([
                'success' => true,
                'message' => 'Vacancy has been deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Delete Vacancy has been failed!',
            ], 500);
        }
        
    }
}
