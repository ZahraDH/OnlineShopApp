<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('user_id','=',Auth::user()->id)->get()->all();
        $categories = Category::all();
        return view('pages.comments',compact('comments','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'product_id' => 'required',
            'comment' => 'required'
        ]);

        
        $user_id =  Auth::user()->id;
        Comment::create([
            'user_id' => $user_id,
            'product_id' => $request->product_id,
            'comment' => $request->comment
        ]);

        return redirect()->route('product-details',$request->product_id)

                        ->with('success','دیدگاه شما با موفقیت ثیبت شد .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //$comments = Comment::where('user_id','=',Auth::user()->id)->get()->all();
        $categories = Category::all();
        return view('pages.comment-edit',compact('comment','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comment $comment)
    {
        request()->validate([
            'user_id'=> 'required',
            'product_id' => 'required',
            'comment' => 'required'
        ]);


        $comment->update($request->all());

        return redirect()->route('comments.index')

                        ->with('success','دیدگاه شما با موفقیت ویرایش شد .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success','دیدگاه با موفقیت حذف شد');
    }

    public function delete_comment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('show-comments')->with('success','دیدگاه با موفقیت حذف شد');
    }


    public function adminpanel_comments(){
        $comments = Comment::paginate(5);

        $comments_for_sellers = array();
        $i = 0 ;
        foreach ($comments as $comment) {
            if ($comment->product->brand_id == Auth::user()->brand_id) {
                $comments_for_sellers[$i] = $comment;
                $i++;
            }
        }
        return view('admin.comments.index',compact('comments','comments_for_sellers'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminpanel_comment_details(Comment $comment){
        return view('admin.comments.show',compact('comment'));
    }
}
