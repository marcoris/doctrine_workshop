<?php

$authors = getEntityManager()->getRepository(\App\Entities\Author::class)->findAll();

// Check if there is an author
if (!$authors) {
    echo '<h2 class="display-4">404!</h2><p>' . _("Unfortunately, no author were found.") . '</p>';
} else {
    echo '<h1 class="display-1">' . _('Our Authors') . '</h1>';
    echo "<ul>";
    foreach ($authors as $author) {
        echo "<li><a class='link-info' href='/author/" . $author->getId() . "'>" . $author->getName() . "</a>";
        echo $author->getEmail() ? " / <a href='mailto:" . $author->getEmail() . "'>" . $author->getEmail() . "</a>" : '';
        echo $author->getUrl() ? " / <a class='link-danger' href='" . $author->getUrl() . "' target='_blank'>" . $author->getUrl() . "</a>" : '';
        echo "</li>";
    }
    echo "</ul>";
}
