<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>
<body>
    <table border="1px solid black">
        <tr>
            <th>Id</th>
            <th>Book</th>
            <th>Author</th>
            <th>Category</th>
            <th>Description</th>
            <th>Image</th>
        </tr>

        <?php
            foreach ($books as $book) {

        ?>

        <tr>
            <td><?php echo $book->id;?></td>
            <td><?php echo $book->title;?></td>
            <td><a href="/?author_id=<?php echo $book->author->id?>"><?php echo $book->author->fullname;?></a></td>
            <td><a href="/?category_id=<?php echo $book->category->id?>"><?php echo $book->category->category_name;?></a></td>
            <td><?php echo $book->description;?></td>
            <td><img src="<?php echo $book->image; ?>" alt=""></td>
        </tr>

        <?php
                }
            ?>

    </table>
    
</body>
</html>