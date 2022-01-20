<?php

$post = getEntityManager()->getRepository(\App\Entities\Post::class)->find(1);

// Check if there is a post
if (!$post) {
    echo '<h2 class="display-4">404!</h2><p>' . _("Unfortunately, no post were found.") . '</p>';
} else {
    $categories = $post->getCategories();
    $tags = $post->getTags();
    $comments = $post->getComments();

    echo '<img class="img-fluid mb-5" src="https://placeimg.com/600/600/any">
        <h2 class="display-4">' . $post->getTitle() . '</h2><small>' . $post->getCreatedAt()->format("d. F Y") . " " . _("by") . " <a class='link-info' href='/author/" . $post->getAuthor()->getId() . "'>" . $post->getAuthor()->getName() . "</a>";
    if ($post->getAuthor()->getEmail()) {
        echo " / <a href='mailto:" . $post->getAuthor()->getEmail() . "'><i class='bi bi-envelope'></i></a>";
    }
    if ($post->getAuthor()->getUrl()) {
        echo " / <a class='link-danger' href='http://" . $post->getAuthor()->getUrl() . "' target='_blank'><i class='bi bi-globe'></i></a>";
    }
    echo '</small><br>';
        // List categories
        if ($categories) {
            echo "<strong>" . _("Categories: ") . "</strong><br>";
            $catArray = "";
            foreach ($categories as $category) {
                if ($category) {
                    $color = "";
                    switch ($category->getId()) {
                        case 2:
                            $color = "secondary";
                            break;
                        case 3:
                            $color = "success";
                            break;
                        case 4:
                            $color = "danger";
                            break;
                        case 5:
                            $color = "warning";
                            break;
                        default:
                            $color = "primary";
                            break;
                    }
                    $catArray .= '<span class="badge bg-' . $color . '">' . $category->getName() . '</span> ';
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
    echo '<p class="fw-light text-justify">' . $post->getText() . "</p>";
    echo '<hr class="mb-4" style="border: 1px solid silver"/>';
    echo "<strong>" . _("Comments:") . "</strong><br>";
    if ($comments) {
        foreach ($comments as $comment) {
            if ($comment->getStatus() >= 2) {
                echo "<small><em>";
                if ($comment->getEmail()) {
                    echo "<a href='mailto:" . $comment->getEmail() . "'>";
                }
                echo $comment->getName();
                if ($comment->getEmail()) {
                    echo "</a>";
                }
                if ($comment->getUrl()) {
                    echo " / <a href='http://" . $comment->getUrl() . "' target='_blank'>" . $comment->getUrl() . "</a>";
                }
                echo " " . _("wrote at") . " " . $comment->getCreatedAt()->format("d. F Y") . ":</small><br>";
                echo "<blockquote><small>" . $comment->getComment() . '</small></blockquote></em><hr style="border: 1px dashed silver;" />';
            } else {
                echo "<em class='text-muted'>";
                if ($comment->getEmail()) {
                    echo "<a href='mailto:" . $comment->getEmail() . "'>";
                }
                echo $comment->getName();
                if ($comment->getEmail()) {
                    echo "</a>";
                }
                if ($comment->getUrl()) {
                    echo " / <a href='http://" . $comment->getUrl() . "' target='_blank'>" . $comment->getUrl() . "</a>";
                }
                echo " " . _("wrote at") . " " . $comment->getCreatedAt()->format("d. F Y") . ":<br>";
                echo $comment->getComment() . '</em><hr style="border: 1px dashed silver;" />';
            }
        }
    }
    echo '</div>
  </div>';
}
