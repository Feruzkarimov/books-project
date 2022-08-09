<?php
$config = require 'config.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'functions.php';
require 'Models/Book.php';
require 'Models/Author.php';
require 'Models/Category.php';

$pdo = Connection::make($config['database']);

$query = new QueryBuilder(
    Connection::make($config['database'])
);

$column = null;
$value = null;

$author_id = @$_GET['author_id'];
if ($author_id != null) {
    $column = 'author_id';
    $value = $author_id;
}

$category_id = @$_GET['category_id'];
if ($category_id != null) {
    $column = 'category_id';
    $value = $category_id;
}

$books = $query->selectAll(Book::class, $column, $value);

// This can be optimised
foreach ($books as $i => $book) {
    $book->category = $query->selectBy(Category::class, 'id', $book->category_id);
    $book->author = $query->selectBy(Author::class, 'id', $book->author_id);
    $books[$i] = $book;
}

require 'books.view.php';
?>