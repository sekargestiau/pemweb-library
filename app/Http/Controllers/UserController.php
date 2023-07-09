<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Books;
use App\Models\Data_Peminjaman;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $books = Books::where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('author', 'LIKE', '%' . $keyword . '%')
                ->orWhere('year', 'LIKE', '%' . $keyword . '%')
                ->orWhere('category', 'LIKE', '%' . $keyword . '%')
                ->orWhere('publisher', 'LIKE', '%' . $keyword . '%');

        })
        ->paginate(12);

        $books->withPath('books');
        $books->appends($request->all());


        return view('user.daftar-buku',compact('books', 'keyword'));
    }

    public function index_profile()
    {
        // $datas = User::all();
        // return view('users', compact('datas'));
        // $user = User::all();
        $user = DB::table('users')->where('id', auth()->user()->id)->first();

        return view('user.lihat-profile',['user' => $user]);

    }

    public function index_create_pinjam()
    {
       
        return view('user.pinjam');
    }

    public function store_pinjam(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'title' => ['required', 'string'],
            'tgl_pinjam' => ['required', 'date'],
        ]);

        // send error message
        // send error message
        if (!$validated) {
            return redirect()->back()->with('error', 'Validation failed!');
        }

        // create user
        Data_Peminjaman::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'title' => $validated['title'],
            'tgl_pinjam' => $validated['tgl_pinjam'],
            
        ]);

        // send success message
        return redirect('pinjam')->with('success', 'Buku Berhasil Dipinjam!');
        // $model = new Books;
        // $model->title = $request->title;
        // $model->author = $request->author;
        // $model->publisher = $request->publisher;
        // $model->year = $request->year;
        // $model->category = $request->category;
        // $model->save();

        // return redirect('admin-books');
    }

    public function index_create_usul()
    {
       
        return view('user.usul-buku');
    }

    public function store_usul(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'publisher' => ['required', 'string'],
            'year' => ['required', 'string'],
            'category' => ['required', 'string'],
            'sinopsis' => ['required', 'string'],
            'book_photo' => ['nullable'],
            'status' => 'PENDING',
        ]);

        // send error message
        // send error message
        if (!$validated) {
            return redirect()->back()->with('error', 'Validation failed!');
        }

        if($request->file('book_photo')) {
            $fileName = time().'_'.$request->file('book_photo')->getClientOriginalName();
            $request->file('book_photo')->move(public_path('book_photo'), $fileName);
            $filePath = 'book_photo/'.$fileName;

            $validated['book_photo'] = $filePath;
        }

        // create user
        Books::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'publisher' => $validated['publisher'],
            'year' => $validated['year'],
            'category' => $validated['category'],
            'sinopsis' => $validated['sinopsis'],
            'book_photo' => $validated['book_photo'],
            'status' => 'PENDING',
            
        ]);

        // send success message
        return redirect('usul-buku')->with('success', 'Data Buku Berhasil Ditambahkan!');
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
