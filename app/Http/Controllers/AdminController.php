<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Books;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function show_books(Request $request)
    {
        $keyword = $request->keyword;

        $books = Books::where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('author', 'LIKE', '%' . $keyword . '%')
                ->orWhere('publisher', 'LIKE', '%' . $keyword . '%')
                ->orWhere('year', 'LIKE', '%' . $keyword . '%');
                
        })
        ->paginate(10);

        $books->withPath('data-buku');
        $books->appends($request->all());

        return view('admin.data-buku', compact('books', 'keyword'));
    }

    public function show_user(Request $request)
    {
        $keyword = $request->keyword;

        // $user = User::all();
        $user = User::where('name','LIKE', '%'.$keyword.'%')
                    ->orWhere('email','LIKE', '%'.$keyword.'%')
                    ->where('role', 'User')
                    ->paginate(10);
        $user->withPath('data-user');
        $user->appends($request->all());

        return view('admin.data-user',compact('user','keyword'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
