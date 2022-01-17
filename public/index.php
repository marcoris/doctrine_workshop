<?php

require_once "bootstrap.php";

$em = getEntityManager();

//$category = new \App\Entities\Category();
//$category->setName("Category 1");
//
//$em->persist($category);
//$em->flush();

$category = $em->getRepository(\App\Entities\Category::class)->find(1);
echo $category->getName();


