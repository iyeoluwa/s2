<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Mtownsend\ReadTime\ReadTime;
use Spatie\Tags\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //this is to show all the articles
        $articles = $request->user()->posts;
        return view('admin.articles.articles',[
            'articles'=>$articles
        ]);
    }
    public function indexHome(){
        // this will return the articles order by date
        $articles = Article::latest()->paginate(10);
        return view('blog.index',[
            'articles'=>$articles
        ]);
    }

    public function showNewForm(){
        //this is the add form
        return view('admin.articles.add-article');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //this is to create the article


        $validated = $request->validate([
                    'title'=>'required',
                    'summary'=>'required',
                    'image'=>'mimes:jpeg,JPG,jpg,PNG,png,gif|max:1024|required',
                    'contents'=>'required',
        ]);

        if ($request->hasFile('image')){
        if(App::environment('local')){

             $filenamewithextension = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
            Storage::putFileAs('public/storage',$request->file('image')->getRealPath(),$filenametostore);



            $path  = asset('storage/storage/'.$filenametostore);
            $input = $request->all();
            $tags = explode(",", $input['tags']);
            $post  = $request->user()->posts()->create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'content'=>$request->contents,
            'cover_image'=>$path,
            'tags'=>$tags,
            ]);
            $lastid = $post->id;

            return redirect()->route('dashboard');

        }else{

            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath(),[
                'folder'=>'sureword',
            ])->getPath();
            $post = $request->user()->posts()->create([
            'title'=>$request->title,
            'summary'=>$request->summary,
            'content'=>$request->contents,
            'cover_image'=>$uploadedFileUrl,
            ]);
            $lastid = $post->id;
            return redirect()->route('dashboard');
        }
         }
    }

    /**
     * Get the articles attached to all tags.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllTags()
    {
        //this is to get the articles attached to all tags
        $tags = Tag::ordered()->get();
        return view('blog.tags.index',[
            'tags'=>$tags,

        ]);
    }

    /**
     * Get the articles attached to a particular tag.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTagPost($tag)
    {
        //this is to get the articles attached to a particular tag
        $articles = Article::withAnyTags([$tag])->get();
        return view('blog.tags.tag',[
            'tag'=>$tag,
            'articles'=>$articles,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
         $article = Article::with(['user'])->find($id);

         $minutes = read_time($article->content);

        $minute = explode(' ',$minutes->get());
        $numberofminutes = intval($minute[0])/1.5;
        $totalminutes = round($numberofminutes);
        $expires = now()->addMinutes($totalminutes);

         views($article)->cooldown($expires)->record();

        $count = views($article)->remember(120)->count();

             $tagId = \DB::table('taggables')->distinct()->select('tag_id')->where('taggable_type',Article::class)
                ->get()->pluck('tag_id');
            $tags = Tag::whereIn('id',$tagId)->get();
            //this is for the recommendation

        $query = Article::where(['user_id'=>$article->user_id])->where('id','!=',$article->id)->take(4)->get();
        //this is to show individual article
        return view('blog.article-page',[
            'article'=>$article,
            'count'=>$count,
            'tags'=>$tags,
            'recommendations'=>$query,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //this is to return the article to be edited
        $article = Article::find($id);
         $tagId = \DB::table('taggables')->distinct()->select('tag_id')->where('taggable_type',Article::class)
            ->get()->pluck('tag_id');
        $tags = Tag::whereIn('id',$tagId)->get();


        return view('admin.articles.edit-article',[
            'article'=>$article,
             'tags'=>$tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //this is to update the edited article

        $validated = $request->validate([
                    'title'=>'required',
                    'summary'=>'required',
                    'contents'=>'required',
        ]);


            $post = Article::find($id);
            $post->title = $request->title;
            $post->summary = $request->summary;
            $post->content = $request->contents;
            $post->save();
            return redirect()->route('dashboard');


    }



    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //this is to delete the article
        $this->authorize('delete',$article); // if id's do not match throw exception
        $article->delete();
        return back();
    }
}
