<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Books;
use App\Models\Data_Peminjaman;


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

    public function index_create_books()
    {
       
        return view('admin.create-books');
    }

    public function index_create_user()
    {
       
        return view('admin.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function store_books(Request $request)
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
        return redirect('data-buku')->with('success2', 'Data Buku Berhasil Ditambahkan!');
        // $model = new Books;
        // $model->title = $request->title;
        // $model->author = $request->author;
        // $model->publisher = $request->publisher;
        // $model->year = $request->year;
        // $model->category = $request->category;
        // $model->save();

        // return redirect('admin-books');
    }

    public function store_books2(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'publisher' => ['required', 'string'],
            'year' => ['required', 'string'],
            'category' => ['required', 'string'],
            'sinopsis' => ['required', 'string'],
            'book_photo' => ['nullable'],
            'status' => 'ACCEPTED',
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
            'status' => 'ACCEPTED',
            
        ]);

        // send success message
        return redirect('data-buku')->with('success2', 'Data Buku Berhasil Ditambahkan!');
        // $model = new Books;
        // $model->title = $request->title;
        // $model->author = $request->author;
        // $model->publisher = $request->publisher;
        // $model->year = $request->year;
        // $model->category = $request->category;
        // $model->save();

        // return redirect('admin-books');
    }

    public function store_user(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // send error message
        if (!$validated) {
            return redirect()->back()->with('error', 'Validation failed!');
        }


        // create user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // send success message
        return redirect('data-user')->with('success2', 'User created!');
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
                ->orWhere('year', 'LIKE', '%' . $keyword . '%')
                ->orWhere('category', 'LIKE', '%' . $keyword . '%')
                ->orWhere('sinopsis', 'LIKE', '%' . $keyword . '%');

                
        })
        ->where('status', 'accepted')
        ->paginate(10);

        $books->withPath('data-buku');
        $books->appends($request->all());

        return view('admin.data-buku', compact('books', 'keyword'));
    }

    public function show_user(Request $request)
    {
        $keyword = $request->keyword;

        // $user = User::all();
        $user = User::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%');
        })
        ->where('role', 'User')
        ->paginate(10);
        
        $user->withPath('data-user');
        $user->appends($request->all());

        return view('admin.data-user',compact('user','keyword'));
    }

    public function show_pinjam(Request $request)
    {
        $keyword = $request->keyword;

        $books = Data_Peminjaman::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tgl_pinjam', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%');
                
        })
        ->paginate(10);

        $books->withPath('data-pinjam');
        $books->appends($request->all());

        return view('admin.data-pinjam', compact('books', 'keyword'));
    }

    public function show_usul(Request $request)
    {
        $keyword = $request->keyword;

        $books = Books::where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('author', 'LIKE', '%' . $keyword . '%')
                ->orWhere('year', 'LIKE', '%' . $keyword . '%')
                ->orWhere('category', 'LIKE', '%' . $keyword . '%')
                ->orWhere('publisher', 'LIKE', '%' . $keyword . '%')
                ->orWhere('status', 'LIKE', '%' . $keyword . '%');

        })
        ->paginate(10);

        $books->withPath('data-usulan');
        $books->appends($request->all());

        return view('admin.data-usulan', compact('books', 'keyword'));
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

    public function edit_books(string $id)
    {
        $model = Books::find($id);
        return view('admin.edit-books', compact('model'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update_books(Request $request, string $id)
    {
        
        $model = Books::find($id);
        $model->title = $request->title;
        $model->author = $request->author;
        $model->publisher = $request->publisher;
        $model->year = $request->year;
        $model->category = $request->category;
        $model->sinopsis = $request->sinopsis;
        $model->book_photo = $request->book_photo;
        $model->save();

        return redirect('data-buku')->with('success3', 'Data Buku Berhasil Diperbarui!');
    }

    public function edit_user(string $id)
    {
        $model = User::find($id);
        return view('admin.edit-user', compact('model'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update_user(Request $request, string $id)
    {
        
        $model = User::find($id);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = $request->password;
        $model->profile_photo = $request->profile_photo;
        $model->save();

        return redirect('data-user')->with('success', 'Data Buku Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(Request $request, $id)
    {
        $books = Books::findOrFail($id);
        $books->status = 'ACCEPTED';
        $books->save();

        // Tambahkan logika lain yang diperlukan

        return redirect('data-usulan')->with('success', 'Usulan buku berhasil diterima');
    }

    public function reject(Request $request, $id)
    {
        $books = Books::findOrFail($id);
        $books->status = 'REJECTED';
        $books->save();

        // Tambahkan logika lain yang diperlukan

        return redirect('data-usulan')->with('success2', 'Usulan buku berhasil ditolak');
    }

    public function destroy_user(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect('data-user')->with('success', 'Data berhasil dihapus');
    }

    public function destroy_books(string $id)
    {
        Books::findOrFail($id)->delete();
    
        return redirect('data-buku')->with('success', 'Data berhasil dihapus');
    }

    public function destroy_pinjam(string $id)
    {
        Data_Peminjaman::findOrFail($id)->delete();
    
        return redirect('data-pinjam')->with('success', 'Data berhasil dihapus');
    }

    public function destroy_usulan(string $id)
    {
        Books::findOrFail($id)->delete();
    
        return redirect('data-usulan')->with('success', 'Data berhasil dihapus');
    }
}
