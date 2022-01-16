<?php
namespace App\Repository;

class CommentRepository{
    private $authorId;
    private $authorName;
    private $content;

    public function __construct( $authorId,$authorName, $content) 
    {
       $this->authorId = $authorId;
       $this->authorName = $authorName;
       $this->content = $content;
    }


    public function getAuthorId()
    {
        return $this->authorId;
    }
    
    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function getContent()
    {
        return $this->content;
    }
}