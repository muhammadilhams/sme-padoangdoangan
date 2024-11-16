<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('loginform')->with('error', 'Akses Ditolak. Silakan Login!');;
    }
    $user = Auth::user();
    $query = $request->input('search');
    $searchPerformed = !is_null($query);

    $productsQuery = Product::query()
        ->where('user_id', $user->id);

    if ($searchPerformed) {
        $productsQuery->where('nama_produk', 'LIKE', '%' . $query . '%');
    }

    // Modify here to paginate the results
    $products = $productsQuery->paginate(10); // Paginate with 10 items per page
    $noProductsFound = $products->isEmpty();

    return view('user.dashboard', compact('user', 'noProductsFound', 'products', 'searchPerformed', 'query'));
}

    public function productGuest($id)
    {
        $product = Product::findOrFail($id);
    
        if (!$product) {
            return abort(404); // Handle not found scenario gracefully
        }
    
        return view('guest.produkDetail', compact('product'));
    }
    
    public function productList(Request $request)
{
    $query = $request->input('search');
    $searchPerformed = !is_null($query);

    $productsQuery = Product::query();

    if ($searchPerformed) {
        $productsQuery->where('nama_produk', 'LIKE', '%' . $query . '%');
    }

    $products = $productsQuery->paginate(12); // Adjust the number of items per page as needed
    $noProductsFound = $products->isEmpty();

    return view('guest.produkList', compact('products', 'noProductsFound', 'searchPerformed', 'query'));
}

    public function showProduct(int $userId, int $productId) //ketika produk dibuka dari UMKM detail
    {
        $product = Product::where('user_id', $userId)
                            ->where('id', $productId)
                            ->firstOrFail();

        return view('guest.produkDetail', compact('product'));
    }
    public function showDetail(Request $request, $id)
{
    $query = $request->input('search');
    $searchPerformed = !is_null($query);

    $user = User::findOrFail($id);

    // Create a products query specific to the user
    $productsQuery = Product::where('user_id', $user->id);

    if ($searchPerformed) {
        $productsQuery->where('nama_produk', 'LIKE', '%' . $query . '%');
    }

    // Paginate the products
    $products = $productsQuery->paginate(6); // Adjust the number of items per page as needed

    $noProductsFound = $products->isEmpty();

    return view('guest.umkmDetail', compact('user', 'products', 'noProductsFound', 'searchPerformed', 'query'));
}



    
    public function umkmList(Request $request)
{
    $query = $request->input('search');
    $searchPerformed = !is_null($query);

    $usersQuery = User::query()
        ->where('role', '!=', 'admin');

    if ($searchPerformed) {
        $usersQuery->where(function ($q) use ($query) {
            $q->where('namaUmkm', 'LIKE', '%' . $query . '%')
              ->orWhere('alamat', 'LIKE', '%' . $query . '%')
              ->orWhere('username', 'LIKE', '%' . $query . '%')
              ->orWhere('email', 'LIKE', '%' . $query . '%');
        });
    }

    $users = $usersQuery->paginate(10); // Adjust the number of items per page as needed
    $noUsersFound = $users->isEmpty();

    return view('guest.umkmList', compact('users', 'noUsersFound', 'searchPerformed', 'query'));
}


    public function create()
    {
        $user = Auth::user();
        return view('user.createProduct',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar_produk' => 'required|image|max:2048', // Assuming you're storing images
        ]);

        $imagePath = $request->file('gambar_produk')->store('images', 'public');

        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar_produk' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('products.index')->with('success', 'Produk Berhasil ditambahkan.');
    }
    

    public function edit(Product $product)
    {
        $user = Auth::user();
        return view('user.editProduct', compact('user', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'nama_produk' => 'required|string',
                'harga' => 'required|string',
                'deskripsi' => 'required|string',
                'gambar_produk' => 'image|max:2048', // Assuming you're storing images
            ]);
    
            $imagePath = $product->gambar_produk; // Default image path
    
            if ($request->hasFile('gambar_produk')) {
                // If a new image is uploaded, update the image path
                $imagePath = $request->file('gambar_produk')->store('images', 'public');
            }
    
            $product->update([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'gambar_produk' => $imagePath,
            ]);
    
            return redirect()->route('products.index')->with('success', 'Informasi Produk Berhasil Diperbarui.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk telah dihapus');
    }
    // public function create()
    // {
    //     return view('filament.products.create');
    // }

    // public function store(Request $request)
    // {
    //     $user = Auth::user();
        
    //     $product = new Product();
    //     $product->nama_produk = $request->nama_produk;
    //     $product->harga = $request->harga;
    //     $product->deskripsi = $request->deskripsi;
    //     $product->gambar_produk = $request->gambar_produk;
    //     $product->user_id = $user->id;
    //     $product->save();

    //     return redirect()->route('filament.products.index');
    // }
}


