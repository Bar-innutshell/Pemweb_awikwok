<?php

namespace App\Models;

class Post
{
    public static function all()
    {
        return [
            [
                'id'=> '1',
                'slug' => 'judul-post-1',
                'title' => 'Judul Post 1',
                'author' => 'Mujadid Akbar Paryono',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.'
            ],
            [
                'id'=> '2',
                'slug' => 'judul-post-2',
                'title' => 'Judul Post 2',
                'author' => 'Mujadid Akbar Paryono',
                'body' => 'Lorem ipsum dolor ngacng dlkdoadl sit amet consectetur adipisicing elit. Quisquam, voluptates.'
            ]
        ];
    }
}