<?php

namespace App\Http\Controllers\Panel;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\IOFactory;
class MenuController extends Controller
{

    public function __construct(){
        $this->rules = [

        ];
    }
    public function index(Request $request){

        $rows = Menu::query()
            ->where('parent_id','=',0)
            ->with('children')
            ->get();
        return view('panel.menu.index', compact('rows'));
    }

    public function create(){
        return view('panel.menu.create');
    }

    public function store(Request $request){

        //dd($request->json_output);
        //dd($request->all());

        $request->validate($this->rules);

        $menuArrList = json_decode($request->json_output);
        //dd($menuArrList);

        $this->handleMenus($menuArrList);



        return redirect()->back()
            ->withSuccess('Kontent əlavə edildi');

    }

    public function handleMenus($menuArrList, $parentId = 0){
        //new 1 olarsa id string gelir
        foreach ($menuArrList as $item){
            $item->parent_id = $parentId;
            if ($item->deleted === 1){
                $this->deleteItem($item);
                continue;
            }
            if ($item->new === 1){
                $this->storeItem($item);
                continue;
            }
            //update
            $this->updateItem($item);
        }
    }

    public function storeItem($item){
        //dd($item);
        $row = Menu::create([
            "parent_id" => $item->parent_id,
            "slug"      => $item->slug,
            "name"      => $item->name
        ]);

        $item->id = $row->id;

        if (isset($item->children)){
            return $this->handleMenus($item->children, $item->id);
        }

        return true;
    }
    public function updateItem($item){
        //$item->parent_id = 1;
        //dd($item);
        Menu::where('id','=',$item->id)->update([
            "parent_id" => $item->parent_id,
            "slug" => $item->slug,
            "name" => $item->name
        ]);

        //dd($item->children);
        if (isset($item->children)){
            return $this->handleMenus($item->children, $item->id);
        }

        return true;
    }


    public function deleteItem($item){

        //delete item and keep his children
        Menu::query()
            ->where('parent_id','=', $item->id)
        ->update([
            "parent_id" => 0
        ]);

        Menu::query()
            ->where('id','=',$item)
            ->delete();
    }


}
