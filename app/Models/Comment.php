<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'name', 'content'];
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('comment');
            $table->timestamps();
        });
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }


}
