<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;
use App\Models\Company;
use App\Models\Blog;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCompanyRequest;



class HomeController extends Controller
{
   public $states=array(
      'Andra Pradesh' => 'Andra Pradesh',
      'Arunachal Pradesh' => 'Arunachal Pradesh',
      'Assam' => 'Assam',
      'Bihar' => 'Bihar',
      'Chhattisgarh' => 'Chhattisgarh',
      'Goa' => 'Goa',
      'Gujarat'=>'Gujarat',
      'Haryana'=>'Haryana',
      'Himachal Pradesh'=>'Himachal Pradesh',
      'Jammu and Kashmir'=>'Jammu and Kashmir',
      'Jharkhand'=>'Jharkhand',
      'Karnataka'=>'Karnataka',
      'Kerala'=>'Kerala',
      'Madya Pradesh'=>'Madya Pradesh',
      'Maharashtra'=>'Maharashtra',
      'Manipur'=>'Manipur',
      'Meghalaya'=>'Meghalaya',
      'Mizoram'=>'Mizoram',
      'Nagaland'=>'Nagaland',
      'Orissa'=>'Orissa',
      'Punjab'=>'Punjab',
      'Rajasthan'=>'Rajasthan',
      'Sikkim'=>'Sikkim',
      'Tamil Nadu'=>'Tamil Nadu',
      'Telangana'=>'Telangana',
      'Tripura'=>'Tripura',
      'Uttaranchal'=>'Uttaranchal',
      'Uttar Pradesh'=>'Uttar Pradesh',
      'West Bengal'=>'West Bengal',
      'Andaman and Nicobar Islands'=>'Andaman and Nicobar Islands',
      'Chandigarh'=>'Chandigarh',
      'Dadar and Nagar Haveli'=>'Dadar and Nagar Haveli',
      'Daman and Diu'=>'Daman and Diu',
      'Delhi'=>'Delhi',
      'Lakshadeep'=>'Lakshadeep',
      'Pondicherry'=>'Pondicherry'
  );
   public function index()
   {
      $blogs = Blog::latest()->where(['status' => 'active'])->take(4)->get();
      $companies = Company::where('status', 'active')
         ->withAvg('reviews', 'review')  // Calculate the average review score for each company
         ->having('reviews_avg_review', '>', 3)  // Only include companies with avg rating > 3
         ->orderBy('reviews_avg_review', 'desc')
         ->take(8)
         ->get();
      $newCompanies = Company::where('status', 'active')->latest()->take(8)->get();
      $reviews = Review::latest()->with(['company', 'user'])->take(8)->get();
      return view('frontend.index', compact('companies', 'blogs', 'newCompanies', 'reviews'));
   }

   public function blog()
   {
      $blogs = Blog::latest()->where(['status' => 'active'])->take(6)->get();
      $categories = Category::latest()->where(['status' => 'active'])->take(6)->get();
      $recentBlogs = Blog::latest()->where(['status' => 'active'])->take(3)->get();
      return view('frontend.blog.index', compact('blogs', 'categories', 'recentBlogs'));
   }

   public function reviewList()
   {
      $reviews = Review::latest()->with(['company', 'user'])->paginate(12);
      return view('frontend.review.list', compact('reviews'));
   }

   public function signup()
   {
      return view('frontend.signup');
   }

   public function profile()
   {
      $user = User::where('id', Auth()->user()->id)->first();
      $companies = Company::whereIn(
         'id',
         Review::where('user_id', $user->id)
            ->pluck('company_id')
      )->distinct()->get();
      return view('frontend.profile', compact('user', 'companies'));
   }

   public function userProfile()
   {
      $user = User::where('id', Auth()->user()->id)->first();
      $companies = Company::whereIn(
         'id',
         Review::where('user_id', $user->id)
            ->pluck('company_id')
      )->distinct()->get();
      return view('frontend.user-profile', compact('user', 'companies'));
   }

