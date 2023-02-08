<?php

namespace App\Http\Controllers;

use App\Models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pageController extends Controller
{
    public function index()
    {
        return view('dashboard.page.index');
    }

    
    public function create()
    {
        return view('dashboard.page.create');
    }

   
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('isi', $request->isi);
        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'judul wajib di isi',
                'isi.required' => 'isian wajib di isi',
            ]
        );

        $data = [
            'judul' =>$request->judul,
            'isi' =>$request->isi
        ];
        page::create($data);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
