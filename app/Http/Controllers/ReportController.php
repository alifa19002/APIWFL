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
        $post = Post::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Report Posts',
            'data' => $post
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

    public function update(Request $request, Report $report)
    {
        $rules = [
            'alasan' => 'required|max:255',
            'is_approved' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Report::where('id', $report->id)->update($validatedData);
        return redirect('/admin');
    }

    public function destroy(Report $report)
    {
        // Report::destroy($report->id);
        // return redirect('/admin')->with('success', 'Report has been deleted!');
        $report = Report::destroy($report->id);
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
