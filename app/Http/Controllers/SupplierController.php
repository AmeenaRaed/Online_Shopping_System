<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/*Functionalities 
    - Add product
    - Update product
    - Delete product
    - View products
 */
class SupplierController extends Controller
{
    public function index(){
        return view('supplier.index');
    }

    public function Reports(){
        return view('supplier.reports');
    }
    //
}
