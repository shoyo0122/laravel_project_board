<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BoardEntry;

class BoardEntryController extends Controller
{
    function index(){
        //記事一覧画面を表示
        $item_list = BoardEntry::orderBy("id", "desc")->get();
        return view("board_entry_list", [
            "item_list" => $item_list
        ]);
    }
    function create(Request $request){
        $input = $request->only('author', 'title', 'body');
        
        $entry = new BoardEntry();
        $entry->author = $input["author"];
        $entry->title = $input["title"];
        $entry->body = $input["body"];
        $entry->save();
    
        return redirect('/');
    }
}
