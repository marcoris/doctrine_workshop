<?php

$em = getEntityManager();
$post = $em->getRepository(\App\Entities\Post::class)->find(1);

// Check if there is a post
if (!$post) {
    echo "<h1>404!</h1><p>Leider wurde der Blogpost nicht gefunden!</p>";
} else {
    $categories = $post->getCategories();
    $tags = $post->getTags();
    $comments = $post->getComments();

    echo "<h1>" . $post->getTitle() . "</h1><br>";
    echo "<small>" . $post->getCreatedAt()->format("d. F Y") . " By " . $post->getAuthor() . "</small><br>";

    // List categories
    if ($categories) {
        echo "<strong>Categories: </strong><br>";
        $catArray = "";
        foreach ($categories as $category) {
            if ($category) {
                $catArray .= ", " . $category->getName();
            }
        }
        echo ltrim($catArray, ", ") . "<br>";
    }

    // List tags
    if ($tags) {
        echo "<strong>Tags:</strong><br>";
        $tagArray = "";
        foreach ($tags as $tag) {
            if ($tag) {
                $tagArray .= ", " . $tag->getName();
            }
        }
        echo ltrim($tagArray, ", ") . "<br>";
    }
    echo "<br>";
    echo "<p>" . $post->getText() . "</p>";
    echo "<hr>";
    echo "<strong>Comments:</strong><br>";
    if ($comments) {
        foreach ($comments as $comment) {
            if ($comment->getAuthorEmail()) {
                echo "<a href='mailto:" . $comment->getAuthorEmail() . "'>";
            }
            echo $comment->getAuthorName();
            if ($comment->getAuthorEmail()) {
                echo "</a>";
            }
            if ($comment->getAuthorUrl()) {
                echo " / <a href='http://" . $comment->getAuthorUrl() . "' target='_blank'>" . $comment->getAuthorUrl() . "</a>";
            }
            echo " wrotes:<br>";
            echo "<blockquote>" . $comment->getComment() . "</blockquote>";
        }
    }
}
