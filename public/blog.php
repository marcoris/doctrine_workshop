<?php

$em = getEntityManager();
$post = $em->getRepository(\App\Entities\Post::class)->find(1);

// Check if there is a post
if (!$post) {
    echo '<h2 class="display-4">404!</h2><p>' . _("Unfortunately, no posts were found.") . '</p>';
} else {
    $categories = $post->getCategories();
    $tags = $post->getTags();
    $comments = $post->getComments();

    echo '<h2 class="display-4">' . $post->getTitle() . '</h2>
      <small>' . $post->getCreatedAt()->format("d. F Y") . " " . _("by") . " " . $post->getAuthor() . '</small><br>';
        // List categories
        if ($categories) {
            echo "<strong>" . _("Categories: ") . "</strong><br>";
            $catArray = "";
            foreach ($categories as $category) {
                if ($category) {
                    $catArray .= '<span class="badge bg-info">' . $category->getName() . '</span> ';
                }
            }
            echo $catArray . "<br>";
        }

        // List tags
        if ($tags) {
            echo "<strong>" . _("Tags: ") . "</strong><br>";
            $tagArray = "";
            foreach ($tags as $tag) {
                if ($tag) {
                    $tagArray .= "<span class='badge bg-light text-dark'>" . $tag->getName() . "</span> ";
                }
            }
            echo $tagArray . "<br>";
        }
    echo "<br>";
    echo '<p class="fw-light text-justify">' . $post->getTextExcerpt() . "</p>";
    echo '<hr class="mb-5" style="border: 1px solid silver"/>';
    echo "<strong>" . _("Comments:") . "</strong><br>";
    if ($comments) {
        foreach ($comments as $comment) {
            if ($comment->getStatus() >= 2) {
                echo "<small>";
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
                echo " " . _("wrote at") . " " . $comment->getCreatedAt()->format("d. F Y") . ":</small><br>";
                echo "<small>" . $comment->getComment() . '</small><hr style="border: 1px dashed silver;" />';
            }
        }
    }
    echo '</div>
  </div>';
}
