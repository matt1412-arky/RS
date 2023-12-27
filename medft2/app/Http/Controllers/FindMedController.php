<?php

namespace App\Http\Controllers;

use App\Models\m_medical_item;
use App\Models\m_medical_item_category;
use App\Models\m_medical_item_segmentation;
use App\Models\t_current_doctor_specialization;
use App\Models\t_doctor_treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FindMedController extends Controller
{
    public function index(){
        $medCat = m_medical_item_category::get();
        $medSeg = m_medical_item_segmentation::get();
        return view('findMed.index', ['medCat'=>$medCat, 'medSeg'=>$medSeg]);
    }

    public function find(Request $req){
        // find query
            $query = m_medical_item::with('medical_item_category', 'medical_item_segmentation');
            $message = [];
        
            if ($req->medCat) {
                $query->where('medical_item_category_id', $req->medCat);
                $message[] = "Kategori ".m_medical_item_category::where('id', $req->medCat)->value('name');
            }
        
            if ($req->keyword) {
                $query->where(function ($q) use ($req) {
                    $q->where('name', 'ILIKE', '%' . $req->keyword . '%')
                    ->orWhere('indication', 'ILIKE', '%' . $req->keyword . '%');
                });
                $message[] = "Kata Kunci ".$req->keyword;
            }
        
            if ($req->medSeg) {
                $query->where('medical_item_segmentation_id', $req->medSeg);
                $message[] = "Cari Obat Generik Tanpa Resep";
            }
        
            $minPrice = 0;
            if ($req->minPrice) {
                $formattedMinPrice = number_format($req->minPrice, 0, ',', '.');
                $query->where('price_min', '>', $req->minPrice);
                $message[] = "dari Harga Rp." . $formattedMinPrice;
                $minPrice = 1;
            }
        
            if ($req->maxPrice) {
                $query->where('price_max', '<', $req->maxPrice);
                $formattedMaxPrice = number_format($req->maxPrice, 0, ',', '.');
                if($minPrice == 1){
                    $message[] = "sampai dengan Rp.".$formattedMaxPrice;
                } else{
                    $message[] = "harga dibawah Rp.".$formattedMaxPrice;
                }
            }
        
            $medItem = $query->paginate(6)->appends(request()->query());
            $message = join(", ", $message);

        // return response()->json($medItem);
        return view('findMed.find', ['medItem'=>$medItem, 'message'=>$message]);
    }
    
    public function cart(Request $req)
    {
        // Retrieve the array from the request
        $cartData = $req->input('cartData');
        $foundItems = [];
    
        foreach ($cartData as $data) {
            // Use findOrFail to throw an exception if the item is not found
            $foundItem = m_medical_item::findOrFail($data['item_id']);
            $foundItem->amount = $data['qty'];
            $foundItems[] = $foundItem;
        }
    
        // Process the array or pass it to a view
        // return response()->json(['found' => $foundItems]);
        return view('findMed.cart', ['found'=>$foundItems]);
    }
    
}