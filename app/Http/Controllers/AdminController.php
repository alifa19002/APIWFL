<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use App\Models\Company;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Registration;
use App\Models\User;
use App\Models\Report;
use App\Models\Vacancy;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.rekap', [
        //     'title' => "Halaman Admin",
        //     'posts' => Post::latest()->get(),
        //     'lokers' => Vacancy::latest()->get(),
        //     'reports' => Report::latest()->get(),
        //     'companies' => Company::orderBy('id')->get(),
        // ]);
        $post = Post::latest()->get();
        // $vacancy = Vacancy::latest()->get();
        $report = Report::latest()->get();
        $vacancy = Vacancy::select('vacancies.id', 'vacancies.company_id', 'vacancies.posisi',
            'vacancies.insentif', 'vacancies.min_pengalaman', 'vacancies.jobdesc', 'vacancies.kriteria',
            'vacancies.link_pendaftaran', 'vacancies.domisili', 'vacancies.created_at',
            'vacancies.updated_at', 'companies.nama_perusahaan', 'users.foto_profil')
            ->join('companies', 'companies.id', '=', 'vacancies.company_id')
            ->join('users', 'users.company_id', '=', 'companies.id')
            ->orderBy('vacancies.created_at', 'DESC')->get();
        $company = Company::orderBy('id')->get();
        $event = Event::orderBy('id')->get();
        // $reg = Registration::orderBy('id')->get();
        $reg = Registration::select('registrations.id', 'events.nama', 'events.deskripsi',
            'events.tanggal_event', 'registrations.status_bayar', 'registrations.bukti_bayar',
            'events.link_conference', 'users.nama AS nama_user')
            ->join('events', 'events.id', '=', 'registrations.event_id')
            ->join('users', 'users.id', '=', 'registrations.user_id')
            ->orderBy('id')->get();
        return response()->json([
            'success' => true,
            'message' => 'Semua Lowongan Kerja',
            'vacancy' => $vacancy,
            'post' => $post,
            'report' => $report,
            'company' => $company,
            'event' => $event,
            'regEvent' => $reg
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
//         $input = $request->all();
//  dd($input);
        // $pass = Hash::make($request->input('password'));
        $company_id = $request->input('company_id');;
        // $user = User::create([
        //     'username' => $request->input('username'),
        //     'nama' => $request->input('nama'),
        //     'email' => $request->input('email'),
        //     'no_telp' => $request->input('no_telp'),
        //     'password' => $pass,
        //     'role' => $request->input('role'),
        //     'company_id' => $company_id
        // ]);
        $validatedData = $request->validate([
                'nama' => 'required|max:255',
                'username' => ['required', 'min:3', 'max:255', 'unique:users'],
                'email' => 'required|email:dns|unique:users',
                'no_telp' => 'required|numeric|digits_between:10,14',
                'password' => 'required|min:5|max:255',
                'role' => 'required',
                'company_id' => 'required'
            ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        $id = $company_id;
        $vacancy = Company::find($id);

        $vacancy->update(['is_approved' => 1]);
        // $validatedData['password'] = Hash::make($validatedData['password']);

        // $user = User::create($validatedData);
        // return redirect('/admin')->with('success', 'Company account successfully made!');
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Company account successfully made!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Company account failed to create!',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('admin.detail-company', [
        //     'title' => 'Detail Perusahaan',
        //     'active' => 'perusahaan',
        //     'company' => $company,
        // ]);
        $company = Company::whereId($id)->first();
        if ($company!=null) {
            return response()->json($company
            , 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Perusahaan Tidak Ditemukan!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $company = Company::find($id);
        $company->update($input);
        if ($company) {
            return response()->json([
                'success' => true,
                'message' => 'Perusahaan Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Perusahaan Gagal Diupdate!',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $companies)
    {
        $company = Company::destroy($companies->id);
        if ($company) {
            return response()->json([
                'success' => true,
                'message' => 'Company has been deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Delete Company has been failed!',
            ], 500);
        }
    }
}
