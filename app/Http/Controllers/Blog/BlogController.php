<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Wallet;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->wallet = new Wallet();
    }
    public function index()
    {
        $data['menu'] = 'article';
        $data['blogs'] = Blog::where(['author_id' => Auth::user()->id])->get();
        return view('blog.index', $data);
    }

    public function create()
    {
        $data['menu'] = 'create-blog';
        $data['bcategories'] = BlogCategory::all();

        return view('blog.create-blog', $data);
    }

    public function blog()
    {
        $data['menu'] = 'blog';
        $data['blogs'] = Blog::orderBy('id', 'DESC')->get();
        return view('blog.blogs', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);
        $blogSlug = $request->title.rand();
        $slug = Str::slug($blogSlug, '-');

        $blog = new Blog();
        $blog->author_id = Auth::user()->id; 
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->blog_slug = $slug;

        $user_id = Auth::user()->id;
        $hasWallet = $this->wallet->hasWallet($user_id);

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $request->file('image')->storeAs('public/uploads/', $fileNameToStore);
            $blog->image = $fileNameToStore;
            $blog->save();

            if ($hasWallet == true) {
                $walletPoint = $this->wallet->addPoint('blog', $user_id);
            }

            return Redirect('/my/article');
        } else {
            $blog->image = ' ';
            $blog->save();

            if ($hasWallet == true) {
                $walletPoint = $this->wallet->addPoint('blog', $user_id);
            }

            return Redirect('/my/article');
        }

        return back();

    }

    public function details($slug)
    {
        $data['menu'] = 'blog-deatils';
        $data['moreBlogs'] = Blog::latest()->limit(4)->get();
        $data['singleBlog'] = $singleBlog = Blog::where(['blog_slug' => $slug])->first();

        if (empty($singleBlog)) {
            return back(); 
        } else {
            $data['blogKey'] = $blogKey = 'blog_'. $singleBlog->id;
            if (!Session::has($blogKey)) {
              $singleBlog->increment('views');
              Session::put($blogKey, 1);
            }
            $data['recentBlog'] = Blog::orderBy('id', 'asc')->limit(3)->get();
            $data['popularBlog'] = Blog::orderBy('views', 'desc')->limit(3)->get();

            return view('blog.blog-deatils', $data);
        }
    }

   public function deleteblog($id)
   {
        $blog = Blog::find($id);
        if (empty($blog)) {
            return  redirect('/my/article');
        } else {
            $blog->delete();
        }

        return redirect()->back();
   }

   public function editblog($id)
   {
        $data['menu'] = 'edit-blog';
        $data['bcategories'] = BlogCategory::all();
        $data['blogInfo'] = Blog::where('id', $id)->first();

        if (empty($data['blogInfo'])) {
            return redirect('/my/article');
        }

        return view('blog.edit-blog', $data);
   }

   public function updateblog(Request $request, $id)
   {
        $blogSlug = $request->title.rand();
        $slug = Str::slug($blogSlug, '-');

        $blog = Blog::find($id);
        if (!empty($blog)) {
            $blog->author_id = Auth::user()->id; 
            $blog->title = $request->title;
            $blog->category_id = $request->category_id;
            $blog->description = $request->description;
            $blog->content = $request->content;
            $blog->blog_slug = $slug;
            $image = $request->image;

            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore =time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/uploads/', $fileNameToStore);
                $blog->image = $fileNameToStore;
                $blog->save();
            } else {
                $blog->save();
            }

            return redirect('/my/article');
        } else {
            return redirect('/my/article');
        }
   }
}
