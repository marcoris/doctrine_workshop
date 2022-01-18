<?php

$em = getEntityManager();
$posts = $em->getRepository(\App\Entities\Post::class)->findBy([],['id' => 'DESC']);

// Check if there is a post
if (!$posts) {
    echo '<h2 class="display-4">404!</h2><p>' . _("Unfortunately, no posts were found.") . '</p>';
} else {
    echo "<div class='row'>
    <div class='col-8'>";
    foreach ($posts as $post) {
        echo '<h2 class="display-4">' . $post->getTitle() . '</h2>
          <small>' . $post->getCreatedAt()->format("d. F Y") . " " . _("by") . " " . $post->getAuthor() . '</small><br>';
        echo "<br>";
        echo '<p class="fw-light text-justify">' . $post->getTextExcerpt() . "</p>";

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
        echo "<hr>";
    }
    echo '</div>
    <div class="col-4 bg-light p-2">
        <h3 class="display-6 text-center">' . _('Archive') . '</h3>
        <ul>
            <li><a href="#">Januar 2022</a></li>
        </ul>
    </div>
</div>';
}
