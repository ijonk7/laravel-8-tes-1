<?php

namespace App\Http\Controllers;

use App\Models\DataOne;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DataOneController extends Controller
{
    public function index()
    {
        DB::enableQueryLog();
        $data = DB::table('department')
                    ->select('department.NAME', DB::raw('count(employee.DEPT_ID) as TOTAL'))
                    ->leftJoin('employee', 'department.ID', '=', 'employee.DEPT_ID')
                    ->groupBy('department.ID')
                    ->orderBy('TOTAL', 'desc')
                    ->orderBy('department.NAME', 'asc')
                    ->get();
        dd(DB::getQueryLog());

        return $data;
        // return dd($data);
        // return view('tes1', $data);
    }

    public function dataPribadiForm()
    {
        return view('form');
    }

    public function dataPribadiStore(Request $request)
    {
        $data = $request->all();
        return $data;
    }

    public function tesWriteFile()
    {
        $data = array(
            'data1' => 'Paragraph from Data 1',
            'data2' => 'Paragraph from Data 2',
            'data3' => 'Paragraph from Data 3',
            'data4' => 'Paragraph from Data 4'
        );

        for ($i=0; $i < 10; $i++) {
            Storage::disk('local')->put("/write-html/result-" . $i . ".html", view('tes-write-file', $data));
        }

        // Storage::disk('local')->put("/write-html/result-1.html", View::make('tes-write-file', [
        //     'data1' => 'Paragraph from Data 1',
        //     'data2' => 'Paragraph from Data 2',
        //     'data3' => 'Paragraph from Data 3',
        //     'data4' => 'Paragraph from Data 4'
        // ]));

        // $data = View::make('tes-write-file', [
        //     'data1' => 'Paragraph from Data 1',
        //     'data2' => 'Paragraph from Data 2',
        //     'data3' => 'Paragraph from Data 3'
        // ]);
        // $path = Storage::putFileAs('write-html', public_path('result-1.html'), 'result-1.html');
    }

    public function tesWriteFile2()
    {
        return view('tes-write-file-2');
    }

    public function tesWriteFile3()
    {
        return view('tes-write-file-3');
    }
}