   public function updateProfile(Request $request)
   {
      $user = Auth::user();
      $request->validate([
         'name' => 'required|string|max:255',
         'phone' => 'nullable|string|max:15',
         'email' => 'required|email|max:255',
         'business' => 'nullable|string|max:255',
         'address' => 'nullable|string|max:255',
         'about' => 'nullable|string',
         'facebook' => 'nullable|string',
         'twitter' => 'nullable|string',
         'linkedin' => 'nullable|string',
         'youtube' => 'nullable|string',
         'instagram' => 'nullable|string',
         'pinterest' => 'nullable|string',
         'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      $user->name = $request->name;
      $user->phone = $request->phone;
      $user->email = $request->email;
      $user->business = $request->business;
      $user->address = $request->address;
      $user->about = $request->about;
      $user->facebook = $request->facebook;
      $user->twitter = $request->twitter;
      $user->linkedin = $request->linkedin;
      $user->youtube = $request->youtube;
      $user->instagram = $request->instagram;
      $user->pinterest = $request->pinterest;

      if ($request->hasFile('profile')) {
         if ($user->profile_picture) {
            $oldImagePath = public_path('images/profile/' . $user->profile_picture);
            if (file_exists($oldImagePath)) {
               unlink($oldImagePath);
            }
         }
         $image = $request->file('profile');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $destinationPath = public_path('images/profile');
         $image->move($destinationPath, $imageName);
         $user->profile = $imageName;
      }

      $user->save();

      return redirect()->back()->with('success', 'Profile updated successfully!');
   }

   public function category()
   {
      return view('frontend.category');
   }

   public function userChangePassword()
   {
      $user = User::where('id', Auth()->user()->id)->first();
      return view('frontend.user-profile', compact('user'));
   }

   public function subCategory(Request $request, $slug)
   {
      $category = Category::where('slug', $slug)->first();
      if (!$category) {
         abort(404);
      }
      $query = Category::where('is_parent', $category->id);

      if ($request->has('name')) {
         $query->where('name', 'like', '%' . $request->query('name') . '%');
      }
      $subCategories = $query->paginate(20);
      if ($subCategories->isEmpty()) {
         return redirect('categories/' . $category->slug);
      }
      return view('frontend.sub-category', compact('subCategories'));
   }

   public function login()
   {
      return view('frontend.login');
   }

   public function page($slug)
   {
      $page = Page::where(['slug' => $slug, 'status' => 'active'])->first();
      if (!empty($page)) {
         return view('frontend.page', compact('page'));
      }
      abort(404);
   }

   public function updateProfilePassword(Request $request)
   {
      $user = Auth::user();
      $request->validate([
         'password' => 'required|string|min:8|confirmed',
      ]);

      $user->password = bcrypt($request->password);


      $user->save();

      return redirect()->back()->with('success', 'Profile Password updated successfully!');
   }

   public function blogs()
   {
      $user = User::where('id', Auth()->user()->id)->first();
      $blogs = Blog::latest()->where('user_id', $user->id)->with('category');
      $blogs = $blogs->paginate(20);
      $categories = Category::latest()->where(['status' => 'active'])->take(6)->get();
      return view('frontend.user-profile', compact('blogs', 'categories', 'user'));
   }

   public function addBlogs()
   {
      $user = User::where('id', Auth()->user()->id)->first();

      $categories = Category::latest()->where(['status' => 'active'])->get();

      return view('frontend.user-profile', compact('categories', 'user'));
   }

   public function storeUserBlog(Request $request)
   {
      $user = Auth::user();

      $request->validate([
         'title' => 'required|string|max:500',
         'slug' => 'required|string|max:500',
         'category' => 'required|integer',
         'meta_title' => 'nullable|string|max:255',
         'meta_description' => 'nullable|string|max:255',
         'meta_key' => 'nullable|string|max:255',
         'description' => 'required|nullable|string',
         'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      $blog = new Blog();
      $blog->title = $request->title;
      $blog->category_id = $request->category;
      $blog->slug = $request->slug;
      $blog->description = $request->description;
      $blog->meta_title = $request->meta_title;
      $blog->meta_description = $request->meta_description;
      $blog->meta_key = $request->meta_key;
      $blog->user_id = $user->id;

      // Handle the image upload
      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $destinationPath = public_path('images/blog');
         $image->move($destinationPath, $imageName);
         $blog->image = $imageName;
      }

      $blog->status = 'inactive';
      $blog->save();

      return redirect()->route('user.blogs')->with('success', 'Blog created successfully!');
   }

   public function editBlog($id)
   {
      $user = User::where('id', Auth()->user()->id)->first();
      $blog = Blog::where('id', $id)->first();
      $categories = Category::latest()->where(['status' => 'active'])->get();
      $edit = '1';

      return view('frontend.user-profile', compact('categories', 'user', 'blog', 'edit'));
   }

   public function updateUserBlog($id, Request $request)
   {
      $user = Auth::user();
      $request->validate([
         'title' => 'required|string|max:500',
         'slug' => 'required|string|max:500',
         'category' => 'required|integer',
         'meta_title' => 'nullable|string|max:255',
         'meta_description' => 'nullable|string|max:255',
         'meta_key' => 'nullable|string|max:255',
         'description' => 'required|nullable|string',
         'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);
      $blog = Blog::where('id', $id)->first();
      $blog->title = $request->title;
      $blog->status = $request->status;
      $blog->description = $request->description;
      $blog->slug = $request->title;
      $blog->category_id = $request->category ?? '0';
      $blog->meta_title = $request->meta_title;
      $blog->meta_description = $request->meta_description;
      $blog->meta_key = $request->meta_key;
      $blog->meta_key = $request->meta_key;
      $blog->user_id = $user->id;
      $blog->status = $request->status;

      if ($request->hasFile('image')) {
         // Remove old image if it exists
         if ($blog->image) {
            $oldImagePath = public_path('images/blog/' . $blog->image);
            if (file_exists($oldImagePath)) {
               unlink($oldImagePath);
            }
         }

         $image = $request->file('image');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $destinationPath = public_path('images/blog');
         $image->move($destinationPath, $imageName);
         $blog->image = $imageName;
      }

      $blog->save();

      return redirect()->route('user.blogs')->with('success', 'Blog updated successfully!');
   }

   public function userReview()
   {
      $user = User::where('id', Auth()->user()->id)->first();
      $reviews = Review::latest()->where('user_id', $user->id)->with(['company', 'user']);
      $reviews = $reviews->paginate(5);
      return view('frontend.user-profile', compact('user', 'reviews'));
   }

   public function userBusiness()
   {
      $user = User::where('id', Auth()->user()->id)->first();
      $companies = Company::latest()->where('user_id', $user->id);
      $companies = $companies->paginate(5);
      return view('frontend.user-profile', compact('user', 'companies'));
   }

   public function userBusinessAdd()
   {
      $user = User::where('id', Auth()->user()->id)->first();

      $categories = Category::latest()->where(['status' => 'active'])->get();
      $states=$this->states;
      return view('frontend.user-profile', compact('categories', 'user','states'));
   }

   public function storeUserbusiness(StoreCompanyRequest $request)
   {
      $user = Auth::user();

      $company = new Company($request->validated());
     
      
      if ($request->hasFile('logo')) {
         $logo = $request->file('logo');
         $logoName = time() . '.' . $logo->getClientOriginalExtension();
         $destinationPath = public_path('logos');
         $logo->move($destinationPath, $logoName);
         $company->logo = $logoName;
      }

      if ($request->website_url) {
         $company->website_url =  preg_replace('#^https?://#', '', rtrim($request->website_url, '/'));
      }
      if ($request->has('categories')) {
         $company->category = implode(',', $request->categories);
      }
      $company->user_id=$user->id;
      $company->save();
      return redirect()->route('user.business')->with('success', 'Company created successfully.');
   }

   public function editBusiness($id)
   {
      $user = User::where('id', Auth()->user()->id)->first();
      $company = Company::where('id', $id)->first();
      $states=$this->states;
      $categories = Category::latest()->where(['status' => 'active'])->get();
      $edit = '1';

      return view('frontend.user-profile', compact('categories', 'user', 'company', 'edit','states'));
   }

   public function updateUserbusiness(StoreCompanyRequest $request,$id)
    {
      $company = Company::where('id', $id)->first();
        $company->fill($request->validated());

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                $oldLogoPath = public_path('logos/' . $company->logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }

            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $destinationPath = public_path('logos'); 
            $logo->move($destinationPath, $logoName); 
            $company->logo = $logoName;
        }

        if($request->website_url){
            $company->website_url =  preg_replace('#^https?://#', '', rtrim($request->website_url, '/'));
        }

        if ($request->has('categories')) {
            $company->category = implode(',', $request->categories);
        }

        $company->save();
        return redirect()->route('user.business')->with('success', 'Company updated successfully.');
    }
}
