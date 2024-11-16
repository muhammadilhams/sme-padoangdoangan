<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
        public function beranda()
    {
        // Fetch only four products
        $products = Product::latest()->take(6)->get();
        // Fetch only four UMKM and not admin
        $users = User::where('role', '!=', 'admin')->latest()->take(6)->get();;

        return view('guest.beranda', compact('users','products'));
    }
    public function dashboard(){
        $user = Auth::user();

        // Pass the user data to the view
        return view('user.dashboard', ['user' => $user]);
        
    }
    public function edit()
    {
        $user = Auth::user();
        return view('user.editProfil', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate data received from the form
        $validatedData = $request->validate([
            'namaUmkm' => 'required|string|max:255',
            'namaPemilik' => 'required|string|max:255',
            'jenis_usaha' => 'required|in:kuliner,fashion,kerajinan,kecantikan,otomotif,agribisnis',
            'alamat' => 'required|string|max:255',
            'mapLink' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'deskripsi' =>'nullable|string|max:255', 
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for foto_profil
        ]);
    
        // Find the user
        $user = User::findOrFail($id);
    
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
        $user->alamat = $validatedData['alamat'];
        $user->mapLink = $validatedData['mapLink'];
        $user->kontak = $validatedData['kontak'];
        $user->jenis_usaha = $validatedData['jenis_usaha'];
        $user->deskripsi = $validatedData['deskripsi'];
    
        // Update foto_profil if provided
        if(isset($validatedData['foto_profil'])){
            $user->foto_profil = $validatedData['foto_profil'];
        }
    
        // Save the updated user instance
        $user->save();
    
        // Redirect or perform other actions after user data is updated
        return redirect()->back()->with('success','Profil berhasil diperbarui.');
    }
    
 
    public function showLoginForm(){
        return view('auth.login');
    }
    public function showRegisterForm(){
        return view('auth.register');
    }
    public function register(Request $request)
    {
        
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'namaUmkm' => 'required|string|max:255|unique:users',
            'namaPemilik' => 'required|string|max:255',
            'username' => 'required|string|max:255|regex:/^\S*$/|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'jenis_usaha' => 'required|in:kuliner,fashion,kerajinan,kecantikan,otomotif,agribisnis',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for foto_profil
        ]);
    
       
        // Handle file upload for foto_profil if it's included in the request
        if ($request->hasFile('foto_profil')) {
            
            $filePath = $request->file('foto_profil')->store('foto_profil', 'public');
            $validatedData['foto_profil'] = $filePath;
        }
    
        // Create a new user instance
        $user = new User();
        $user->namaUmkm = $validatedData['namaUmkm'];
        $user->namaPemilik = $validatedData['namaPemilik'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->alamat = $validatedData['alamat'];
        $user->kontak = $validatedData['kontak'];
        $user->password = Hash::make($validatedData['password']);
        $user->jenis_usaha = $validatedData['jenis_usaha'];
        $user->foto_profil = $validatedData['foto_profil'] ?? null; // Assign foto_profil
        $user->save();
    
        // Redirect atau lakukan tindakan lain setelah user terdaftar
        return redirect()->route('loginform')->with('success','Registrasi berhasil! Silakan Masuk.');
    }
    

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        }

        // Authentication failed
        return redirect()->back()->withInput($request->only('username'))->withErrors([
            'username' => 'Username dan Password Tidak Sesuai',
        ]);
    }    
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginform')->with('success','Berhasil Logout');

    }


}
