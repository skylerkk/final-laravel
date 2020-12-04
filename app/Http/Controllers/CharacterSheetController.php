<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CharacterSheet;
use App\Models\CharacterStats;
use App\Models\CharacterInfo;

class CharacterSheetController extends Controller
{
    public function sayHello(){
        return "Hello";
    }

    public function get_sheets($id){
        // $input = $request->all();
        // dd($request);
        $sheets = CharacterSheet::where('user_id', $id)->get();
        return $sheets;
    }

    public function get_one_sheet($id){
        $sheet = CharacterSheet::where('id', $id)->get();
        $stats = CharacterStats::where('character_sheet_id', $sheet);
        $info = CharacterInfo::where('character_sheet_id', $sheet);
        return $sheet;
    }

    public function create_sheet(Request $request){
        $input = $request->all();
        $sheet = new CharacterSheet();
        $sheet->user_id = $input['id'];
        $sheet->save();
        $stats = new CharacterStats();
        $stats->character_sheet_id = $sheet->id;
        $stats->str = $input['str'];
        $stats->dex = $input['dex'];
        $stats->con = $input['con'];
        $stats->int = $input['int'];
        $stats->wil = $input['wil'];
        $stats->cha = $input['cha'];
        $stats->save();
        $info = new CharacterInfo();
        $info->character_sheet_id = $sheet->id;
        $info->player_name = $input['player_name'];
        $info->character_name = $input['character_name'];
        $info->level = $input['level'];
        $info->race = $input['race'];
        $info->class = $input['class'];
        $info->size = $input['size'];
        $info->alignment = $input['alignment'];
        $info->save();
        return response([ 'message' => 'Sheet created successfully!', 'status' => true]);
    }
}
