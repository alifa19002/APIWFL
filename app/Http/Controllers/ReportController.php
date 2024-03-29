<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Report;

class ReportController extends Controller
{
    public function index($id)
    {
        // return view('Reports.report', [
        //     "title" => "Report Posts",
        //     'posts' => Post::where('id', $id)->first(),
        //     'message' => NULL
        // ]);
        // idreport userid postinganid alasan is_approved
        $report = Report::where('id', $id)->first();
        // $loker = Post::where('posts.id',$id)
        // ->join('companies', 'companies.id', '=', 'vacancies.company_id')->join('users', 'users.company_id', '=', 'companies.id')
        // ->select('vacancies.id', 'vacancies.company_id', 'vacancies.posisi', 'vacancies.insentif', 'vacancies.min_pengalaman', 'vacancies.jobdesc', 'vacancies.kriteria', 'vacancies.link_pendaftaran', 'vacancies.domisili', 'vacancies.created_at', 'vacancies.updated_at', 'companies.nama_perusahaan', 'users.foto_profil')->get();
        return response()->json([
            'success' => true,
            'message' => 'Report Posts',
            'data' => $report
        ], 200);
    }

    public function store(Request $request)
    {
        // Report::create([
        //     'alasan' => request('alasan'),
        //     'user_id' => request('user_id'),
        //     'postingan_id' => request('postingan_id')
        // ]);

        // return redirect('/posts');

        $report = Report::create([
            'alasan' => $request->input('alasan'),
            'user_id' => $request->input('user_id'),
            'postingan_id' => $request->input('postingan_id'),
        ]);

        if ($report) {
            return response()->json([
                'success' => true,
                'message' => 'Laporan Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => ' Laporan Gagal Disimpan!',
            ], 400);
        }
    }

    // public function edit($id)
    // {
    //     // return view('reports.editReport', [
    //     //     'title' => 'Edit Laporan',
    //     //     'report' => Report::where('id', $id)->first()
    //     // ]);
    //     $report = Report::where('id', $id)->first();
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Report Posts',
    //         'data' => $report
    //     ], 200);
        
    // }

    public function update(Request $request, $id)
    {
        // $rules = [
        //     'alasan' => 'required|max:255',
        //     'is_approved' => 'required',
        // ];
        // $validatedData = $request->validate($rules);
        // $reports = Report::where('id', $report->id)->update($validatedData);
        $input = $request->all();
        $reports = Report::find($id);
        $reports->update($input);
        // return redirect('/admin');
        if ($reports) {
            return response()->json([
                'success' => true,
                'message' => 'Report Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Report Gagal Diupdate!',
            ], 500);
        }
    }

    public function destroy($id)
    {
        // Report::destroy($report->id);
        // return redirect('/admin')->with('success', 'Report has been deleted!');
        $report = Report::destroy($id);
        if ($report) {
            return response()->json([
                'success' => true,
                'message' => 'Report has been deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Delete Report has been failed!',
            ], 500);
        }
    }
}
