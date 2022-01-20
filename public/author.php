<?php

$author = getEntityManager()->getRepository(\App\Entities\Author::class)->find(2);

// Check if there is an author
if (!$author) {
    echo '<h2 class="display-4">404!</h2><p>' . _("Unfortunately, no author were found.") . '</p>';
} else {
    echo '<h1 class="display-1">' . _('Author') . '</h1>';
    echo '<h2 class="display-4">' . $author->getName() . '</h2>';
    echo '<div class="card">
      <img class="card-img-top" src="https://placeimg.com/300/300/people" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">' . _('Age') . ': ' . $author->getAge() . '</p>
        <p class="card-text">' . _('Email') . ': ' . $author->getEmail() . '</p>
        <p class="card-text">' . _('Url') . ': ' . $author->getUrl() . '</p>
        <p class="card-text">' . _('Bio') . ': ' . $author->getBio() . '</p>
      </div>
    </div>';
}
