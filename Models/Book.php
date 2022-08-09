<?php

class Book 
{
    public int $id;
    public int $category_id;
    public int $author_id;

    public ?string $title;
    public ?string $image;
    public ?string $description;

    public Category $category;
    public Author $author;


    public static string $_table = "books";
}