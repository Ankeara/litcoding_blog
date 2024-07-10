<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Categories;
use App\Models\Sub_categories;
use App\Models\blogs;
use App\Models\Htmlcss;
use App\Models\Js;
use App\Models\tblreacts;
use App\Models\tblphps;
use App\Models\tbllaravels;
use App\Models\mysqltb;
use App\Models\tblsqlservers;
use App\Models\tbloracles;
use App\Models\tblcsharps;
use App\Models\tbljavas;
use App\Models\tblflutters;
use App\Models\tblpythons;
use App\Models\tbllinuxs;


class FrontendController extends Controller
{
    public function home()
    {
        $users = User::orderBy('created_at','ASC')->get();
        $htmlcss = Htmlcss::orderBy('created_at','ASC')->get();
        $js = Js::orderBy('created_at','ASC')->get();
        $php = tblphps::orderBy('created_at','ASC')->get();
        $laravel = tbllaravels::orderBy('created_at','ASC')->get();
        $mysql = mysqltb::orderBy('created_at','ASC')->get();
        $csharps = tblcsharps::orderBy('created_at','ASC')->get();
        $react = tblreacts::orderBy('created_at','ASC')->get();
        // $nudejs = tblnudes::orderBy('created_at','ASC')->get();
        // $oracle = tbloracles::orderBy('created_at','ASC')->get();
        $sqlserver = tblsqlservers::orderBy('created_at','ASC')->get();
        $java = tbljavas::orderBy('created_at','ASC')->limit(3)->get();
        $blogs = blogs::orderBy('created_at','DESC')->paginate(5);
        $htmlcssLoop = Htmlcss::orderBy('created_at','ASC')->limit(3)->get();
        $jsLoop = Js::orderBy('created_at','ASC')->limit(3)->get();
        $phpLoop = tblphps::orderBy('created_at','ASC')->limit(3)->get();
        $mysqlLoop = mysqltb::orderBy('created_at','ASC')->limit(3)->get();
        $reactLoop = tblreacts::orderBy('created_at','ASC')->limit(3)->get();

        return view('frontend.home',[
            'users' => $users,
            'htmlcss' => $htmlcss,
            'js' => $js,
            'react' => $react,
            // 'nudejs' => $nudejs,
            'php' => $php,
            'laravel' => $laravel,
            'mysql' => $mysql,
            'csharps' => $csharps,
            // 'oracle' => $oracle,
            'sqlserver' => $sqlserver,
            'java' => $java,
            'blogs' => $blogs,
            'htmlcssLoop' => $htmlcssLoop,
            'jsLoop' => $jsLoop,
            'reactLoop' => $reactLoop,
            'phpLoop' => $phpLoop,
            'mysqlLoop' => $mysqlLoop,
        ]);
    }

    // Start template code
   public function template(Request $request)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

