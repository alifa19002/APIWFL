<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Report;

class ReportController extends Controller
{
    public function index($id)
    {
        return view('Reports.report', [
            "title" => "Report Posts",
            'posts' => Post::where('id', $id)->first(),
            'message' => NULL
        ]);
    }

    public function store(Request $request)
    {
        Report::create([
            'alasan' => request('alasan'),
            'user_id' => request('user_id'),
            'postingan_id' => request('postingan_id')
        ]);

        return redirect('/posts');
    }

    public function edit($id)
    {
        return view('reports.editReport', [
            'title' => 'Edit Laporan',
            'report' => Report::where('id', $id)->first()
        ]);
    }

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
        Report::destroy($report->id);
        return redirect('/admin')->with('success', 'Report has been deleted!');
    }
}
