<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RestoController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('pages.index',compact('menus'));
    }

    public function menu(){
        $menus=Menu::all();
        return view('pages.menu', compact('menus'));
    }

    public function categorie()
    {
        $categories = Categorie::all();
        return view('pages.categorie',compact('categories'));
    }

    public function menuToCat(Request $request,string $id){
        $menuToCat=Menu::where('categorie_id',$id)->get();
        return view('pages.menuToCat',compact('menuToCat'));
    }

    public function reservation(){
        $tables=Table::where('status',1)->get();
        return view('pages.reservation',compact('tables'));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'people' => 'required|min:1|max:4',
            'table' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('reservation')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            Client::create([
                'nomCli'=>$request->input('name'),
                'emailCli'=>$request->input('email'),
                'telCli'=>$request->input('phone'),
            ]);

            $client=Client::orderBy('id', 'DESC')->first();

            Mail::to('manuelakengni51@gmail.com')->send(new ReservationMail($client));

            Reservation::create([
                'dateReserv'=>$request->input('date'),
                'heureReserv'=>$request->input('time'),
                'nbrePer'=>$request->input('people'),
                'client_id'=>$client->id,
                'table_id'=>$request->input('table'),
            ]);

            session()->flash('succes','RESERVATION EFFECTUEE AVEC SUCCES');

            return redirect()->route('reservation');
        }
    }
}
