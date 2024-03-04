<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservations=Reservation::orderBy('id', 'DESC')->get();
        return view('home',compact('reservations'));
    }

    public function delRes(string $id)
    {
        $reservation=Reservation::find($id);
        $reservation->delete();
        return redirect()->route('home');

    }

    public function menu()
    {
        $categories=Categorie::select('id',"nomCat")->get();//avant d'arrivr a menu on recupere toutes les cateegories
        $menus=Menu::all();
        return view('dash.menu',compact('categories','menus'));//puis on envoie les menus et les categories dans la vue
    }

    public function createMenu(Request $request)
    {
        $file = $request->file('formFile');
        $name = time().$file->getClientOriginalName();

        $file->move('imageMenu',$name);

        Menu::create([
            'nomMenu'=>$request->input('nomMenu'),
            'prixMenu'=>$request->input('prixMenu'),
            'imageMenu'=>$name,
            'categorie_id'=>$request->input('idCat'),
        ]);

        return redirect()->route('addmenu');
    }

    public function delMenu(string $id)
    {
        $menu=Menu::find($id);
        $menu->delete();
        return redirect()->route('addmenu');
    }

    public function updateMenu(Request $request,string $id)
    {
        $menu=Menu::find($id);

        $menu->update([
            'nomMenu'=>$request->input('nomMenu'),
            'prixMenu'=>$request->input('prixMenu'),
            'categorie_id'=>$request->input('idCat'),
        ]);

        return redirect()->route('addmenu');
    }

    public function createCat(Request $request)
    {
        $file = $request->file('formFile');
        $name = time().$file->getClientOriginalName();

        $file->move('imageCat',$name);

        Categorie::create([
            'nomCat' => $request->input('nomCat'),
            'imageCat' => $name,
        ]);

        return redirect()->route('addcategorie');
    }

    public function delCat(string $id)
    {
        $categorie=Categorie::find($id);
        $categorie->delete();
        return redirect()->route('addcategorie');
    }

    public function updateCat(Request $request,string $id)
    {
        $categorie=Categorie::find($id);

        $categorie->update([
            'nomCat'=>$request->input('nomCat'),
        ]);

        return redirect()->route('addcategorie');
    }

    public function table(){
        $tables = Table::all();
        return view('dash.table',compact('tables'));
    }

    public function createTable(Request $request)
    {
        Table::create([
            'nomTab' => $request->input('nomTab'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('addtable');
    }

    public function delTable(string $id)
    {
        $categorie=Table::find($id);
        $categorie->delete();
        return redirect()->route('addtable');
    }

    public function updateTable(Request $request,string $id)
    {
        $table=Table::find($id);

        $table->update([
            'nomTab'=>$request->input('nomTab'),
            'status'=>$request->input('status'),
        ]);

        return redirect()->route('addtable');
    }


}
