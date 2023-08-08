<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bills;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller 
{
  public function index()
  {
    $Bills=Bills::all(); 
    return view('Bills.Bills',compact('Bills'));
  }

  public function create()
  {
    return view('Bills.add_bill');
  }

  public function store(Request $request)
  {			
    DB::table('bill')->insert([
      'Resource_name'=>$request->Resource_name,
      'price'=>$request->price,
      'count'=>$request->count,
      'created_date'=>$request->created_date,
    ]);
    return redirect()->route('bills.index');
  }

  public function show($id)
  {
    
  }

  public function edit($id)
  {
    $Bill= Bills::find($id);
    return view('Bills.edit',compact('Bill'));
  }

  public function update($id,Request $request)
  {
    DB::table('bill')->where('id',$id)->update([
    'Resource_name'=>$request->Resource_name,
    'price'=>$request->price,
    'count'=>$request->count]);
    return redirect()->route('bills.index');
  }

  public function destroy($id)
  {
    DB::table('bill')->where('id',$id)->delete();
    return back(); 
  }
  
}

?>