<?php

$posts = getEntityManager()->getRepository(\App\Entities\Post::class)->findBy([],['id' => 'DESC']);

// Check if there is a post
if (!$posts) {
    echo '<h2 class="display-4">404!</h2><p>' . _("Unfortunately, no posts were found.") . '</p>';
} else {
    echo "<div class='row'>";
    foreach ($posts as $post) {
        echo '<div class="col-5 m-0 p-0">
                <a class="text-decoration-none" href="/blog/' . $post->getId() . '"><img class="img-fluid mb-5" src="https://placeimg.com/300/300/any"></a>
            </div>
            <div class="col-7"><h2 class="display-4 mt-0"><a class="text-decoration-none" href="/blog/' . $post->getId() . '">' . $post->getTitle() . '</a></h2><small>' . $post->getCreatedAt()->format("d. F Y") . " " . _("by") . " <a class='link-info' href='/author/" . $post->getAuthor()->getId() . "'>" . $post->getAuthor()->getName() . "</a>";
        if ($post->getAuthor()->getEmail()) {
            echo " / <a href='mailto:" . $post->getAuthor()->getEmail() . "'><i class='bi bi-envelope'></i></a>";
        }
        if ($post->getAuthor()->getUrl()) {
            echo " / <a class='link-danger' href='http://" . $post->getAuthor()->getUrl() . "' target='_blank'><i class='bi bi-globe'></i></a>";
        }
        echo '</small>';
        echo '<p class="fw-light text-justify">' . $post->getTextExcerpt(160) . "</p>";

        $categories = $post->getCategories();
        $tags = $post->getTags();

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
        echo "</div><hr>";
    }
    echo "</div>";
}
