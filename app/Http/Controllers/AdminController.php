<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Post;
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
        $vacancy = Vacancy::latest()->get();
        $report = Report::latest()->get();
        $company = Company::orderBy('id')->get();
        return response()->json([
            'success' => true,
            'message' => 'Semua Lowongan Kerja',
            'vacancy' => $vacancy,
            'post' => $post,
            'report' => $report,
            'company' => $company
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
            return response()->json([
                'success' => true,
                'message' => 'Detail Perusahaan',
                'data'    => $company
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Perusahaan Tidak Ditemukan!',
                'data'    => ''
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
    public function update(Request $request, Company $company)
    {
        //
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
