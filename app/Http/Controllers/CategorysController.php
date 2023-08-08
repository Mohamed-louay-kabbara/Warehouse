<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorysController extends Controller
{

  public function index()
  {
    $category=DB::table('category')->get();
    $masseg=1;
    return view('Category.category',compact('category','masseg'));
  }

  public function create()
  {
    return view('Category.add_category');
  }

  public function store(Request $request)
  {
    DB::table('category')->insert(['Name'=>$request->name]);
    return redirect()->route('categorys.index');
  }

  public function show($id)
  {

  }

  public function edit($id)
  {
  
  }
  public function update(Request $request,$id)
  {
    $category=DB::table('category')->where('id',$id)->first();
    DB::table('category')->where('id',$id)->update(['Name'=>$request->name]);
    return redirect()->route('categorys.index');
  }
  public function destroy($id)
  {
    $category=DB::table('category')->get();
    $matter=DB::table('Matter')->where('CategoryId',$id)->first();
    if($matter!=null){
     
      
return redirect()->back() ->with('alert', 'لا يمكن حذف صنف به مواد تأكد من أنك حذفت كل المواد المرتبطة بهذا الصنف');


    }
    else{
    $category=DB::table('category')->where('id',$id)->delete();
    return back();}

  }

}

?>
