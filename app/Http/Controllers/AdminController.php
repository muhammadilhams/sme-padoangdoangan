<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['showLoginForm', 'login']);
    }
    public function showLoginForm()
    {
        return view('admin.loginAdmin');
    }
    public function login(Request $request)
{
    $this->validate($request, [
        'username' => 'required',
        'password' => 'required|min:8',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/admin/dashboard');
    }

    return redirect()->back()->withInput($request->only('username', 'remember'))->withErrors([
        'username' => 'Proses Login Gagal, Username dan Password Tidak Sesuai.',
    ]);
}

public function dashboard(Request $request)
{
    $admin = Auth::user();
    $query = $request->input('search');
    $searchPerformed = !is_null($query);

    $usersQuery = User::query()
        ->where('role', '!=', 'admin');

    if ($searchPerformed) {
        $usersQuery->where(function ($q) use ($query) {
            $q->where('namaUmkm', 'LIKE', '%' . $query . '%')
              ->orWhere('namaPemilik', 'LIKE', '%' . $query . '%')
              ->orWhere('kontak', 'LIKE', '%' . $query . '%')
              ->orWhere('alamat', 'LIKE', '%' . $query . '%')
              ->orWhere('jenis_usaha', 'LIKE', '%' . $query . '%')
              ->orWhere('username', 'LIKE', '%' . $query . '%')
              ->orWhere('email', 'LIKE', '%' . $query . '%');
        });
    }

    // Modify here to paginate the results
    $users = $usersQuery->paginate(8); // Paginate with 10 items per page
    $noUsersFound = $users->isEmpty();

    return view('admin.dashboard', compact('users', 'admin','noUsersFound', 'searchPerformed', 'query'));
}
public function logout(Request $request)
{
    Auth::guard('web')->logout(); // Use the 'web' guard for logging out users

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/admin/login'); // Redirect to the admin login page after logout
}
public function createForm()
    {
        return view('admin.createUmkm');
    }
    public function editForm($id)
    { 
        $user = User::find($id);
        return view('admin.editUmkm',compact('user'));
    }
public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaUmkm' => 'required|string|max:255',
            'namaPemilik' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'alamat' => 'required|string',
            'mapLink' => 'nullable|string|max:255',
            'kontak' => 'required|string',
            'deskripsi' =>'nullable|string|max:255', 
            'password' => 'required|string|min:8|confirmed', // Validates confirmation too
            'jenis_usaha' => 'required|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);
         // Handle file upload for foto_profil if it's included in the request
         if ($request->hasFile('foto_profil')) {
            
            $filePath = $request->file('foto_profil')->store('foto_profil', 'public');
            $validatedData['foto_profil'] = $filePath;
        }

        $user = new User();
        $user->namaUmkm = $validatedData['namaUmkm'];
        $user->namaPemilik = $validatedData['namaPemilik'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->alamat = $validatedData['alamat'];
        $user->mapLink = $validatedData['mapLink'];
        $user->kontak = $validatedData['kontak'];
        $user->deskripsi = $validatedData['deskripsi'];
        $user->password = Hash::make($validatedData['password']);
        $user->jenis_usaha = $validatedData['jenis_usaha'];
        $user->foto_profil = $validatedData['foto_profil'] ?? null; // Assign foto_profil
        $user->save();

            return redirect()->route('admin.dashboard')->with('success','UMKM berhasil ditambahkan');
       
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data UMKM telah dihapus');
    }
    public function update(Request $request, User $user)
    {
        // Validate data received from the form
        $validatedData = $request->validate([
                'namaUmkm' => 'required|string|max:255',
                'namaPemilik' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'alamat' => 'required|string',
                'mapLink' => 'nullable|string|max:255',
                'kontak' => 'required|string',
                'deskripsi' =>'nullable|string|max:255', 
                'password' => 'nullable|string|min:8|confirmed', // Validates confirmation too
                'jenis_usaha' => 'required|string',
                'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
            ]);
            // // Find the user
            // $user = User::findOrFail($id);
        
            // Handle file upload for foto_profil if it's included in the request
            if ($request->hasFile('foto_profil')) {
                // Delete the old profile photo if it exists
                if ($user->foto_profil) {
                    Storage::disk('public')->delete($user->foto_profil);
                }
        
                // Store the new profile photo
                $filePath = $request->file('foto_profil')->store('foto_profil', 'public');
                $validatedData['foto_profil'] = $filePath;
            }
                // Update user data
                $user->namaUmkm = $validatedData['namaUmkm'];
                $user->namaPemilik = $validatedData['namaPemilik'];
                $user->username = $validatedData['username'];
                $user->email = $validatedData['email'];
                $user->mapLink = $validatedData['mapLink'];
                $user->alamat = $validatedData['alamat'];
                $user->kontak = $validatedData['kontak'];
                $user->deskripsi = $validatedData['deskripsi'];
                $user->password = Hash::make($validatedData['password']);
                $user->jenis_usaha = $validatedData['jenis_usaha'];
        
            // Update foto_profil if provided
            if(isset($validatedData['foto_profil'])){
                $user->foto_profil = $validatedData['foto_profil'];
            }
        
            // Save the updated user instance
            $user->save();
            return redirect()->route('admin.dashboard')->with('success','UMKM berhasil diperbarui.');
        
    }


}

