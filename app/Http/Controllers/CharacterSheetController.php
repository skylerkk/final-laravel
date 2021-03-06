<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CharacterSheet;
use App\Models\CharacterStats;
use App\Models\CharacterInfo;
use App\Models\CharacterSkills;
use App\Models\Skills;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        // return $sheet::where('id')->get();
        $stats = CharacterStats::where('character_sheet_id', $id)->get();
        $info = CharacterInfo::where('character_sheet_id', $id)->get();
        return response(['stats' => $stats, 'sheet' => $sheet, 'info' => $info]);   
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
        $skills = new CharacterSkills();
        $skills->character_sheet_id = $sheet->id;
        $skills->athletics = $input['athletics'];
        $skills->acrobatics = $input['acrobatics'];
        $skills->sleightofhand = $input['sleight'];
        $skills->stealth = $input['stealth'];
        $skills->arcana = $input['arcana'];
        $skills->history = $input['history'];
        $skills->investigation = $input['investigation'];
        $skills->nature = $input['nature'];
        $skills->religion = $input['religion'];
        $skills->animalhandling = $input['animalHandling'];
        $skills->insight = $input['insight'];
        $skills->medicine = $input['medicine'];
        $skills->perception = $input['perception'];
        $skills->survival = $input['survival'];
        $skills->deception = $input['deception'];
        $skills->intimidation = $input['intimidation'];
        $skills->performance = $input['performance'];
        $skills->persuasion = $input['persuasion'];
        $skills->save();
        return response([ 'message' => 'Sheet created successfully!', 'status' => true]);
    }

    public function delete_sheet(Request $request){
        $input = $request->all();
        CharacterSheet::find($input['id'])->delete();
        return response([ 'message' => 'Sheet deleted successfully!', 'status' => true]);
    }


    public function update_sheet_stats(Request $request){
        $input = $request->all();
        $stats = CharacterStats::where('character_sheet_id', $input['id'])->get()->first();
        foreach ($input as $field => $value){
            if($field != 'id'){
                $stats[$field] = $value;
            }
        }
        $stats->save();
        return $stats->toArray();
    }

    public function update_sheet_skills(Request $request){
        $input = $request->all();
        $skills = CharacterSkills::where('character_sheet_id', $input['id'])->get()->first();
        foreach ($input as $field => $value){
            if($field != 'id'){
                $skills[$field] = $value;
            }
        }
        $skills->save();
        return $skills->toArray();
    }

    public function update_sheet_info(Request $request){
        $input = $request->all();
        $info = CharacterInfo::where('character_sheet_id', $input['id'])->get()->first();
        foreach ($input as $field => $value){
            if($field != 'id'){
                $info[$field] = $value;
            }
        }
        $info->save();
        return $info->toArray();
    }

    public function get_skills(){
        $info = Skills::get();
        return $info;
    }
}
