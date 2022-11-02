<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pinjam;
use Yajra\DataTables\Facades\DataTables;

class PinjamController extends Controller
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
                        <a class="btn btn-primary btn-sm" href="#mymodal" data-remote="' . route('pinjam.show', $item->id) . '" data-toggle="modal" data-target="#mymodal" data-title="Detail Peminjaman">
                            Detail
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.pinjam.index');
    }

    public function listPending()
    {
        if(request()->ajax())
        {
            $query = Pinjam::query()->where('status', 'PENDING')->orderby('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a class="btn btn-primary btn-sm" href="#mymodal" data-remote="' . route('pinjam.show', $item->id) . '" data-toggle="modal" data-target="#mymodal" data-title="Detail Peminjaman">
                            Set Status
                        </a>                        
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.pinjam.pending');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pinjam::findOrFail($id);

        return view('pages.admin.pinjam.show', compact('item'));
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
        //
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

    public function setStatus(Request $request, $id)
    {
        // $request->validate([
        //     'status' => 'required|in:APPROVE,CANCEL'
        // ]);
        
        $item = Pinjam::findOrFail($id);
        $item->ket = $request->ket;
        $item->status = $request->status;
        $item->save();

        return redirect()->route('pinjam.index')->with('success', 'Status Berhasil Diubah');
    }
}

