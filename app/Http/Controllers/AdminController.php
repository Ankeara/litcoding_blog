<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use App\Models\Categories;
use App\Models\Htmlcss;
use App\Models\Js;
use App\Models\Sub_categories;
use App\Models\tblcsharps;
use App\Models\tbljavas;
use App\Models\tbllaravels;
use App\Models\tbllinuxs;
use App\Models\mysqltb;
use App\Models\tblnudes;
use App\Models\tblphps;
use App\Models\tblreacts;
use App\Models\tbloracles;
use App\Models\tblflutters;
use App\Models\tblpythons;
use App\Models\tblsqlservers;
use App\Models\User;
use App\Models\tbladmintemplates;
use App\Models\tbltemplates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // login
    public function registation()
    {
        return view('backend.register');
    }

    // proccess register
    public function proccessRegistation(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|same:password_confirm',
            'password_confirm' => 'required',
        ]);

        // Check if the email already exists
        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'status' => false,
                'errors' => ['email' => ['This email is already registered.']],
            ]);
        }

        if($validator->passes())
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success', 'You have registered successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    // Profile
   public function profile()
    {
        // Show templates by author
        $commonQuery = function($model) {
            return $model::where('creator_id', auth()->id())
                ->with(['user', 'category', 'subcategory'])
                ->orderBy('created_at', 'ASC')
                ->get();
        };

        $htmlcssByAuthor = $commonQuery(Htmlcss::class);
        $jsByAuthor = $commonQuery(Js::class);
        $reactByAuthor = $commonQuery(tblreacts::class);
        $phpByAuthor = $commonQuery(tblphps::class);
        $laravelByAuthor = $commonQuery(tbllaravels::class);
        $mysqlByAuthor = $commonQuery(mysqltb::class);
        $oracleByAuthor = $commonQuery(tbloracles::class);
        $sqlserverByAuthor = $commonQuery(tblsqlservers::class);
        $javaByAuthor = $commonQuery(tbljavas::class);
        $csharpByAuthor = $commonQuery(tblcsharps::class);
        $pythonByAuthor = $commonQuery(tblpythons::class);
        $flutterByAuthor = $commonQuery(tblflutters::class);
        $blogByAuthor = $commonQuery(blogs::class);

        return view('backend.profile',[
            'htmlcssByAuthor' => $htmlcssByAuthor,
            'jsByAuthor' => $jsByAuthor,
            'reactByAuthor' => $reactByAuthor,
            'phpByAuthor' => $phpByAuthor,
            'laravelByAuthor' => $laravelByAuthor,
            'mysqlByAuthor' => $mysqlByAuthor,
            'oracleByAuthor' => $oracleByAuthor,
            'sqlserverByAuthor' => $sqlserverByAuthor,
            'javaByAuthor' => $javaByAuthor,
            'csharpByAuthor' => $csharpByAuthor,
            'pythonByAuthor' => $pythonByAuthor,
            'flutterByAuthor' => $flutterByAuthor,
            'blogByAuthor' => $blogByAuthor,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:30',
            'email' => 'required|email|unique:users,email,'.$id.',id',
        ]);

        if($validator->passes())
        {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->description = $request->description;
            $user->mobile = $request->mobile;
            $user->skill = $request->skill;
            $user->link_fb = $request->link_fb;
            $user->link_tl = $request->link_tl;
            $user->link_ig = $request->link_ig;
            $user->link_yt = $request->link_yt;
            $user->link_x = $request->link_x;
            $user->save();

            session()->flash('success', 'Profile updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

     public function updateProfilePic(Request $request)
    {
        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if ($validator->passes()) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id . '-' . time() . '.' . $ext;
            $image->move(public_path('/profile/'), $imageName);

            // Delete old image (if exists)
            $oldImage = Auth::user()->image;
            if ($oldImage) {
                File::delete(public_path('/profile/' . $oldImage));
            }
            User::where('id', $id)->update(['image' => $imageName]);

            session()->flash('success', 'Profile updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // profile

    // authenticate login to dashboard
    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes())
        {
          if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect()->route('backend.dashboard')->with("success", "Welcome your'e login successfully.");
            }else{
                return redirect()->route('backend.login')->with("error","Either Email/password is incorrect?");
            }
        }else{
            return redirect()->route('backend.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }


    // login
    public function login()
    {
        return view('backend.login');
    }

    // Logout
      public function logout()
    {
        Auth::logout();
        return redirect()->route('backend.login')->with('success','you are logout successfully');
    }

    // Page dashboard
    public function dashboard()
    {
        // Fetching general data
        $users = User::orderBy('created_at', 'ASC')->get();
        $htmlcss = Htmlcss::orderBy('created_at', 'ASC')->get();
        $js = Js::orderBy('created_at', 'ASC')->get();
        $phps = tblphps::orderBy('created_at', 'ASC')->get();
        $laravel = tbllaravels::orderBy('created_at', 'ASC')->get();
        $mysql = mysqltb::orderBy('created_at', 'ASC')->get();
        $csharps = tblcsharps::orderBy('created_at', 'ASC')->get();
        $react = tblreacts::orderBy('created_at', 'ASC')->get();
        $sqlserver = tblsqlservers::orderBy('created_at', 'ASC')->get();
        $java = tbljavas::orderBy('created_at', 'ASC')->get();
        $oracle = tbloracles::orderBy('created_at', 'ASC')->get();
        $blogs = blogs::orderBy('created_at', 'DESC')->paginate(8);

        // Show templates by author
        $commonQuery = function($model) {
            return $model::where('creator_id', Auth::user()->id)
                ->with(['user', 'category', 'subcategory'])
                ->orderBy('created_at', 'ASC')
                ->paginate(5);
        };

        $htmlcssByAuthor = $commonQuery(Htmlcss::class);
        $jsByAuthor = $commonQuery(Js::class);
        $reactByAuthor = $commonQuery(tblreacts::class);
        $phpByAuthor = $commonQuery(tblphps::class);
        $laravelByAuthor = $commonQuery(tbllaravels::class);

        return view('backend.dashboard', [
            'users' => $users,
            'htmlcss' => $htmlcss,
            'js' => $js,
            'react' => $react,
            'phps' => $phps,
            'laravel' => $laravel,
            'mysql' => $mysql,
            'csharps' => $csharps,
            'oracle' => $oracle,
            'sqlserver' => $sqlserver,
            'java' => $java,
            'blogs' => $blogs,
            'htmlcssByAuthor' => $htmlcssByAuthor,
            'jsByAuthor' => $jsByAuthor,
            'reactByAuthor' => $reactByAuthor,
            'phpByAuthor' => $phpByAuthor,
            'laravelByAuthor' => $laravelByAuthor,
        ]);
    }


    // Show category
    public function viewcategory(){
        $category = Categories::orderBy('created_at','ASC')->paginate(5);
            return view ('backend.category-add.category.view', [
                'category' => $category,
        ]);
    }

    // Go to page create
    public function createcategory()
    {
        return view('backend.category-add.category.create');
    }
    public function savecategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image_cate' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $category = new Categories();
        $category->name = $request->name;

        if ($request->hasFile('image_cate')) {
            $imageName = time().'.'.$request->image_cate->extension();
            $request->image_cate->move(public_path('/default/category'), $imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('success', 'Category saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    public function editcategory(Request $request, $id)
    {
        $category = Categories::where([
            'id' => $id
        ])->first();

        if ($category == null) {
            abort(404);
        }
        return view('backend.category-add.category.edit', [
            'category' => $category,
        ]);
    }

    public function updatecategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image_cate' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $category = Categories::find($id);
        if (!$category) {
            return response()->json([
                'status' => false,
                'errors' => ['Category not found.']
            ]);
        }

        $category->name = $request->name;

        if ($request->hasFile('image_cate')) {
            // Delete old image if it exists
            if ($category->image) {
                $oldImagePath = public_path('/default/category/' . $category->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Upload new image
            $imageName = time() . '.' . $request->image_cate->extension();
            $request->image_cate->move(public_path('/default/category'), $imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('success', 'Category updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

     // Show category
    public function viewsubcategory(){
        $category = Categories::orderBy('created_at','ASC')->get();

        $subcategory = Sub_categories::orderBy('created_at','ASC')->paginate(20);
            return view ('backend.category-add.subcategory.view', [
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Go to page create
    public function createsubcategory(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC');
            return view ('backend.category-add.subcategory.create', [
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    public function savesubcategory(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => true,
                'errors' => $validator->errors(),
            ]);
        }

        $subcategory = new Sub_categories();
        $subcategory->name = $request->name;
        $subcategory->save();
        session()->flash('success', 'Sub Category saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // go to page update sub category
    public function editsubcategory(Request $request, $id)
    {
        $subcategory = Sub_categories::where([
            'id' => $id
        ])->first();

        if ($subcategory == null) {
            abort(404);
        }
        return view('backend.category-add.subcategory.edit', [
            'subcategory' => $subcategory,
        ]);
    }

    // Update sub category
    public function updatesubcategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $subcategory = Sub_categories::find($id);
        if (!$subcategory) {
            return response()->json([
                'status' => false,
                'errors' => ['Category not found.']
            ]);
        }

        $subcategory->name = $request->name;
        $subcategory->save();
        session()->flash('success', 'Sub category updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }


    // ======== HTML CSS session ========
    // Show html css
   public function viewhtml(){
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $htmlcss = Htmlcss::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.html.view', [
            'htmlcss' => $htmlcss,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createhtml(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $htmlcss = Htmlcss::orderBy('created_at','ASC')->get();
            return view ('backend.template.html.create', [
                'htmlcss' => $htmlcss,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save HTML CSS to database
    public function saveHtml(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_html' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_html' => 'nullable|string|max:255',
            'video_html' => 'nullable|text',
            'description_video_html' => 'nullable|string',
            'header_html' => 'required|string|max:255',
            'description_html' => 'required|string',
            'html_code' => 'required|string',
            'description_css' => 'nullable|string',
            'css_code' => 'nullable|string',
            'description_js' => 'nullable|string',
            'js_code' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $html = new Htmlcss();
        $html->title = $request->title;
        $html->creator_id = Auth::id();
        $html->category_id = $request->category_id;
        $html->sub_category_id = $request->sub_category_id;
        $html->description_header = $request->description_header;
        $html->title_video_html = $request->title_video_html;
        $html->video_html = $request->video_html;
        $html->description_video_html = $request->description_video_html;
        $html->header_html = $request->header_html;
        $html->description_html = $request->description_html;
        $html->html_code = $request->html_code;
        $html->description_css = $request->description_css;
        $html->css_code = $request->css_code;
        $html->description_js = $request->description_js;
        $html->js_code = $request->js_code;
        $html->last_description = $request->last_description;
        $html->keywords = $request->keywords;
        $html->github_link = $request->github_link;
        $html->status = $request->status;

        if ($request->hasFile('image_html')) {
            $imageName = time() . '.' . $request->image_html->extension();
            $request->image_html->move(public_path('/default/html'), $imageName);
            $html->image_html = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/html'), $imageName);
            $html->download_file = $imageName;
        }

        $html->save();
        session()->flash('success', 'HTML CSS template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit HTML CSS
    public function edithtml($id) {
        $htmlcss = Htmlcss::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.html.edit', [
            'htmlcss' => $htmlcss,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }


    // Update HTML CSS
    public function updatehtml(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_html' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_html' => 'nullable|string|max:255',
            'video_html' => 'nullable|string',
            'description_video_html' => 'nullable|string',
            'header_html' => 'required|string|max:255',
            'description_html' => 'required|string',
            'html_code' => 'required|string',
            'description_css' => 'nullable|string',
            'css_code' => 'nullable|string',
            'description_js' => 'nullable|string',
            'js_code' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $html = Htmlcss::find($id);
        if (!$html) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $html->title = $request->title;
        $html->creator_id = Auth::id();
        $html->category_id = $request->category_id;
        $html->sub_category_id = $request->sub_category_id;
        $html->description_header = $request->description_header;
        $html->title_video_html = $request->title_video_html;
        $html->video_html = $request->video_html;
        $html->description_video_html = $request->description_video_html;
        $html->header_html = $request->header_html;
        $html->description_html = $request->description_html;
        $html->html_code = $request->html_code;
        $html->description_css = $request->description_css;
        $html->css_code = $request->css_code;
        $html->description_js = $request->description_js;
        $html->js_code = $request->js_code;
        $html->last_description = $request->last_description;
        $html->keywords = $request->keywords;
        $html->github_link = $request->github_link;
        $html->status = $request->status;

        if($request->hasFile('image_html'))
        {
            if ($html->image_html) {
                $oldImgPath = public_path('/default/html/'.$html->image_html);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_html->extension();
            $request->image_html->move(public_path('/default/html'), $imageName);
            $html->image_html = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($html->download_file) {
                $oldImgPath = public_path('/default/html/'.$html->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/html'), $imageName);
            $html->download_file = $imageName;
        }
        $html->save();
        session()->flash('success', 'HTML CSS template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template html css
    public function deletehtml($id)
    {
        $html = Htmlcss::find($id);

        if (!$html) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $html->delete();
        session()->flash('success', 'Template HTML CSS deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== HTML CSS session ========

    // ======== JavaScript session ========
    // Show JavaScript
   public function viewjavascript(){
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $javascript = Js::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.javascript.view', [
            'javascript' => $javascript,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createjavascript(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $javascript = Js::orderBy('created_at','ASC')->get();
            return view ('backend.template.javascript.create', [
                'javascript' => $javascript,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save Javascript to database
    public function savejavascript(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_js' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_js' => 'nullable|string|max:255',
            'video_js' => 'nullable|string',
            'description_video_js' => 'nullable|string',
            'header_js' => 'required|string|max:255',
            'description_js_one' => 'nullable|required|string',
            'html_code' => 'required|string',
            'description_css' => 'nullable|string',
            'css_code' => 'nullable|string',
            'description_js' => 'nullable|string',
            'js_code' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
                    'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $javascript = new Js();
        $javascript->title = $request->title;
        $javascript->creator_id = Auth::id();
        $javascript->category_id = $request->category_id;
        $javascript->sub_category_id = $request->sub_category_id;
        $javascript->description_header = $request->description_header;
        $javascript->title_video_js = $request->title_video_js;
        $javascript->video_js = $request->video_js;
        $javascript->description_video_js = $request->description_video_js;
        $javascript->header_js = $request->header_js;
        $javascript->description_js_one = $request->description_js_one;
        $javascript->html_code = $request->html_code;
        $javascript->description_css = $request->description_css;
        $javascript->css_code = $request->css_code;
        $javascript->description_js = $request->description_js;
        $javascript->js_code = $request->js_code;
        $javascript->last_description = $request->last_description;
        $javascript->keywords = $request->keywords;
        $javascript->github_link = $request->github_link;
        $javascript->status = $request->status;

        if ($request->hasFile('image_js')) {
            $imageName = time() . '.' . $request->image_js->extension();
            $request->image_js->move(public_path('/default/javascript'), $imageName);
            $javascript->image_js = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/javascript'), $imageName);
            $javascript->download_file = $imageName;
        }

        $javascript->save();
        session()->flash('success', 'JavaScript template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit JavaScript
    public function editjavascript($id) {
        $javascript = Js::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.javascript.edit', [
            'javascript' => $javascript,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }


    // Update Javascript
    public function updatejavascript(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_js' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_js' => 'nullable|string|max:255',
            'video_js' => 'nullable|string',
            'description_video_js' => 'nullable|string',
            'header_js' => 'required|string|max:255',
            'description_js_one' => 'nullable|required|string',
            'html_code' => 'required|string',
            'description_css' => 'nullable|string',
            'css_code' => 'nullable|string',
            'description_js' => 'nullable|string',
            'js_code' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $javascript = Js::find($id);
        if (!$javascript) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $javascript->title = $request->title;
        $javascript->creator_id = Auth::id();
        $javascript->category_id = $request->category_id;
        $javascript->sub_category_id = $request->sub_category_id;
        $javascript->description_header = $request->description_header;
        $javascript->title_video_js = $request->title_video_js;
        $javascript->video_js = $request->video_js;
        $javascript->description_video_js = $request->description_video_js;
        $javascript->header_js = $request->header_js;
        $javascript->description_js_one = $request->description_js_one;
        $javascript->html_code = $request->html_code;
        $javascript->description_css = $request->description_css;
        $javascript->css_code = $request->css_code;
        $javascript->description_js = $request->description_js;
        $javascript->js_code = $request->js_code;
        $javascript->last_description = $request->last_description;
        $javascript->keywords = $request->keywords;
        $javascript->github_link = $request->github_link;
        $javascript->status = $request->status;

        if($request->hasFile('image_js'))
        {
            if ($javascript->image_js) {
                $oldImgPath = public_path('/default/javascript/'.$javascript->image_js);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_js->extension();
            $request->image_js->move(public_path('/default/javascript'), $imageName);
            $javascript->image_js = $imageName;
        }
        elseif($request->hasFile('download_file'))
        {
            if ($javascript->download_file) {
                $oldImgPath = public_path('/default/javascript/'.$javascript->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/javascript'), $imageName);
            $javascript->download_file = $imageName;
        }
        $javascript->save();
        session()->flash('success', 'JavaScript template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template Javascript
    public function deletejavascript($id)
    {
        $javascript = Js::find($id);

        if (!$javascript) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $javascript->delete();
        session()->flash('success', 'Template Javascript deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== Javascript session ========


    // ======== JavaScript session ========
    // Show JavaScript
   public function viewreactjs(){
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $reactjs = tblreacts::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.reactjs.view', [
            'reactjs' => $reactjs,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createreactjs(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $reactjs = tblreacts::orderBy('created_at','ASC')->get();
            return view ('backend.template.reactjs.create', [
                'reactjs' => $reactjs,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save reactjs to database
    public function savereactjs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_react' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_react' => 'nullable|string|max:255',
            'video_react' => 'nullable|string',
            'description_video_react' => 'nullable|string',
            'header_react' => 'required|string|max:255',
            'description_react_one' => 'nullable|required|string',
            'model_code' => 'required|string',
            'description_react_two' => 'nullable|string',
            'controller_code' => 'nullable|string',
            'escription_react_tree' => 'nullable|string',
            'view_code' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $reactjs = new tblreacts();
        $reactjs->title = $request->title;
        $reactjs->creator_id = Auth::id();
        $reactjs->category_id = $request->category_id;
        $reactjs->sub_category_id = $request->sub_category_id;
        $reactjs->description_header = $request->description_header;
        $reactjs->title_video_react = $request->title_video_react;
        $reactjs->video_react = $request->video_react;
        $reactjs->description_video_react = $request->description_video_react;
        $reactjs->header_react = $request->header_react;
        $reactjs->description_react_one = $request->description_react_one;
        $reactjs->model_code = $request->model_code;
        $reactjs->description_react_two = $request->description_react_two;
        $reactjs->controller_code = $request->controller_code;
        $reactjs->description_react_tree = $request->description_react_tree;
        $reactjs->view_code = $request->view_code;
        $reactjs->last_description = $request->last_description;
        $reactjs->keywords = $request->keywords;
        $reactjs->github_link = $request->github_link;
        $reactjs->status = $request->status;

        if ($request->hasFile('image_react')) {
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/reactjs'), $imageName);
            $reactjs->image_react = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/reactjs'), $imageName);
            $reactjs->download_file = $imageName;
        }

        $reactjs->save();
        session()->flash('success', 'React Js template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit JavaScript
    public function editreactjs($id) {
        $reactjs = tblreacts::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.reactjs.edit', [
            'reactjs' => $reactjs,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }


    // Update React Js
    public function updatereactjs(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_react' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_react' => 'nullable|string|max:255',
            'video_react' => 'nullable|string',
            'description_video_react' => 'nullable|string',
            'header_react' => 'required|string|max:255',
            'description_react_one' => 'nullable|required|string',
            'model_code' => 'required|string',
            'description_react_two' => 'nullable|string',
            'controller_code' => 'nullable|string',
            'description_react_tree' => 'nullable|string',
            'view_code' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $reactjs = tblreacts::find($id);
        if (!$reactjs) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $reactjs->title = $request->title;
        $reactjs->creator_id = Auth::id();
        $reactjs->category_id = $request->category_id;
        $reactjs->sub_category_id = $request->sub_category_id;
        $reactjs->description_header = $request->description_header;
        $reactjs->title_video_react = $request->title_video_react;
        $reactjs->video_react = $request->video_react;
        $reactjs->description_video_react = $request->description_video_react;
        $reactjs->header_react = $request->header_react;
        $reactjs->description_react_one = $request->description_react_one;
        $reactjs->model_code = $request->model_code;
        $reactjs->description_react_two = $request->description_react_two;
        $reactjs->controller_code = $request->controller_code;
        $reactjs->description_react_tree = $request->description_react_tree;
        $reactjs->view_code = $request->view_code;
        $reactjs->last_description = $request->last_description;
        $reactjs->keywords = $request->keywords;
        $reactjs->github_link = $request->github_link;
        $reactjs->status = $request->status;

        if($request->hasFile('image_react'))
        {
            if ($reactjs->image_react) {
                $oldImgPath = public_path('/default/reactjs/'.$reactjs->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/reactjs'), $imageName);
            $reactjs->image_react = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($reactjs->download_file) {
                $oldImgPath = public_path('/default/reactjs/'.$reactjs->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/reactjs'), $imageName);
            $reactjs->download_file = $imageName;
        }

        $reactjs->save();
        session()->flash('success', 'React Js template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template React Js
    public function deletereactjs($id)
    {
        $reactjs = tblreacts::find($id);

        if (!$reactjs) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $reactjs->delete();
        session()->flash('success', 'Template React Js deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== React Js session ========

    // ======== PHP session ========
    // Show PHP
   public function viewphp()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $php = tblphps::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.php.view', [
            'php' => $php,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createphp(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $php = tblphps::orderBy('created_at','ASC')->get();
            return view ('backend.template.php.create', [
                'php' => $php,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save php to database
    public function savephp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_php' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_php' => 'nullable|string|max:255',
            'video_php' => 'nullable|string',
            'description_video_php' => 'nullable|string',
            'header_php' => 'required|string|max:255',
            'description_php_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_php_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_php_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_php_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_php_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_php_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $php = new tblphps();
        $php->title = $request->title;
        $php->creator_id = Auth::id();
        $php->category_id = $request->category_id;
        $php->sub_category_id = $request->sub_category_id;
        $php->description_header = $request->description_header;
        $php->title_video_php = $request->title_video_php;
        $php->video_php = $request->video_php;
        $php->description_video_php = $request->description_video_php;
        $php->header_php = $request->header_php;
        $php->description_php_one = $request->description_php_one;
        $php->code_one = $request->code_one;
        $php->description_php_two = $request->description_php_two;
        $php->code_two = $request->code_two;
        $php->description_php_tree = $request->description_php_tree;
        $php->code_tree = $request->code_tree;
        $php->description_php_four = $request->description_php_four;
        $php->code_four = $request->code_four;
        $php->description_php_five = $request->description_php_five;
        $php->code_five = $request->code_five;
        $php->description_php_six = $request->description_php_six;
        $php->code_six = $request->code_six;
        $php->last_description = $request->last_description;
        $php->keywords = $request->keywords;
        $php->github_link = $request->github_link;
        $php->status = $request->status;

        if ($request->hasFile('image_php')) {
            $imageName = time() . '.' . $request->image_php->extension();
            $request->image_php->move(public_path('/default/php'), $imageName);
            $php->image_php = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/php'), $imageName);
            $php->download_file = $imageName;
        }

        $php->save();
        session()->flash('success', 'PHP template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit php
    public function editphp($id) {
        $php = tblphps::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.php.edit', [
            'php' => $php,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update php
    public function updatephp(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_php' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_php' => 'nullable|string|max:255',
            'video_php' => 'nullable|string',
            'description_video_php' => 'nullable|string',
            'header_php' => 'required|string|max:255',
            'description_php_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_php_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_php_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_php_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_php_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_php_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $php = tblphps::find($id);
        if (!$php) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $php->title = $request->title;
        $php->creator_id = Auth::id();
        $php->category_id = $request->category_id;
        $php->sub_category_id = $request->sub_category_id;
        $php->description_header = $request->description_header;
        $php->title_video_php = $request->title_video_php;
        $php->video_php = $request->video_php;
        $php->description_video_php = $request->description_video_php;
        $php->header_php = $request->header_php;
        $php->description_php_one = $request->description_php_one;
        $php->code_one = $request->code_one;
        $php->description_php_two = $request->description_php_two;
        $php->code_two = $request->code_two;
        $php->description_php_tree = $request->description_php_tree;
        $php->code_tree = $request->code_tree;
        $php->description_php_four = $request->description_php_four;
        $php->code_four = $request->code_four;
        $php->description_php_five = $request->description_php_five;
        $php->code_five = $request->code_five;
        $php->description_php_six = $request->description_php_six;
        $php->code_six = $request->code_six;
        $php->last_description = $request->last_description;
        $php->keywords = $request->keywords;
        $php->github_link = $request->github_link;
        $php->status = $request->status;

        if($request->hasFile('image_php'))
        {
            if ($php->image_react) {
                $oldImgPath = public_path('/default/php/'.$php->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/php'), $imageName);
            $php->image_react = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($php->download_file) {
                $oldImgPath = public_path('/default/php/'.$php->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/php'), $imageName);
            $php->download_file = $imageName;
        }

        $php->save();
        session()->flash('success', 'PHP template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template php
    public function deletephp($id)
    {
        $php = tblphps::find($id);

        if (!$php) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $php->delete();
        session()->flash('success', 'Template php deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== PHP session ========


    // ======== PHP session ========
    // Show PHP
   public function viewlaravel()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $laravel = tbllaravels::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.laravel.view', [
            'laravel' => $laravel,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createlaravel(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $laravel = tbllaravels::orderBy('created_at','ASC')->get();
            return view ('backend.template.laravel.create', [
                'laravel' => $laravel,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save laravel to database
    public function savelaravel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_laravel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_laravel' => 'nullable|string|max:255',
            'video_laravel' => 'nullable|string',
            'description_video_laravel' => 'nullable|string',
            'header_laravel' => 'required|string|max:255',
            'description_laravel_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_laravel_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_laravel_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_laravel_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_laravel_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_laravel_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'description_laravel_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_laravel_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_laravel_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_laravel_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $laravel = new tbllaravels();
        $laravel->title = $request->title;
        $laravel->creator_id = Auth::id();
        $laravel->category_id = $request->category_id;
        $laravel->sub_category_id = $request->sub_category_id;
        $laravel->description_header = $request->description_header;
        $laravel->title_video_laravel = $request->title_video_laravel;
        $laravel->video_laravel = $request->video_laravel;
        $laravel->description_video_laravel = $request->description_video_laravel;
        $laravel->header_laravel = $request->header_laravel;
        $laravel->description_laravel_one = $request->description_laravel_one;
        $laravel->code_one = $request->code_one;
        $laravel->description_laravel_two = $request->description_laravel_two;
        $laravel->code_two = $request->code_two;
        $laravel->description_laravel_tree = $request->description_laravel_tree;
        $laravel->code_tree = $request->code_tree;
        $laravel->description_laravel_four = $request->description_laravel_four;
        $laravel->code_four = $request->code_four;
        $laravel->description_laravel_five = $request->description_laravel_five;
        $laravel->code_five = $request->code_five;
        $laravel->description_laravel_six = $request->description_laravel_six;
        $laravel->code_six = $request->code_six;
        $laravel->description_laravel_seven = $request->description_laravel_seven;
        $laravel->code_seven = $request->code_seven;
        $laravel->description_laravel_eight = $request->description_laravel_eight;
        $laravel->code_eight = $request->code_eight;
        $laravel->description_laravel_nine = $request->description_laravel_nine;
        $laravel->code_nine = $request->code_nine;
        $laravel->description_laravel_ten = $request->description_laravel_ten;
        $laravel->code_ten = $request->code_ten;
        $laravel->last_description = $request->last_description;
        $laravel->keywords = $request->keywords;
        $laravel->github_link = $request->github_link;
        $laravel->status = $request->status;

        if ($request->hasFile('image_laravel')) {
            $imageName = time() . '.' . $request->image_laravel->extension();
            $request->image_laravel->move(public_path('/default/laravel'), $imageName);
            $laravel->image_laravel = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/laravel'), $imageName);
            $laravel->download_file = $imageName;
        }

        $laravel->save();
        session()->flash('success', 'laravel template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit laravel
    public function editlaravel($id) {
        $laravel = tbllaravels::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.laravel.edit', [
            'laravel' => $laravel,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update laravel
    public function updatelaravel(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_laravel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_laravel' => 'nullable|string|max:255',
            'video_laravel' => 'nullable|string',
            'description_video_laravel' => 'nullable|string',
            'header_laravel' => 'required|string|max:255',
            'description_laravel_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_laravel_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_laravel_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_laravel_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_laravel_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_laravel_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'description_laravel_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_laravel_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_laravel_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_laravel_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:152400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $laravel = tbllaravels::find($id);
        if (!$laravel) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $laravel->title = $request->title;
        $laravel->creator_id = Auth::id();
        $laravel->category_id = $request->category_id;
        $laravel->sub_category_id = $request->sub_category_id;
        $laravel->description_header = $request->description_header;
        $laravel->title_video_laravel = $request->title_video_laravel;
        $laravel->video_laravel = $request->video_laravel;
        $laravel->description_video_laravel = $request->description_video_laravel;
        $laravel->header_laravel = $request->header_laravel;
        $laravel->description_laravel_one = $request->description_laravel_one;
        $laravel->code_one = $request->code_one;
        $laravel->description_laravel_two = $request->description_laravel_two;
        $laravel->code_two = $request->code_two;
        $laravel->description_laravel_tree = $request->description_laravel_tree;
        $laravel->code_tree = $request->code_tree;
        $laravel->description_laravel_four = $request->description_laravel_four;
        $laravel->code_four = $request->code_four;
        $laravel->description_laravel_five = $request->description_laravel_five;
        $laravel->code_five = $request->code_five;
        $laravel->description_laravel_six = $request->description_laravel_six;
        $laravel->code_six = $request->code_six;
        $laravel->description_laravel_seven = $request->description_laravel_seven;
        $laravel->code_seven = $request->code_seven;
        $laravel->description_laravel_eight = $request->description_laravel_eight;
        $laravel->code_eight = $request->code_eight;
        $laravel->description_laravel_nine = $request->description_laravel_nine;
        $laravel->code_nine = $request->code_nine;
        $laravel->description_laravel_ten = $request->description_laravel_ten;
        $laravel->code_ten = $request->code_ten;
        $laravel->last_description = $request->last_description;
        $laravel->keywords = $request->keywords;
        $laravel->github_link = $request->github_link;
        $laravel->status = $request->status;

        if($request->hasFile('image_laravel'))
        {
            if ($laravel->image_laravel) {
                $oldImgPath = public_path('/default/laravel/'.$laravel->image_laravel);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_laravel->extension();
            $request->image_laravel->move(public_path('/default/laravel'), $imageName);
            $laravel->image_laravel = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($laravel->download_file) {
                $oldImgPath = public_path('/default/laravel/'.$laravel->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/laravel'), $imageName);
            $laravel->download_file = $imageName;
        }

        $laravel->save();
        session()->flash('success', 'laravel template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template laravel
    public function deletelaravel($id)
    {
        $laravel = tbllaravels::find($id);

        if (!$laravel) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $laravel->delete();
        session()->flash('success', 'Template laravel deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== Laravel session ========

    // ======== mysql session ========
    // Show mysql
   public function viewmysql()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $mysql = mysqltb::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.mysql.view', [
            'mysql' => $mysql,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createmysql(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $mysql = mysqltb::orderBy('created_at','ASC')->get();
            return view ('backend.template.mysql.create', [
                'mysql' => $mysql,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save mysql to database
    public function savemysql(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_mysql' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_mysql' => 'nullable|string|max:255',
            'video_mysql' => 'nullable|string',
            'description_video_mysql' => 'nullable|string',
            'header_mysql' => 'required|string|max:255',
            'description_mysql_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_mysql_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_mysql_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_mysql_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_mysql_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_mysql_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'description_mysql_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_mysql_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_mysql_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_mysql_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $mysql = new mysqltb();
        $mysql->title = $request->title;
        $mysql->creator_id = Auth::id();
        $mysql->category_id = $request->category_id;
        $mysql->sub_category_id = $request->sub_category_id;
        $mysql->description_header = $request->description_header;
        $mysql->title_video_mysql = $request->title_video_mysql;
        $mysql->video_mysql = $request->video_mysql;
        $mysql->description_video_mysql = $request->description_video_mysql;
        $mysql->header_mysql = $request->header_mysql;
        $mysql->description_mysql_one = $request->description_mysql_one;
        $mysql->code_one = $request->code_one;
        $mysql->description_mysql_two = $request->description_mysql_two;
        $mysql->code_two = $request->code_two;
        $mysql->description_mysql_tree = $request->description_mysql_tree;
        $mysql->code_tree = $request->code_tree;
        $mysql->description_mysql_four = $request->description_mysql_four;
        $mysql->code_four = $request->code_four;
        $mysql->description_mysql_five = $request->description_mysql_five;
        $mysql->code_five = $request->code_five;
        $mysql->description_mysql_six = $request->description_mysql_six;
        $mysql->code_six = $request->code_six;
        $mysql->description_mysql_seven = $request->description_mysql_seven;
        $mysql->code_seven = $request->code_seven;
        $mysql->description_mysql_eight = $request->description_mysql_eight;
        $mysql->code_eight = $request->code_eight;
        $mysql->description_mysql_nine = $request->description_mysql_nine;
        $mysql->code_nine = $request->code_nine;
        $mysql->description_mysql_ten = $request->description_mysql_ten;
        $mysql->code_ten = $request->code_ten;
        $mysql->last_description = $request->last_description;
        $mysql->keywords = $request->keywords;
        $mysql->github_link = $request->github_link;
        $mysql->status = $request->status;

        if ($request->hasFile('image_mysql')) {
            $imageName = time() . '.' . $request->image_mysql->extension();
            $request->image_mysql->move(public_path('/default/mysql'), $imageName);
            $mysql->image_mysql = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/mysql'), $imageName);
            $mysql->download_file = $imageName;
        }

        $mysql->save();
        session()->flash('success', 'mysql template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit mysql
    public function editmysql($id) {
        $mysql = mysqltb::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.mysql.edit', [
            'mysql' => $mysql,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update mysql
    public function updatemysql(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_mysql' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_mysql' => 'nullable|string|max:255',
            'video_mysql' => 'nullable|string',
            'description_video_mysql' => 'nullable|string',
            'header_mysql' => 'required|string|max:255',
            'description_mysql_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_mysql_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_mysql_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_mysql_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_mysql_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_mysql_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $mysql = mysqltb::find($id);
        if (!$mysql) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $mysql->title = $request->title;
        $mysql->creator_id = Auth::id();
        $mysql->category_id = $request->category_id;
        $mysql->sub_category_id = $request->sub_category_id;
        $mysql->description_header = $request->description_header;
        $mysql->title_video_mysql = $request->title_video_mysql;
        $mysql->video_mysql = $request->video_mysql;
        $mysql->description_video_mysql = $request->description_video_mysql;
        $mysql->header_mysql = $request->header_mysql;
        $mysql->description_mysql_one = $request->description_mysql_one;
        $mysql->code_one = $request->code_one;
        $mysql->description_mysql_two = $request->description_mysql_two;
        $mysql->code_two = $request->code_two;
        $mysql->description_mysql_tree = $request->description_mysql_tree;
        $mysql->code_tree = $request->code_tree;
        $mysql->description_mysql_four = $request->description_mysql_four;
        $mysql->code_four = $request->code_four;
        $mysql->description_mysql_five = $request->description_mysql_five;
        $mysql->code_five = $request->code_five;
        $mysql->description_mysql_six = $request->description_mysql_six;
        $mysql->code_six = $request->code_six;
        $mysql->description_mysql_seven = $request->description_mysql_seven;
        $mysql->code_seven = $request->code_seven;
        $mysql->description_mysql_eight = $request->description_mysql_eight;
        $mysql->code_eight = $request->code_eight;
        $mysql->description_mysql_nine = $request->description_mysql_nine;
        $mysql->code_nine = $request->code_nine;
        $mysql->description_mysql_ten = $request->description_mysql_ten;
        $mysql->code_ten = $request->code_ten;
        $mysql->last_description = $request->last_description;
        $mysql->keywords = $request->keywords;
        $mysql->github_link = $request->github_link;
        $mysql->status = $request->status;

        if($request->hasFile('image_mysql'))
        {
            if ($mysql->image_react) {
                $oldImgPath = public_path('/default/mysql/'.$mysql->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/mysql'), $imageName);
            $mysql->image_react = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($mysql->download_file) {
                $oldImgPath = public_path('/default/mysql/'.$mysql->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/mysql'), $imageName);
            $mysql->download_file = $imageName;
        }

        $mysql->save();
        session()->flash('success', 'mysql template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template mysql
    public function deletemysql($id)
    {
        $mysql = mysqltb::find($id);

        if (!$mysql) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $mysql->delete();
        session()->flash('success', 'Template mysql deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== mysqll session ========

    // ======== sqlserver session ========
    // Show sqlserver
   public function viewsqlserver()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $sqlserver = tblsqlservers::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.sqlserver.view', [
            'sqlserver' => $sqlserver,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createsqlserver(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $sqlserver = tblsqlservers::orderBy('created_at','ASC')->get();
            return view ('backend.template.sqlserver.create', [
                'sqlserver' => $sqlserver,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save sqlserver to database
    public function savesqlserver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_sqlserver' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_sqlserver' => 'nullable|string|max:255',
            'video_sqlserver' => 'nullable|string',
            'description_video_sqlserver' => 'nullable|string',
            'header_sqlserver' => 'required|string|max:255',
            'description_sqlserver_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_sqlserver_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_sqlserver_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_sqlserver_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_sqlserver_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_sqlserver_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_sqlserver_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_sqlserver_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_sqlserver_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_sqlserver_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $sqlserver = new tblsqlservers();
        $sqlserver->title = $request->title;
        $sqlserver->creator_id = Auth::id();
        $sqlserver->category_id = $request->category_id;
        $sqlserver->sub_category_id = $request->sub_category_id;
        $sqlserver->description_header = $request->description_header;
        $sqlserver->title_video_sqlserver = $request->title_video_sqlserver;
        $sqlserver->video_sqlserver = $request->video_sqlserver;
        $sqlserver->description_video_sqlserver = $request->description_video_sqlserver;
        $sqlserver->header_sqlserver = $request->header_sqlserver;
        $sqlserver->description_sqlserver_one = $request->description_sqlserver_one;
        $sqlserver->code_one = $request->code_one;
        $sqlserver->description_sqlserver_two = $request->description_sqlserver_two;
        $sqlserver->code_two = $request->code_two;
        $sqlserver->description_sqlserver_tree = $request->description_sqlserver_tree;
        $sqlserver->code_tree = $request->code_tree;
        $sqlserver->description_sqlserver_four = $request->description_sqlserver_four;
        $sqlserver->code_four = $request->code_four;
        $sqlserver->description_sqlserver_five = $request->description_sqlserver_five;
        $sqlserver->code_five = $request->code_five;
        $sqlserver->description_sqlserver_six = $request->description_sqlserver_six;
        $sqlserver->code_six = $request->code_six;
        $sqlserver->description_sqlserver_seven = $request->description_sqlserver_seven;
        $sqlserver->code_seven = $request->code_seven;
        $sqlserver->description_sqlserver_eight = $request->description_sqlserver_eight;
        $sqlserver->code_eight = $request->code_eight;
        $sqlserver->description_sqlserver_nine = $request->description_sqlserver_nine;
        $sqlserver->code_nine = $request->code_nine;
        $sqlserver->description_sqlserver_ten = $request->description_sqlserver_ten;
        $sqlserver->code_ten = $request->code_ten;
        $sqlserver->last_description = $request->last_description;
        $sqlserver->keywords = $request->keywords;
        $sqlserver->github_link = $request->github_link;
        $sqlserver->status = $request->status;

        if ($request->hasFile('image_sqlserver')) {
            $imageName = time() . '.' . $request->image_sqlserver->extension();
            $request->image_sqlserver->move(public_path('/default/sqlserver'), $imageName);
            $sqlserver->image_sqlserver = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/sqlserver'), $imageName);
            $sqlserver->download_file = $imageName;
        }

        $sqlserver->save();
        session()->flash('success', 'sqlserver template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit sqlserver
    public function editsqlserver($id) {
        $sqlserver = tblsqlservers::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.sqlserver.edit', [
            'sqlserver' => $sqlserver,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update sqlserver
    public function updatesqlserver(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_sqlserver' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_sqlserver' => 'nullable|string|max:255',
            'video_sqlserver' => 'nullable|string',
            'description_video_sqlserver' => 'nullable|string',
            'header_sqlserver' => 'required|string|max:255',
            'description_sqlserver_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_sqlserver_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_sqlserver_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_sqlserver_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_sqlserver_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_sqlserver_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_sqlserver_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_sqlserver_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_sqlserver_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_sqlserver_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $sqlserver = tblsqlservers::find($id);
        if (!$sqlserver) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $sqlserver->title = $request->title;
        $sqlserver->creator_id = Auth::id();
        $sqlserver->category_id = $request->category_id;
        $sqlserver->sub_category_id = $request->sub_category_id;
        $sqlserver->description_header = $request->description_header;
        $sqlserver->title_video_sqlserver = $request->title_video_sqlserver;
        $sqlserver->video_sqlserver = $request->video_sqlserver;
        $sqlserver->description_video_sqlserver = $request->description_video_sqlserver;
        $sqlserver->header_sqlserver = $request->header_sqlserver;
        $sqlserver->description_sqlserver_one = $request->description_sqlserver_one;
        $sqlserver->code_one = $request->code_one;
        $sqlserver->description_sqlserver_two = $request->description_sqlserver_two;
        $sqlserver->code_two = $request->code_two;
        $sqlserver->description_sqlserver_tree = $request->description_sqlserver_tree;
        $sqlserver->code_tree = $request->code_tree;
        $sqlserver->description_sqlserver_four = $request->description_sqlserver_four;
        $sqlserver->code_four = $request->code_four;
        $sqlserver->description_sqlserver_five = $request->description_sqlserver_five;
        $sqlserver->code_five = $request->code_five;
        $sqlserver->description_sqlserver_six = $request->description_sqlserver_six;
        $sqlserver->code_six = $request->code_six;
         $sqlserver->description_sqlserver_seven = $request->description_sqlserver_seven;
        $sqlserver->code_seven = $request->code_seven;
        $sqlserver->description_sqlserver_eight = $request->description_sqlserver_eight;
        $sqlserver->code_eight = $request->code_eight;
        $sqlserver->description_sqlserver_nine = $request->description_sqlserver_nine;
        $sqlserver->code_nine = $request->code_nine;
        $sqlserver->description_sqlserver_ten = $request->description_sqlserver_ten;
        $sqlserver->code_ten = $request->code_ten;
        $sqlserver->last_description = $request->last_description;
        $sqlserver->keywords = $request->keywords;
        $sqlserver->github_link = $request->github_link;
        $sqlserver->status = $request->status;

        if($request->hasFile('image_sqlserver'))
        {
            if ($sqlserver->image_react) {
                $oldImgPath = public_path('/default/sqlserver/'.$sqlserver->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/sqlserver'), $imageName);
            $sqlserver->image_react = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($sqlserver->download_file) {
                $oldImgPath = public_path('/default/sqlserver/'.$sqlserver->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/sqlserver'), $imageName);
            $sqlserver->download_file = $imageName;
        }

        $sqlserver->save();
        session()->flash('success', 'sqlserver template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template sqlserver
    public function deletesqlserver($id)
    {
        $sqlserver = tblsqlservers::find($id);

        if (!$sqlserver) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $sqlserver->delete();
        session()->flash('success', 'Template sqlserver deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== sqlserver session ========

    // ======== oracle session ========
    // Show oracle
   public function vieworacle()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $oracle = tbloracles::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.oracle.view', [
            'oracle' => $oracle,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createoracle(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $oracle = tbloracles::orderBy('created_at','ASC')->get();
            return view ('backend.template.oracle.create', [
                'oracle' => $oracle,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save oracle to database
    public function saveoracle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_oracle' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_oracle' => 'nullable|string|max:255',
            'video_oracle' => 'nullable|string',
            'description_video_oracle' => 'nullable|string',
            'header_oracle' => 'required|string|max:255',
            'description_oracle_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_oracle_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_oracle_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_oracle_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_oracle_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_oracle_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_oracle_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_oracle_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_oracle_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_oracle_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
                        'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $oracle = new tbloracles();
        $oracle->title = $request->title;
        $oracle->creator_id = Auth::id();
        $oracle->category_id = $request->category_id;
        $oracle->sub_category_id = $request->sub_category_id;
        $oracle->description_header = $request->description_header;
        $oracle->title_video_oracle = $request->title_video_oracle;
        $oracle->video_oracle = $request->video_oracle;
        $oracle->description_video_oracle = $request->description_video_oracle;
        $oracle->header_oracle = $request->header_oracle;
        $oracle->description_oracle_one = $request->description_oracle_one;
        $oracle->code_one = $request->code_one;
        $oracle->description_oracle_two = $request->description_oracle_two;
        $oracle->code_two = $request->code_two;
        $oracle->description_oracle_tree = $request->description_oracle_tree;
        $oracle->code_tree = $request->code_tree;
        $oracle->description_oracle_four = $request->description_oracle_four;
        $oracle->code_four = $request->code_four;
        $oracle->description_oracle_five = $request->description_oracle_five;
        $oracle->code_five = $request->code_five;
        $oracle->description_oracle_six = $request->description_oracle_six;
        $oracle->code_six = $request->code_six;
         $oracle->description_oracle_seven = $request->description_oracle_seven;
        $oracle->code_seven = $request->code_seven;
        $oracle->description_oracle_eight = $request->description_oracle_eight;
        $oracle->code_eight = $request->code_eight;
        $oracle->description_oracle_nine = $request->description_oracle_nine;
        $oracle->code_nine = $request->code_nine;
        $oracle->description_oracle_ten = $request->description_oracle_ten;
        $oracle->code_ten = $request->code_ten;
        $oracle->last_description = $request->last_description;
        $oracle->keywords = $request->keywords;
        $oracle->github_link = $request->github_link;
        $oracle->status = $request->status;

        if ($request->hasFile('image_oracle')) {
            $imageName = time() . '.' . $request->image_oracle->extension();
            $request->image_oracle->move(public_path('/default/oracle'), $imageName);
            $oracle->image_oracle = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/oracle'), $imageName);
            $oracle->download_file = $imageName;
        }

        $oracle->save();
        session()->flash('success', 'oracle template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit oracle
    public function editoracle($id) {
        $oracle = tbloracles::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.oracle.edit', [
            'oracle' => $oracle,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update oracle
    public function updateoracle(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_oracle' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_oracle' => 'nullable|string|max:255',
            'video_oracle' => 'nullable|string',
            'description_video_oracle' => 'nullable|string',
            'header_oracle' => 'required|string|max:255',
            'description_oracle_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_oracle_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_oracle_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_oracle_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_oracle_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_oracle_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_oracle_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_oracle_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_oracle_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_oracle_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $oracle = tbloracles::find($id);
        if (!$oracle) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $oracle->title = $request->title;
        $oracle->creator_id = Auth::id();
        $oracle->category_id = $request->category_id;
        $oracle->sub_category_id = $request->sub_category_id;
        $oracle->description_header = $request->description_header;
        $oracle->title_video_oracle = $request->title_video_oracle;
        $oracle->video_oracle = $request->video_oracle;
        $oracle->description_video_oracle = $request->description_video_oracle;
        $oracle->header_oracle = $request->header_oracle;
        $oracle->description_oracle_one = $request->description_oracle_one;
        $oracle->code_one = $request->code_one;
        $oracle->description_oracle_two = $request->description_oracle_two;
        $oracle->code_two = $request->code_two;
        $oracle->description_oracle_tree = $request->description_oracle_tree;
        $oracle->code_tree = $request->code_tree;
        $oracle->description_oracle_four = $request->description_oracle_four;
        $oracle->code_four = $request->code_four;
        $oracle->description_oracle_five = $request->description_oracle_five;
        $oracle->code_five = $request->code_five;
        $oracle->description_oracle_six = $request->description_oracle_six;
        $oracle->code_six = $request->code_six;
         $oracle->description_oracle_seven = $request->description_oracle_seven;
        $oracle->code_seven = $request->code_seven;
        $oracle->description_oracle_eight = $request->description_oracle_eight;
        $oracle->code_eight = $request->code_eight;
        $oracle->description_oracle_nine = $request->description_oracle_nine;
        $oracle->code_nine = $request->code_nine;
        $oracle->description_oracle_ten = $request->description_oracle_ten;
        $oracle->code_ten = $request->code_ten;
        $oracle->last_description = $request->last_description;
        $oracle->keywords = $request->keywords;
        $oracle->github_link = $request->github_link;
        $oracle->status = $request->status;

        if($request->hasFile('image_oracle'))
        {
            if ($oracle->image_react) {
                $oldImgPath = public_path('/default/oracle/'.$oracle->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/oracle'), $imageName);
            $oracle->image_react = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($oracle->download_file) {
                $oldImgPath = public_path('/default/oracle/'.$oracle->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/oracle'), $imageName);
            $oracle->download_file = $imageName;
        }

        $oracle->save();
        session()->flash('success', 'oracle template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template oracle
    public function deleteoracle($id)
    {
        $oracle = tbloracles::find($id);

        if (!$oracle) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $oracle->delete();
        session()->flash('success', 'Template oracle deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== oracle session ========

     // ======== csharp session ========
    // Show csharp
   public function viewcsharp()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $csharp = tblcsharps::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.csharp.view', [
            'csharp' => $csharp,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createcsharp(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $csharp = tblcsharps::orderBy('created_at','ASC')->get();
            return view ('backend.template.csharp.create', [
                'csharp' => $csharp,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save csharp to database
    public function savecsharp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_csharp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_csharp' => 'nullable|string|max:255',
            'video_csharp' => 'nullable|string',
            'description_video_csharp' => 'nullable|string',
            'header_csharp' => 'required|string|max:255',
            'description_csharp_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_csharp_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_csharp_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_csharp_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_csharp_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_csharp_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'description_csharp_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_csharp_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_csharp_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_csharp_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $csharp = new tblcsharps();
        $csharp->title = $request->title;
        $csharp->creator_id = Auth::id();
        $csharp->category_id = $request->category_id;
        $csharp->sub_category_id = $request->sub_category_id;
        $csharp->description_header = $request->description_header;
        $csharp->title_video_csharp = $request->title_video_csharp;
        $csharp->video_csharp = $request->video_csharp;
        $csharp->description_video_csharp = $request->description_video_csharp;
        $csharp->header_csharp = $request->header_csharp;
        $csharp->description_csharp_one = $request->description_csharp_one;
        $csharp->code_one = $request->code_one;
        $csharp->description_csharp_two = $request->description_csharp_two;
        $csharp->code_two = $request->code_two;
        $csharp->description_csharp_tree = $request->description_csharp_tree;
        $csharp->code_tree = $request->code_tree;
        $csharp->description_csharp_four = $request->description_csharp_four;
        $csharp->code_four = $request->code_four;
        $csharp->description_csharp_five = $request->description_csharp_five;
        $csharp->code_five = $request->code_five;
        $csharp->description_csharp_six = $request->description_csharp_six;
        $csharp->code_six = $request->code_six;
        $csharp->description_csharp_seven = $request->description_csharp_seven;
        $csharp->code_seven = $request->code_seven;
        $csharp->description_csharp_eight = $request->description_csharp_eight;
        $csharp->code_eight = $request->code_eight;
        $csharp->description_csharp_nine = $request->description_csharp_nine;
        $csharp->code_nine = $request->code_nine;
        $csharp->description_csharp_ten = $request->description_csharp_ten;
        $csharp->code_ten = $request->code_ten;
        $csharp->last_description = $request->last_description;
        $csharp->keywords = $request->keywords;
        $csharp->github_link = $request->github_link;
        $csharp->status = $request->status;

        if ($request->hasFile('image_csharp')) {
            $imageName = time() . '.' . $request->image_csharp->extension();
            $request->image_csharp->move(public_path('/default/csharp'), $imageName);
            $csharp->image_csharp = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $fileName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/csharp'), $fileName);
            $csharp->download_file = $fileName;
        }

        $csharp->save();
        session()->flash('success', 'C# template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }


    // Edit csharp
    public function editcsharp($id) {
        $csharp = tblcsharps::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.csharp.edit', [
            'csharp' => $csharp,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update csharp
    public function updatecsharp(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_csharp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_csharp' => 'nullable|string|max:255',
            'video_csharp' => 'nullable|string',
            'description_video_csharp' => 'nullable|string',
            'header_csharp' => 'required|string|max:255',
            'description_csharp_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_csharp_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_csharp_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_csharp_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_csharp_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_csharp_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_csharp_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_csharp_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_csharp_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_csharp_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $csharp = tblcsharps::find($id);
        if (!$csharp) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $csharp->title = $request->title;
        $csharp->creator_id = Auth::id();
        $csharp->category_id = $request->category_id;
        $csharp->sub_category_id = $request->sub_category_id;
        $csharp->description_header = $request->description_header;
        $csharp->title_video_csharp = $request->title_video_csharp;
        $csharp->video_csharp = $request->video_csharp;
        $csharp->description_video_csharp = $request->description_video_csharp;
        $csharp->header_csharp = $request->header_csharp;
        $csharp->description_csharp_one = $request->description_csharp_one;
        $csharp->code_one = $request->code_one;
        $csharp->description_csharp_two = $request->description_csharp_two;
        $csharp->code_two = $request->code_two;
        $csharp->description_csharp_tree = $request->description_csharp_tree;
        $csharp->code_tree = $request->code_tree;
        $csharp->description_csharp_four = $request->description_csharp_four;
        $csharp->code_four = $request->code_four;
        $csharp->description_csharp_five = $request->description_csharp_five;
        $csharp->code_five = $request->code_five;
        $csharp->description_csharp_six = $request->description_csharp_six;
        $csharp->code_six = $request->code_six;
        $csharp->description_csharp_seven = $request->description_csharp_seven;
        $csharp->code_seven = $request->code_seven;
        $csharp->description_csharp_eight = $request->description_csharp_eight;
        $csharp->code_eight = $request->code_eight;
        $csharp->description_csharp_nine = $request->description_csharp_nine;
        $csharp->code_nine = $request->code_nine;
        $csharp->description_csharp_ten = $request->description_csharp_ten;
        $csharp->code_ten = $request->code_ten;
        $csharp->last_description = $request->last_description;
        $csharp->keywords = $request->keywords;
        $csharp->github_link = $request->github_link;
        $csharp->status = $request->status;

        if($request->hasFile('image_csharp'))
        {
            if ($csharp->image_csharp) {
                $oldImgPath = public_path('/default/csharp/'.$csharp->image_csharp);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_csharp->extension();
            $request->image_csharp->move(public_path('/default/csharp'), $imageName);
            $csharp->image_csharp = $imageName;
        }elseif($request->hasFile('download_file'))
        {
            if ($csharp->download_file) {
                $oldImgPath = public_path('/default/csharp/'.$csharp->download_file);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/csharp'), $imageName);
            $csharp->download_file = $imageName;
        }

        $csharp->save();
        session()->flash('success', 'csharp template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template csharp
    public function deletecsharp($id)
    {
        $csharp = tblcsharps::find($id);

        if (!$csharp) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $csharp->delete();
        session()->flash('success', 'Template csharp deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== csharp session ========

     // ======== java session ========
    // Show java
   public function viewjava()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $java = tbljavas::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.java.view', [
            'java' => $java,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createjava(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $java = tbljavas::orderBy('created_at','ASC')->get();
            return view ('backend.template.java.create', [
                'java' => $java,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save java to database
    public function savejava(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_java' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_java' => 'nullable|string|max:255',
            'video_java' => 'nullable|string',
            'description_video_java' => 'nullable|string',
            'header_java' => 'required|string|max:255',
            'description_java_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_java_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_java_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_java_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_java_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_java_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_java_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_java_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_java_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_java_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $java = new tbljavas();
        $java->title = $request->title;
        $java->creator_id = Auth::id();
        $java->category_id = $request->category_id;
        $java->sub_category_id = $request->sub_category_id;
        $java->description_header = $request->description_header;
        $java->title_video_java = $request->title_video_java;
        $java->video_java = $request->video_java;
        $java->description_video_java = $request->description_video_java;
        $java->header_java = $request->header_java;
        $java->description_java_one = $request->description_java_one;
        $java->code_one = $request->code_one;
        $java->description_java_two = $request->description_java_two;
        $java->code_two = $request->code_two;
        $java->description_java_tree = $request->description_java_tree;
        $java->code_tree = $request->code_tree;
        $java->description_java_four = $request->description_java_four;
        $java->code_four = $request->code_four;
        $java->description_java_five = $request->description_java_five;
        $java->code_five = $request->code_five;
        $java->description_java_six = $request->description_java_six;
        $java->code_six = $request->code_six;
         $java->description_java_seven = $request->description_java_seven;
        $java->code_seven = $request->code_seven;
        $java->description_java_eight = $request->description_java_eight;
        $java->code_eight = $request->code_eight;
        $java->description_java_nine = $request->description_java_nine;
        $java->code_nine = $request->code_nine;
        $java->description_java_ten = $request->description_java_ten;
        $java->code_ten = $request->code_ten;
        $java->last_description = $request->last_description;
        $java->keywords = $request->keywords;
                $java->github_link = $request->github_link;
        $java->status = $request->status;

        if ($request->hasFile('image_java')) {
            $imageName = time() . '.' . $request->image_java->extension();
            $request->image_java->move(public_path('/default/java'), $imageName);
            $java->image_java = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/java'), $imageName);
            $java->download_file = $imageName;
        }

        $java->save();
        session()->flash('success', 'java template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit java
    public function editjava($id) {
        $java = tbljavas::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.java.edit', [
            'java' => $java,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update java
    public function updatejava(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_java' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_java' => 'nullable|string|max:255',
            'video_java' => 'nullable|string',
            'description_video_java' => 'nullable|string',
            'header_java' => 'required|string|max:255',
            'description_java_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_java_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_java_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_java_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_java_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_java_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_java_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_java_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_java_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_java_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $java = tbljavas::find($id);
        if (!$java) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $java->title = $request->title;
        $java->creator_id = Auth::id();
        $java->category_id = $request->category_id;
        $java->sub_category_id = $request->sub_category_id;
        $java->description_header = $request->description_header;
        $java->title_video_java = $request->title_video_java;
        $java->video_java = $request->video_java;
        $java->description_video_java = $request->description_video_java;
        $java->header_java = $request->header_java;
        $java->description_java_one = $request->description_java_one;
        $java->code_one = $request->code_one;
        $java->description_java_two = $request->description_java_two;
        $java->code_two = $request->code_two;
        $java->description_java_tree = $request->description_java_tree;
        $java->code_tree = $request->code_tree;
        $java->description_java_four = $request->description_java_four;
        $java->code_four = $request->code_four;
        $java->description_java_five = $request->description_java_five;
        $java->code_five = $request->code_five;
        $java->description_java_six = $request->description_java_six;
        $java->code_six = $request->code_six;
        $java->description_java_seven = $request->description_java_seven;
        $java->code_seven = $request->code_seven;
        $java->description_java_eight = $request->description_java_eight;
        $java->code_eight = $request->code_eight;
        $java->description_java_nine = $request->description_java_nine;
        $java->code_nine = $request->code_nine;
        $java->description_java_ten = $request->description_java_ten;
        $java->code_ten = $request->code_ten;
        $java->last_description = $request->last_description;
        $java->keywords = $request->keywords;
                $java->github_link = $request->github_link;
        $java->status = $request->status;

        if($request->hasFile('image_java'))
        {
            if ($java->image_react) {
                $oldImgPath = public_path('/default/java/'.$java->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/java'), $imageName);
            $java->image_react = $imageName;
        }

        $java->save();
        session()->flash('success', 'java template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template java
    public function deletejava($id)
    {
        $java = tbljavas::find($id);

        if (!$java) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $java->delete();
        session()->flash('success', 'Template java deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== java session ========

     // ======== flutter session ========
    // Show flutter
   public function viewflutter()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $flutter = tblflutters::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.flutter.view', [
            'flutter' => $flutter,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createflutter(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $flutter = tblflutters::orderBy('created_at','ASC')->get();
            return view ('backend.template.flutter.create', [
                'flutter' => $flutter,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save flutter to database
    public function saveflutter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_flutter' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_flutter' => 'nullable|string|max:255',
            'video_flutter' => 'nullable|string',
            'description_video_flutter' => 'nullable|string',
            'header_flutter' => 'required|string|max:255',
            'description_flutter_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_flutter_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_flutter_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_flutter_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_flutter_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_flutter_six' => 'nullable|string',
            'code_six' => 'nullable|string',
             'description_flutter_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_flutter_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_flutter_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_flutter_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $flutter = new tblflutters();
        $flutter->title = $request->title;
        $flutter->creator_id = Auth::id();
        $flutter->category_id = $request->category_id;
        $flutter->sub_category_id = $request->sub_category_id;
        $flutter->description_header = $request->description_header;
        $flutter->title_video_flutter = $request->title_video_flutter;
        $flutter->video_flutter = $request->video_flutter;
        $flutter->description_video_flutter = $request->description_video_flutter;
        $flutter->header_flutter = $request->header_flutter;
        $flutter->description_flutter_one = $request->description_flutter_one;
        $flutter->code_one = $request->code_one;
        $flutter->description_flutter_two = $request->description_flutter_two;
        $flutter->code_two = $request->code_two;
        $flutter->description_flutter_tree = $request->description_flutter_tree;
        $flutter->code_tree = $request->code_tree;
        $flutter->description_flutter_four = $request->description_flutter_four;
        $flutter->code_four = $request->code_four;
        $flutter->description_flutter_five = $request->description_flutter_five;
        $flutter->code_five = $request->code_five;
        $flutter->description_flutter_six = $request->description_flutter_six;
        $flutter->code_six = $request->code_six;
        $flutter->description_flutter_seven = $request->description_flutter_seven;
        $flutter->code_seven = $request->code_seven;
        $flutter->description_flutter_eight = $request->description_flutter_eight;
        $flutter->code_eight = $request->code_eight;
        $flutter->description_flutter_nine = $request->description_flutter_nine;
        $flutter->code_nine = $request->code_nine;
        $flutter->description_flutter_ten = $request->description_flutter_ten;
        $flutter->code_ten = $request->code_ten;
        $flutter->last_description = $request->last_description;
        $flutter->keywords = $request->keywords;
                $flutter->github_link = $request->github_link;
        $flutter->status = $request->status;

        if ($request->hasFile('image_flutter')) {
            $imageName = time() . '.' . $request->image_flutter->extension();
            $request->image_flutter->move(public_path('/default/flutter'), $imageName);
            $flutter->image_flutter = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/flutter'), $imageName);
            $flutter->download_file = $imageName;
        }

        $flutter->save();
        session()->flash('success', 'flutter template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit flutter
    public function editflutter($id) {
        $flutter = tblflutters::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.flutter.edit', [
            'flutter' => $flutter,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update flutter
    public function updateflutter(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_flutter' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_flutter' => 'nullable|string|max:255',
            'video_flutter' => 'nullable|string',
            'description_video_flutter' => 'nullable|string',
            'header_flutter' => 'required|string|max:255',
            'description_flutter_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_flutter_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_flutter_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_flutter_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_flutter_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_flutter_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'description_flutter_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_flutter_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_flutter_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_flutter_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $flutter = tblflutters::find($id);
        if (!$flutter) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $flutter->title = $request->title;
        $flutter->creator_id = Auth::id();
        $flutter->category_id = $request->category_id;
        $flutter->sub_category_id = $request->sub_category_id;
        $flutter->description_header = $request->description_header;
        $flutter->title_video_flutter = $request->title_video_flutter;
        $flutter->video_flutter = $request->video_flutter;
        $flutter->description_video_flutter = $request->description_video_flutter;
        $flutter->header_flutter = $request->header_flutter;
        $flutter->description_flutter_one = $request->description_flutter_one;
        $flutter->code_one = $request->code_one;
        $flutter->description_flutter_two = $request->description_flutter_two;
        $flutter->code_two = $request->code_two;
        $flutter->description_flutter_tree = $request->description_flutter_tree;
        $flutter->code_tree = $request->code_tree;
        $flutter->description_flutter_four = $request->description_flutter_four;
        $flutter->code_four = $request->code_four;
        $flutter->description_flutter_five = $request->description_flutter_five;
        $flutter->code_five = $request->code_five;
        $flutter->description_flutter_six = $request->description_flutter_six;
        $flutter->code_six = $request->code_six;
         $flutter->description_flutter_seven = $request->description_flutter_seven;
        $flutter->code_seven = $request->code_seven;
        $flutter->description_flutter_eight = $request->description_flutter_eight;
        $flutter->code_eight = $request->code_eight;
        $flutter->description_flutter_nine = $request->description_flutter_nine;
        $flutter->code_nine = $request->code_nine;
        $flutter->description_flutter_ten = $request->description_flutter_ten;
        $flutter->code_ten = $request->code_ten;
        $flutter->last_description = $request->last_description;
        $flutter->keywords = $request->keywords;
                $flutter->github_link = $request->github_link;
        $flutter->status = $request->status;

        if($request->hasFile('image_flutter'))
        {
            if ($flutter->image_react) {
                $oldImgPath = public_path('/default/flutter/'.$flutter->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/flutter'), $imageName);
            $flutter->image_react = $imageName;
        }

        $flutter->save();
        session()->flash('success', 'flutter template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template flutter
    public function deleteflutter($id)
    {
        $flutter = tblflutters::find($id);

        if (!$flutter) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $flutter->delete();
        session()->flash('success', 'Template flutter deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== flutter session ========

     // ======== python session ========
    // Show python
   public function viewpython()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $python = tblpythons::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.python.view', [
            'python' => $python,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createpython(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $python = tblpythons::orderBy('created_at','ASC')->get();
            return view ('backend.template.python.create', [
                'python' => $python,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save python to database
    public function savepython(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_python' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_python' => 'nullable|string|max:255',
            'video_python' => 'nullable|string',
            'description_video_python' => 'nullable|string',
            'header_python' => 'required|string|max:255',
            'description_python_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_python_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_python_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_python_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_python_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_python_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'description_python_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_python_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_python_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_python_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $python = new tblpythons();
        $python->title = $request->title;
        $python->creator_id = Auth::id();
        $python->category_id = $request->category_id;
        $python->sub_category_id = $request->sub_category_id;
        $python->description_header = $request->description_header;
        $python->title_video_python = $request->title_video_python;
        $python->video_python = $request->video_python;
        $python->description_video_python = $request->description_video_python;
        $python->header_python = $request->header_python;
        $python->description_python_one = $request->description_python_one;
        $python->code_one = $request->code_one;
        $python->description_python_two = $request->description_python_two;
        $python->code_two = $request->code_two;
        $python->description_python_tree = $request->description_python_tree;
        $python->code_tree = $request->code_tree;
        $python->description_python_four = $request->description_python_four;
        $python->code_four = $request->code_four;
        $python->description_python_five = $request->description_python_five;
        $python->code_five = $request->code_five;
        $python->description_python_six = $request->description_python_six;
        $python->code_six = $request->code_six;
         $python->description_python_seven = $request->description_python_seven;
        $python->code_seven = $request->code_seven;
        $python->description_python_eight = $request->description_python_eight;
        $python->code_eight = $request->code_eight;
        $python->description_python_nine = $request->description_python_nine;
        $python->code_nine = $request->code_nine;
        $python->description_python_ten = $request->description_python_ten;
        $python->code_ten = $request->code_ten;
        $python->last_description = $request->last_description;
        $python->keywords = $request->keywords;
        $python->github_link = $request->github_link;
        $python->status = $request->status;

        if ($request->hasFile('image_python')) {
            $imageName = time() . '.' . $request->image_python->extension();
            $request->image_python->move(public_path('/default/python'), $imageName);
            $python->image_python = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/python'), $imageName);
            $python->download_file = $imageName;
        }

        $python->save();
        session()->flash('success', 'python template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit python
    public function editpython($id) {
        $python = tblpythons::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.python.edit', [
            'python' => $python,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update python
    public function updatepython(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_python' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_python' => 'nullable|string|max:255',
            'video_python' => 'nullable|string',
            'description_video_python' => 'nullable|string',
            'header_python' => 'required|string|max:255',
            'description_python_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_python_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_python_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_python_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_python_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_python_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'description_python_seven' => 'nullable|string',
            'code_seven' => 'nullable|string',
            'description_python_eight' => 'nullable|string',
            'code_eight' => 'nullable|string',
            'description_python_nine' => 'nullable|string',
            'code_nine' => 'nullable|string',
            'description_python_ten' => 'nullable|string',
            'code_ten' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $python = tblpythons::find($id);
        if (!$python) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $python->title = $request->title;
        $python->creator_id = Auth::id();
        $python->category_id = $request->category_id;
        $python->sub_category_id = $request->sub_category_id;
        $python->description_header = $request->description_header;
        $python->title_video_python = $request->title_video_python;
        $python->video_python = $request->video_python;
        $python->description_video_python = $request->description_video_python;
        $python->header_python = $request->header_python;
        $python->description_python_one = $request->description_python_one;
        $python->code_one = $request->code_one;
        $python->description_python_two = $request->description_python_two;
        $python->code_two = $request->code_two;
        $python->description_python_tree = $request->description_python_tree;
        $python->code_tree = $request->code_tree;
        $python->description_python_four = $request->description_python_four;
        $python->code_four = $request->code_four;
        $python->description_python_five = $request->description_python_five;
        $python->code_five = $request->code_five;
        $python->description_python_six = $request->description_python_six;
        $python->code_six = $request->code_six;
        $python->description_python_seven = $request->description_python_seven;
        $python->code_seven = $request->code_seven;
        $python->description_python_eight = $request->description_python_eight;
        $python->code_eight = $request->code_eight;
        $python->description_python_nine = $request->description_python_nine;
        $python->code_nine = $request->code_nine;
        $python->description_python_ten = $request->description_python_ten;
        $python->code_ten = $request->code_ten;
        $python->last_description = $request->last_description;
        $python->keywords = $request->keywords;
        $python->github_link = $request->github_link;
        $python->status = $request->status;

        if($request->hasFile('image_python'))
        {
            if ($python->image_react) {
                $oldImgPath = public_path('/default/python/'.$python->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/python'), $imageName);
            $python->image_react = $imageName;
        }

        $python->save();
        session()->flash('success', 'python template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template python
    public function deletepython($id)
    {
        $python = tblpythons::find($id);

        if (!$python) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $python->delete();
        session()->flash('success', 'Template python deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== python session ========



    // ======== Linux session ========
    // Show Linux
   public function viewlinux()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $linux = tbllinuxs::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.linux.view', [
            'linux' => $linux,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createlinux(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $linux = tbllinuxs::orderBy('created_at','ASC')->get();
            return view ('backend.template.linux.create', [
                'linux' => $linux,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save linux to database
    public function savelinux(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_linux' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_linux' => 'nullable|string|max:255',
            'video_linux' => 'nullable|string',
            'description_video_linux' => 'nullable|string',
            'header_linux' => 'required|string|max:255',
            'description_linux_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_linux_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_linux_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_linux_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_linux_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_linux_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $linux = new tbllinuxs();
        $linux->title = $request->title;
        $linux->creator_id = Auth::id();
        $linux->category_id = $request->category_id;
        $linux->sub_category_id = $request->sub_category_id;
        $linux->description_header = $request->description_header;
        $linux->title_video_linux = $request->title_video_linux;
        $linux->video_linux = $request->video_linux;
        $linux->description_video_linux = $request->description_video_linux;
        $linux->header_linux = $request->header_linux;
        $linux->description_linux_one = $request->description_linux_one;
        $linux->code_one = $request->code_one;
        $linux->description_linux_two = $request->description_linux_two;
        $linux->code_two = $request->code_two;
        $linux->description_linux_tree = $request->description_linux_tree;
        $linux->code_tree = $request->code_tree;
        $linux->description_linux_four = $request->description_linux_four;
        $linux->code_four = $request->code_four;
        $linux->description_linux_five = $request->description_linux_five;
        $linux->code_five = $request->code_five;
        $linux->description_linux_six = $request->description_linux_six;
        $linux->code_six = $request->code_six;
        $linux->last_description = $request->last_description;
        $linux->keywords = $request->keywords;
        $linux->github_link = $request->github_link;
        $linux->status = $request->status;

        if ($request->hasFile('image_linux')) {
            $imageName = time() . '.' . $request->image_linux->extension();
            $request->image_linux->move(public_path('/default/linux'), $imageName);
            $linux->image_linux = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/linux'), $imageName);
            $linux->download_file = $imageName;
        }

        $linux->save();
        session()->flash('success', 'Linux template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit Linux
    public function editlinux($id) {
        $linux = tbllinuxs::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.linux.edit', [
            'linux' => $linux,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update Linux
    public function updatelinux(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_linux' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_linux' => 'nullable|string|max:255',
            'video_linux' => 'nullable|string',
            'description_video_linux' => 'nullable|string',
            'header_linux' => 'required|string|max:255',
            'description_linux_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_linux_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_linux_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_linux_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_linux_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'description_linux_six' => 'nullable|string',
            'code_six' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $linux = tbllinuxs::find($id);
        if (!$linux) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $linux->title = $request->title;
        $linux->creator_id = Auth::id();
        $linux->category_id = $request->category_id;
        $linux->sub_category_id = $request->sub_category_id;
        $linux->description_header = $request->description_header;
        $linux->title_video_linux = $request->title_video_linux;
        $linux->video_linux = $request->video_linux;
        $linux->description_video_linux = $request->description_video_linux;
        $linux->header_linux = $request->header_linux;
        $linux->description_linux_one = $request->description_linux_one;
        $linux->code_one = $request->code_one;
        $linux->description_linux_two = $request->description_linux_two;
        $linux->code_two = $request->code_two;
        $linux->description_linux_tree = $request->description_linux_tree;
        $linux->code_tree = $request->code_tree;
        $linux->description_linux_four = $request->description_linux_four;
        $linux->code_four = $request->code_four;
        $linux->description_linux_five = $request->description_linux_five;
        $linux->code_five = $request->code_five;
        $linux->description_linux_six = $request->description_linux_six;
        $linux->code_six = $request->code_six;
        $linux->last_description = $request->last_description;
        $linux->keywords = $request->keywords;
        $linux->github_link = $request->github_link;
        $linux->status = $request->status;

        if($request->hasFile('image_react'))
        {
            if ($linux->image_react) {
                $oldImgPath = public_path('/default/linux/'.$linux->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/linux'), $imageName);
            $linux->image_react = $imageName;
        }

        $linux->save();
        session()->flash('success', 'Linux template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template Linux
    public function deletelinux($id)
    {
        $linux = tbllinuxs::find($id);

        if (!$linux) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $linux->delete();
        session()->flash('success', 'Template Linux deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== Linux session ========

      // ======== Admin template session ========
    // Show Admin template
   public function viewadmintemplate()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $admintemplate = tbladmintemplates::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.admintemplate.view', [
            'admintemplate' => $admintemplate,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createadmintemplate(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $admintemplate = tbladmintemplates::orderBy('created_at','ASC')->get();
            return view ('backend.template.admintemplate.create', [
                'admintemplate' => $admintemplate,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save admintemplate to database
    public function saveadmintemplate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_admintemplate' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_admintemplate' => 'nullable|string|max:255',
            'video_admintemplate' => 'nullable|string',
            'description_video_admintemplate' => 'nullable|string',
            'header_admintemplate' => 'required|string|max:255',
            'description_admintemplate_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_admintemplate_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_admintemplate_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_admintemplate_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_admintemplate_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $admintemplate = new tbladmintemplates();
        $admintemplate->title = $request->title;
        $admintemplate->creator_id = Auth::id();
        $admintemplate->category_id = $request->category_id;
        $admintemplate->sub_category_id = $request->sub_category_id;
        $admintemplate->description_header = $request->description_header;
        $admintemplate->title_video_admintemplate = $request->title_video_admintemplate;
        $admintemplate->video_admintemplate = $request->video_admintemplate;
        $admintemplate->description_video_admintemplate = $request->description_video_admintemplate;
        $admintemplate->header_admintemplate = $request->header_admintemplate;
        $admintemplate->description_admintemplate_one = $request->description_admintemplate_one;
        $admintemplate->code_one = $request->code_one;
        $admintemplate->description_admintemplate_two = $request->description_admintemplate_two;
        $admintemplate->code_two = $request->code_two;
        $admintemplate->description_admintemplate_tree = $request->description_admintemplate_tree;
        $admintemplate->code_tree = $request->code_tree;
        $admintemplate->description_admintemplate_four = $request->description_admintemplate_four;
        $admintemplate->code_four = $request->code_four;
        $admintemplate->description_admintemplate_five = $request->description_admintemplate_five;
        $admintemplate->code_five = $request->code_five;
        $admintemplate->last_description = $request->last_description;
        $admintemplate->keywords = $request->keywords;
        $admintemplate->github_link = $request->github_link;
        $admintemplate->status = $request->status;

        if ($request->hasFile('image_admintemplate')) {
            $imageName = time() . '.' . $request->image_admintemplate->extension();
            $request->image_admintemplate->move(public_path('/default/admintemplate'), $imageName);
            $admintemplate->image_admintemplate = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/admintemplate'), $imageName);
            $admintemplate->download_file = $imageName;
        }

        $admintemplate->save();
        session()->flash('success', 'Admin template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit admintemplate
    public function editadmintemplate($id) {
        $admintemplate = tbladmintemplates::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.admintemplate.edit', [
            'admintemplate' => $admintemplate,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update admintemplate
    public function updateadmintemplate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_admintemplate' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_admintemplate' => 'nullable|string|max:255',
            'video_admintemplate' => 'nullable|string',
            'description_video_admintemplate' => 'nullable|string',
            'header_admintemplate' => 'required|string|max:255',
            'description_admintemplate_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_admintemplate_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_admintemplate_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_admintemplate_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_admintemplate_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $admintemplate = tbladmintemplates::find($id);
        if (!$admintemplate) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $admintemplate->title = $request->title;
        $admintemplate->creator_id = Auth::id();
        $admintemplate->category_id = $request->category_id;
        $admintemplate->sub_category_id = $request->sub_category_id;
        $admintemplate->description_header = $request->description_header;
        $admintemplate->title_video_admintemplate = $request->title_video_admintemplate;
        $admintemplate->video_admintemplate = $request->video_admintemplate;
        $admintemplate->description_video_admintemplate = $request->description_video_admintemplate;
        $admintemplate->header_admintemplate = $request->header_admintemplate;
        $admintemplate->description_admintemplate_one = $request->description_admintemplate_one;
        $admintemplate->code_one = $request->code_one;
        $admintemplate->description_admintemplate_two = $request->description_admintemplate_two;
        $admintemplate->code_two = $request->code_two;
        $admintemplate->description_admintemplate_tree = $request->description_admintemplate_tree;
        $admintemplate->code_tree = $request->code_tree;
        $admintemplate->description_admintemplate_four = $request->description_admintemplate_four;
        $admintemplate->code_four = $request->code_four;
        $admintemplate->description_admintemplate_five = $request->description_admintemplate_five;
        $admintemplate->code_five = $request->code_five;
        $admintemplate->last_description = $request->last_description;
        $admintemplate->keywords = $request->keywords;
        $admintemplate->github_link = $request->github_link;
        $admintemplate->status = $request->status;

        if($request->hasFile('image_react'))
        {
            if ($admintemplate->image_react) {
                $oldImgPath = public_path('/default/admintemplate/'.$admintemplate->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/admintemplate'), $imageName);
            $admintemplate->image_react = $imageName;
        }

        $admintemplate->save();
        session()->flash('success', 'Admin template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template admintemplate
    public function deleteadmintemplate($id)
    {
        $admintemplate = tbladmintemplates::find($id);

        if (!$admintemplate) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $admintemplate->delete();
        session()->flash('success', 'Template Admin Template deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== admintemplate session ========


    // ======== template session ========
    // Show template
   public function viewtemplate()
   {
        $categories = Categories::orderBy('created_at','ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at','ASC')->get();
        $users = User::orderBy('created_at','ASC')->get();

        $template = tbltemplates::where('creator_id', Auth::user()->id)->with(['user', 'category', 'subcategory'])->orderBy('created_at','ASC')->paginate(5);

        return view('backend.template.template.view', [
            'template' => $template,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users,
        ]);
    }

    // Go to page create
    public function createtemplate(){
        $category = Categories::orderBy('created_at','ASC')->get();
        $subcategory = Sub_categories::orderBy('created_at','ASC')->get();

        $template = tbltemplates::orderBy('created_at','ASC')->get();
            return view ('backend.template.template.create', [
                'template' => $template,
                'category' => $category,
                'subcategory' => $subcategory,
        ]);
    }

    // Save template to database
    public function savetemplate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_template' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_template' => 'nullable|string|max:255',
            'video_template' => 'nullable|string',
            'description_video_template' => 'nullable|string',
            'header_template' => 'required|string|max:255',
            'description_template_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_template_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_template_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_template_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_template_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $template = new tbltemplates();
        $template->title = $request->title;
        $template->creator_id = Auth::id();
        $template->category_id = $request->category_id;
        $template->sub_category_id = $request->sub_category_id;
        $template->description_header = $request->description_header;
        $template->title_video_template = $request->title_video_template;
        $template->video_template = $request->video_template;
        $template->description_video_template = $request->description_video_template;
        $template->header_template = $request->header_template;
        $template->description_template_one = $request->description_template_one;
        $template->code_one = $request->code_one;
        $template->description_template_two = $request->description_template_two;
        $template->code_two = $request->code_two;
        $template->description_template_tree = $request->description_template_tree;
        $template->code_tree = $request->code_tree;
        $template->description_template_four = $request->description_template_four;
        $template->code_four = $request->code_four;
        $template->description_template_five = $request->description_template_five;
        $template->code_five = $request->code_five;
        $template->last_description = $request->last_description;
        $template->keywords = $request->keywords;
        $template->github_link = $request->github_link;
        $template->status = $request->status;

        if ($request->hasFile('image_template')) {
            $imageName = time() . '.' . $request->image_template->extension();
            $request->image_template->move(public_path('/default/template'), $imageName);
            $template->image_template = $imageName;
        }
        if ($request->hasFile('download_file')) {
            $imageName = time() . '.' . $request->download_file->extension();
            $request->download_file->move(public_path('/default/template'), $imageName);
            $template->download_file = $imageName;
        }

        $template->save();
        session()->flash('success', 'template template saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    // Edit template
    public function edittemplate($id) {
        $template = tbltemplates::with(['user', 'category', 'subcategory'])->findOrFail($id);
        $categories = Categories::orderBy('created_at', 'ASC')->get();
        $subcategories = Sub_categories::orderBy('created_at', 'ASC')->get();

        return view('backend.template.template.edit', [
            'template' => $template,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    // Update template
    public function updatetemplate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'image_template' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'description_header' => 'nullable|string',
            'title_video_template' => 'nullable|string|max:255',
            'video_template' => 'nullable|string',
            'description_video_template' => 'nullable|string',
            'header_template' => 'required|string|max:255',
            'description_template_one' => 'nullable|string',
            'code_one' => 'nullable|string',
            'description_template_two' => 'nullable|string',
            'code_two' => 'nullable|string',
            'description_template_tree' => 'nullable|string',
            'code_tree' => 'nullable|string',
            'description_template_four' => 'nullable|string',
            'code_four' => 'nullable|string',
            'description_template_five' => 'nullable|string',
            'code_five' => 'nullable|string',
            'last_description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'github_link' => 'nullable|string',
            'download_file' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,webp,zip,rar|max:102400',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $template = tbltemplates::find($id);
        if (!$template) {
            return response()->json([
                'status' => false,
                'errors' => ['Template not found.']
            ]);
        }

        $template->title = $request->title;
        $template->creator_id = Auth::id();
        $template->category_id = $request->category_id;
        $template->sub_category_id = $request->sub_category_id;
        $template->description_header = $request->description_header;
        $template->title_video_template = $request->title_video_template;
        $template->video_template = $request->video_template;
        $template->description_video_template = $request->description_video_template;
        $template->header_template = $request->header_template;
        $template->description_template_one = $request->description_template_one;
        $template->code_one = $request->code_one;
        $template->description_template_two = $request->description_template_two;
        $template->code_two = $request->code_two;
        $template->description_template_tree = $request->description_template_tree;
        $template->code_tree = $request->code_tree;
        $template->description_template_four = $request->description_template_four;
        $template->code_four = $request->code_four;
        $template->description_template_five = $request->description_template_five;
        $template->code_five = $request->code_five;
        $template->last_description = $request->last_description;
        $template->keywords = $request->keywords;
        $template->github_link = $request->github_link;
        $template->status = $request->status;

        if($request->hasFile('image_react'))
        {
            if ($template->image_react) {
                $oldImgPath = public_path('/default/template/'.$template->image_react);
                if(File::exists($oldImgPath)){
                    File::delete($oldImgPath);
                }
            }
            $imageName = time() . '.' . $request->image_react->extension();
            $request->image_react->move(public_path('/default/template'), $imageName);
            $template->image_react = $imageName;
        }

        $template->save();
        session()->flash('success', 'template template Updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }
    // Delete template template
    public function deletetemplate($id)
    {
        $template = tbltemplates::find($id);

        if (!$template) {
            // html not found
            session()->flash('error', 'This template not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete the html
        $template->delete();
        session()->flash('success', 'Template template deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== template session ========


    // ======== Blog session ========
    public function viewblog()
    {
        $users = User::orderBy('created_at','ASC')->get();

        $blogs = blogs::where('creator_id', Auth::user()->id)->with('user')->orderBy('created_at','ASC')->paginate(5);

        return view('backend.blog-post.blog.view', [
            'blogs' => $blogs,
            'users' => $users,
        ]);
    }

    public function createblog()
    {
        $blogs = blogs::orderBy('created_at','ASC')->get();
        return view('backend.blog-post.blog.create', [
            'blogs' => $blogs,
        ]);
    }

    public function saveblog(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Create a new blog instance
        $blogs = new blogs();
        $blogs->name = $request->name;
        $blogs->creator_id = Auth::id();
        $blogs->detail_this_template = $request->detail_this_template;
        $blogs->header_one = $request->header_one;
        $blogs->description_one = $request->description_one;
        $blogs->header_two = $request->header_two;
        $blogs->description_two = $request->description_two;
        $blogs->header_tree = $request->header_tree; // Fixed typo
        $blogs->description_tree = $request->description_tree; // Fixed typo
        $blogs->header_four = $request->header_four;
        $blogs->description_four = $request->description_four;
        $blogs->header_five = $request->header_five;
        $blogs->description_five = $request->description_five;
        $blogs->header_six = $request->header_six;
        $blogs->description_six = $request->description_six;
        $blogs->header_seven = $request->header_seven;
        $blogs->description_seven = $request->description_seven;
        $blogs->header_eight = $request->header_eight;
        $blogs->description_eight = $request->description_eight;
        $blogs->header_nine = $request->header_nine;
        $blogs->description_nine = $request->description_nine;
        $blogs->header_ten = $request->header_ten;
        $blogs->description_ten = $request->description_ten;
        $blogs->header_final = $request->header_final;
        $blogs->description_final = $request->description_final;
        $blogs->status = $request->status;

        // Handle the main image (if provided)
        if ($request->hasFile('image')) {
            $imageBlog = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/default/blogs'), $imageBlog);
            $blogs->image = $imageBlog;
        }

        // Handle additional images
        $imageFields = [
            'image_one', 'image_two', 'image_tree', 'image_four',
            'image_five', 'image_six', 'image_seven', 'image_eight',
            'image_nine', 'image_ten'
        ];

        foreach ($imageFields as $index => $field) {
            if ($request->hasFile($field)) {
                $filename = time() . ($index + 1) . '.' . $request->file($field)->extension();
                $request->file($field)->move(public_path('/default/blogs'), $filename);
                $blogs->$field = $filename;
            }
        }

        // Save the blog entry to the database
        $blogs->save();
        session()->flash('success', 'This blog saved successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    public function editblog($id)
    {
        $blogs = blogs::orderBy('created_at','ASC')->findOrFail($id);

        return view('backend.blog-post.blog.edit', [
            'blogs' => $blogs,
        ]);
    }

    public function updateblog(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Find the blog by its ID
        $blogs = blogs::find($id);

        // Return error response if the blog does not exist
        if (!$blogs) {
            return response()->json([
                'status' => false,
                'errors' => ['Blog not found.'],
            ]);
        }

        // Update the blog instance with the new data
        $blogs->name = $request->name;
        $blogs->detail_this_template = $request->detail_this_template;
        $blogs->header_one = $request->header_one;
        $blogs->description_one = $request->description_one;
        $blogs->header_two = $request->header_two;
        $blogs->description_two = $request->description_two;
        $blogs->header_tree = $request->header_tree;
        $blogs->description_tree = $request->description_tree;
        $blogs->header_four = $request->header_four;
        $blogs->description_four = $request->description_four;
        $blogs->header_five = $request->header_five;
        $blogs->description_five = $request->description_five;
        $blogs->header_six = $request->header_six;
        $blogs->description_six = $request->description_six;
        $blogs->description_seven = $request->description_seven;
        $blogs->header_eight = $request->header_eight;
        $blogs->description_eight = $request->description_eight;
        $blogs->header_nine = $request->header_nine;
        $blogs->description_nine = $request->description_nine;
        $blogs->header_ten = $request->header_ten;
        $blogs->description_ten = $request->description_ten;
        $blogs->header_final = $request->header_final;
        $blogs->description_final = $request->description_final;
        $blogs->status = $request->status;

        // Handle the main image (if provided)
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($blogs->image && file_exists(public_path('/default/blogs/' . $blogs->image))) {
                unlink(public_path('/default/blogs/' . $blogs->image));
            }
            // Save new image
            $imageBlog = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/default/blogs'), $imageBlog);
            $blogs->image = $imageBlog;
        }

        // Handle additional images
        $imageFields = [
            'image_one', 'image_two', 'image_tree', 'image_four',
            'image_five', 'image_six', 'image_seven', 'image_eight',
            'image_nine', 'image_ten'
        ];

        foreach ($imageFields as $index => $field) {
            if ($request->hasFile($field)) {
                // Delete old image if it exists
                if ($blogs->$field && file_exists(public_path('/default/blogs/' . $blogs->$field))) {
                    unlink(public_path('/default/blogs/' . $blogs->$field));
                }
                // Save new image
                $filename = time() . ($index + 1) . '.' . $request->file($field)->extension();
                $request->file($field)->move(public_path('/default/blogs'), $filename);
                $blogs->$field = $filename;
            }
        }

        // Save the updated blog entry to the database
        $blogs->save();

        session()->flash('success', 'This blog updated successfully.');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);
    }

    public function deletblog($id)
    {
        $blogs = blogs::find($id);

        if (!$blogs) {
            // blog not found
            session()->flash('error', 'This Blog not found.');

            return response()->json([
                'status' => false
            ]);
        }

        // Delete images if they exist
    $imageFields = [
        'image', 'image_one', 'image_two', 'image_tree', 'image_four',
        'image_five', 'image_six', 'image_seven', 'image_eight',
        'image_nine', 'image_ten'
    ];

    foreach ($imageFields as $field) {
        if ($blogs->$field && file_exists(public_path('/default/blogs/' . $blogs->$field))) {
            unlink(public_path('/default/blogs/' . $blogs->$field));
        }
    }

        // Delete the blog
        $blogs->delete();
        session()->flash('success', 'Blog deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
    // ======== Blog session ========
}
