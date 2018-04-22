<?php

function selectCategories()
{
    $db = db();
    $categories  = $db->query('SELECT id, name FROM categories')->fetchAll();
    return $categories;
}

function selectIDCategory($categ)
{
    $db = db();
    $idcategory = $db->prepare("SELECT id FROM categories WHERE name = :category");
    $idcategory->bindParam(':category', $categ);
    $idcategory->execute();
    return $idcategory;
}

function insertCategory($newcategory)
{
    $db = db();
    $newCategory = $db->prepare('INSERT INTO `categories`(`name`) VALUES (:category)');
    $newCategory->bindParam(':category', $newcategory);
    $newCategory->execute();
    return $newCategory;
}

function deleteCategory($delcat)
{
    $db = db();
    $categorydelete = $db->prepare('DELETE FROM `categories` WHERE name = :category');
    $categorydelete->bindParam(':category', $delcat);
    $categorydelete->execute();
    return $categorydelete;
}
?>