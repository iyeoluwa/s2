<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleComments extends Component
{
    public $article;
    public $comment;
    public $commentable;




    public function submitComment($id){
        $article = Article::find($id);
        $user = auth()->user();

        //now comment as a user

       return $this->commentable =  $article->commentAsUser($user, $this->comment);
    }
    public function render()
    {
        return view('livewire.article-comments');
    }
}