        $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            tbllinuxs::class => 'linux',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }


        return view('frontend.template', array_merge([
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End template code


    // Start HTML CSS code
    public function htmldetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

         $html = Htmlcss::where([
            'id' => $id
        ])->first();

        if ($html == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'html' => $html,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End HTML CSS code


    // Start JavaScript code
     public function jsdetail(Request $request, $id)
    {

        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $js = Js::where([
            'id' => $id
        ])->first();

        if ($js == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'js' => $js,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End JavaScript template code

    // Start React Js code
     public function reactdetail(Request $request, $id){
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }
        $reactjs = tblreacts::where([
            'id' => $id
        ])->first();

        if ($reactjs == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'reactjs' => $reactjs,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End React Js code


    // Start PHP code
    public function phpdetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $phpdetail = tblphps::where([
            'id' => $id
        ])->first();

        if ($phpdetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'phpdetail' => $phpdetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End PHP code


    // Start Laravel code
     public function laraveldetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $laraveldetail = tbllaravels::where([
            'id' => $id
        ])->first();

        if ($laraveldetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'laraveldetail' => $laraveldetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End Laravel code


    // Start Mysql code
    public function mysqldetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $mysqldetail = mysqltb::where([
            'id' => $id
        ])->first();

        if ($mysqldetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'mysqldetail' => $mysqldetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End Mysq code


    // Start Sql Server code
    public function sqlserverdetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $sqlserverdetail = mysqltb::where([
            'id' => $id
        ])->first();

        if ($sqlserverdetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'sqlserverdetail' => $sqlserverdetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End Sql Server code


    // Start Oracle code
    public function oracledetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $oracledetail = mysqltb::where([
            'id' => $id
        ])->first();

        if ($oracledetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'oracledetail' => $oracledetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End Oracle code


    // Start Java code
    public function javadetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $javadetail = tbljavas::where([
            'id' => $id
        ])->first();

        if ($javadetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'javadetail' => $javadetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End Java code


    // Start C# code
    public function csharpdetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $csharpdetail = tblcsharps::where([
            'id' => $id
        ])->first();

        if ($csharpdetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'csharpdetail' => $csharpdetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End C# code


    // Start Flutter code
    public function flutterdetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $flutterdetail = tblflutters::where([
            'id' => $id
        ])->first();

        if ($flutterdetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'flutterdetail' => $flutterdetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End Flutter code


    // Start Python code
    public function pythondetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

         $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $pythondetail = tblpythons::where([
            'id' => $id
        ])->first();

        if ($pythondetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'pythondetail' => $pythondetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }
    // End Python code


     public function linuxdetail(Request $request, $id)
    {
        $category = Categories::orderBy('name', 'ASC')->get();
        $subcategory = Sub_categories::orderBy('name', 'ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();

        $tables = [
            Htmlcss::class => 'htmlcss',
            Js::class => 'javascript',
            tblreacts::class => 'react',
            tblphps::class => 'php',
            tbllaravels::class => 'laravel',
            mysqltb::class => 'mysql',
            tblsqlservers::class => 'sqlserver',
            tbloracles::class => 'oracle',
            tblcsharps::class => 'csharp',
            tbljavas::class => 'java',
            tblflutters::class => 'flutter',
            tblpythons::class => 'python',
            tbllinuxs::class => 'linux',
        ];

        $queries = [];
        foreach ($tables as $model => $key) {
            $queries[$key] = $model::orderBy('created_at', 'ASC');
        }

        if (!empty($request->keywords)) {
            foreach ($queries as $key => $query) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->orWhere('title', 'like', '%' . $request->keywords . '%')
                             ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
                });
            }
        }

        if (!empty($request->category)) {
            foreach ($queries as $key => $query) {
                $query->where('category_id', $request->category);
            }
        }

        if (!empty($request->subcategory)) {
            foreach ($queries as $key => $query) {
                $query->where('sub_category_id', $request->subcategory);
            }
        }

        $data = [];
        foreach ($queries as $key => $query) {
            $data[$key] = $query->get();
        }

        $linuxdetail = tbllinuxs::where([
            'id' => $id
        ])->first();

        if ($linuxdetail == null) {
            abort(404);
        }
        return view('frontend.template-detail', array_merge([
            'linuxdetail' => $linuxdetail,
            'category' => $category,
            'subcategory' => $subcategory,
            'blog' => $blog,
        ], $data));
    }

    public function blog(Request $request)
    {
        $category = Categories::orderBy('name','ASC')->get();
        $subcategory = Sub_categories::orderBy('name','ASC')->get();
        $htmlcssQuery = Htmlcss::orderBy('created_at', 'ASC');
        $blog = blogs::orderBy('created_at', 'ASC')->get();
        $blogSidebar = blogs::orderBy('created_at', 'ASC')->get();
        $javascriptQuery = Js::orderBy('created_at', 'ASC');

        if (!empty($request->keywords)) {
            $blog->where(function ($query) use ($request) {
                $query->orWhere('title', 'like', '%' . $request->keywords . '%')
                    ->orWhere('keywords', 'like', '%' . $request->keywords . '%');
            });
        }

        if (!empty($request->category)) {
            $htmlcssQuery->where('category_id', $request->category);
            $javascriptQuery->where('category_id', $request->category);
        }

        if (!empty($request->subcategory)) {
            $htmlcssQuery->where('sub_category_id', $request->subcategory);
            $javascriptQuery->where('sub_category_id', $request->subcategory);
        }

        $htmlcss = $htmlcssQuery->get();
        $javascript = $javascriptQuery->get();

        return view('frontend.blog', [
            'category' => $category,
            'subcategory' => $subcategory,
            'htmlcss' => $htmlcss,
            'javascript' => $javascript,
            'blog' => $blog,
            'blogSidebar' => $blogSidebar,
        ]);
    }

     public function blogdetail(Request $request, $id)
    {
        $category = Categories::orderBy('name','ASC')->get();
        $subcategory = Sub_categories::orderBy('name','ASC')->get();
        $blog = blogs::orderBy('created_at', 'ASC')->get();
        $blogSidebar = blogs::orderBy('created_at', 'ASC')->get();
        $blog = blogs::where([
            'id' => $id
        ])->first();

        if ($blog == null) {
            abort(404);
        }
        return view('frontend.blog-detail', [
            'blog' => $blog,
            'category' => $category,
            'subcategory' => $subcategory,
            'blogSidebar' => $blogSidebar,

        ]);
    }

   public function downloadFileHtml($id)
    {
        $downloadFile = DB::table('htmlcss')->where('id', $id)->first();

        // Check if the file exists in the database record
        if (!$downloadFile || empty($downloadFile->download_file)) {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found.');
        }

        $pathToFile = public_path("/default/html/{$downloadFile->download_file}");

        // Check if the file exists on the file system
        if (!file_exists($pathToFile)) {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found on server.');
        }

        return \Response::download($pathToFile);
    }
   public function downloadFilejs($id)
    {
        $downloadFile = DB::table('js')->where('id', $id)->first();

        // Check if the file exists in the database record
        if (!$downloadFile || empty($downloadFile->download_file)) {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found.');
        }

        $pathToFile = public_path("/default/javascript/{$downloadFile->download_file}");

        // Check if the file exists on the file system
        if (!file_exists($pathToFile)) {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found on server.');
        }

        return \Response::download($pathToFile);
    }

       public function downloadFilephp($id)
    {
        $downloadFile = DB::table('tblphps')->where('id', $id)->first();

        // Check if the file exists in the database record
        if (!$downloadFile || empty($downloadFile->download_file)) {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found.');
        }

        $pathToFile = public_path("/default/php/{$downloadFile->download_file}");

        // Check if the file exists on the file system
        if (!file_exists($pathToFile)) {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found on server.');
        }

        return \Response::download($pathToFile);
    }

}