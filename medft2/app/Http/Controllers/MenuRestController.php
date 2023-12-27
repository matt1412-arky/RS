<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuRestController extends Controller
{
    public function parentMenu()
    {
        $menu = DB::table('view_menus')->select('menu_id', 'nama_menu', 'url', 'parent_id', 'big_icon', 'small_icon')
            ->where('parent_id', 0)
            ->where('role_id', '<>', 5)
            ->get();
        return response()->json($menu, 200);
    }

    public function publicMenu()
    {
        $menu = DB::table('view_menus')->select('menu_id', 'nama_menu', 'url', 'big_icon', 'small_icon')
            ->where('role_id', 5)->get();
        return response()->json($menu, 200);
    }

    public function childMenu($parent_id)
    {
        $menu = DB::table('m_menus')->select('id', 'name', 'url', 'parent_id', 'big_icon', 'small_icon')
            ->where('parent_id', $parent_id)
            ->get();
        return response()->json($menu, 200);
    }

    public function menuRole($role_id)
    {
        $menu = DB::table('view_menus')->select('menu_id', 'nama_menu', 'url', 'parent_id', 'big_icon', 'small_icon')
            ->where('role_id', $role_id)
            ->where('parent_id', '=', 0)->get();
        return response()->json($menu, 200);
    }
}
