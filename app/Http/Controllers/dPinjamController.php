<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DpinjamRequest;

class dPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Pinjam::query()->orderby('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a class="btn btn-primary btn-sm" href="#mymodal" data-remote="' . route('dpinjam.show', $item->id) . '" data-toggle="modal" data-target="#mymodal" data-title="Detail Peminjaman">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="' . route('dpinjam.edit', $item->id) . '">
                            <i class="fas fa-edit"></i>
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.user.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DpinjamRequest $request)
    {   
        $tgl = date('d-m-Y', strtotime($request->tanggal));
        $data = $request->all();
        $data['tanggal'] = $tgl;
        $data['status'] = 'PENDING';
        Pinjam::create($data);

        return redirect()->route('dpinjam.index')->with('success', 'Terimakasih Sudah Mendaftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pinjam::findOrFail($id);

        return view('pages.user.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Pinjam::findOrFail($id);

        return view('pages.user.edit', compact('item'));
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
        $data = $request->all();
        $item = Pinjam::findOrFail($id);
        $item->update($data);

        return redirect()->route('dpinjam.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
