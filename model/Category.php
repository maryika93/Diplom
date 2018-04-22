<?php

function selectCategories()
{
    $db = db();
    $cat  = $db->query('SELECT id, category FROM categories')->fetchAll();
    return $cat;
}

function selectIDCategory($categ)
{
    $db = db();
    $idcat = $db->prepare("SELECT id FROM categories WHERE category = :category");
    $idcat->bindParam(':category', $categ);
    $idcat->execute();
    return $idcat;
}

function insertCategory($newcategory)
{
    $db = db();
    $newcat = $db->prepare('INSERT INTO `categories`(`category`) VALUES (:cat)');
    $newcat->bindParam(':cat', $newcategory);
    $newcat->execute();
    return $newcat;
}

function deleteCategory($delcat)
{
    $db = db();
    $catdel = $db->prepare('DELETE FROM `categories` WHERE category = :category');
    $catdel->bindParam(':category', $delcat);
    $catdel->execute();
    return $catdel;
}
?>