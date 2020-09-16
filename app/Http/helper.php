<?php

if(!function_exists('setting'))
{
    function setting()
    {
        return \App\Model\Setting::orderBy('id','desc')->first(); 
    }
}

if(!function_exists('get_parent'))
{
    function get_parent($dep_id)
    {
        $list_department =[];

        $departments = \App\Model\Department::find($dep_id);

        if(  $departments->parent !== null && $departments->parent > 0)
        {
            // array_push($list_department, $dep_id);

            return get_parent($departments->parent).",". $dep_id;
        }else{
            return $dep_id;
        }



        //return json_encode($dep_arr,JSON_UNESCAPED_UNICODE);
    }
}


////////////////////////////////////// Scan Mall Id Exists ///////////////////////////////////
if(!function_exists('check_mall')) {
    
    function check_mall($id,$pid)
    {
        return \App\Model\MallProduct::where('product_id',$pid)->where('molls_id',$id)->count() > 0?true:false;
    }
}
////////////////////////////////////// Scan Mall Id Exists ///////////////////////////////////



if(!function_exists('load_dep'))
{
    function load_dep($select=null, $dep_hide=null)
    {
        $departments = \App\Model\Department::selectRaw('dep_name_'.session('lang').' as text')
        ->selectRaw('id as id')
        ->selectRaw('parent as parent')
        ->get(['text','parent','id']);

        $dep_arr =[];

        foreach ($departments as  $department) 
        {
            $list_arr =[];

            $list_arr['icon']       = '';
            $list_arr['li_attr']    = '';
            $list_arr['a_attr']     = '';
            $list_arr['childern']   = [];

            if ($select !== null && $select == $department->id)
            {
                $list_arr['state']      = 
                [
                    'opened'    =>true,
                    'selected'  =>true,
                    'disabled'  =>false,
                ];
                
            }

            if ($dep_hide !== null && $dep_hide == $department->id)
            {
                $list_arr['state']      = 
                [
                    'opened'    =>false,
                    'selected'  =>false,
                    'disabled'  =>true,
                    'hidden'  =>true,
                ];
                
            }

            $list_arr['id']     = $department->id;
            $list_arr['parent'] = $department->parent !== null? $department->parent  : '#' ;
            $list_arr['text']   = $department->text;

            array_push($dep_arr,$list_arr);
        }

        return json_encode($dep_arr,JSON_UNESCAPED_UNICODE);
    }
}

if(!function_exists('up'))
{
    function up()
    {
        return new \App\Http\Controllers\Upload; 
    }
}

if(!function_exists('aurl'))
{
    function aurl($url=null)
    {
        return url('admin/'.$url);
    }
}

if(!function_exists('surl'))
{
    function surl($url=null)
    {
        return url('user/'.$url);
    }
}

if(!function_exists('atrans'))
{
    function atrans($trans=null)
    {
        return trans('admin.'.$trans);
    }
}

if(!function_exists('active_menu'))
{
    function active_menu($link)
    {
        
        if (preg_match('/'.$link.'/i', Request::segment(2))) 
        {    
            return ['menu-open','display:block','active'];
        }else {
            return ['','',''];
        }
    }
}

if(!function_exists('active_menu_s'))
{
    function active_menu_s($link)
    {
        
        if (preg_match('/'.$link.'/i', Request::segment(3))) 
        {    
            return ['active'];
        }else {
            return [''];
        }
    }
}

if(!function_exists('active_help'))
{
    function active_help($link_s,$link)
    {

        return active_menu_s($link_s)[0]?'':active_menu($link)[2];

    }
}


if(!function_exists('admin'))
{
    function admin()
    {
        return auth()->guard('admin');
    }
}

if(!function_exists('user'))
{
    function user()
    {
        return auth()->guard('user');
    }
}

if(!function_exists('lang'))
{
    function lang()
    {
        if (session()->has('lang')) {
            
            return session('lang');
        }else
        {
            session()->put('lang',setting()->main_lang);
            return setting()->main_lang;
        }
    }
}

if(!function_exists('direction'))
{
    function direction()
    {
        if (session()->has('lang')) {
            
            if (session('lang') == 'ar') 
            {
                return 'rtl';
            }else{
                return 'ltr';
            }
        }
        else
        {
            return 'ltr';
        }
    }
}

if(!function_exists('datatabl_lang'))
{
    function datatabl_lang()
    {
        return [
            'sProcessing'           =>trans('admin.sProcessing'),
            'sLengthMenu'           =>trans('admin.sLengthMenu'),
            'sZeroRecords'          =>trans('admin.sZeroRecords'),
            'sEmptyTable'           =>trans('admin.sEmptyTable'),
            'sInfo'                 =>trans('admin.sInfo'),
            'sInfoEmpty'            =>trans('admin.sInfoEmpty'),
            'sInfoFiltered'         =>trans('admin.sInfoFiltered'),
            'sInfoPostFix'          =>trans('admin.sInfoPostFix'),
            'sSearch'               =>trans('admin.sSearch'),
            'sUrl'                  =>trans('admin.sUrl'),
            'sInfoThousands'        =>trans('admin.sInfoThousands'),
            'sLoadingRecords'       =>trans('admin.sLoadingRecords'),
            "oPaginate"=> 
            [
                "sFirst"            =>trans('admin.sFirst'),
                "sLast"             =>trans('admin.sLast'),
                "sNext"             =>trans('admin.sNext'),
                "sPrevious"         =>trans('admin.sPrevious'),
            ],
            "oAria" => 
            [
                "sSortAscending"    =>trans('admin.sSortAscending'),
                "sSortDescending"   =>trans('admin.sSortDescending'),
            ]
        ];
    }
}


///////////////////// valedate Helper Functions ////////////////////////////////
if(!function_exists('v_image'))
{
    function v_image($ext=null)
    {
        if($ext === null)
        {
            return 'image|mimes:jpeg,png,jpg,gif,svg,bmp';
        }else
        {
            return 'image|mimes:'.$ext;
        }
    }
}
///////////////////// valedate Helper Functions ////////////////////////////////
