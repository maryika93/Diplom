<?php
require_once 'connectDB.php';

function selectCat()
{
    $db = db();
    $cat  = $db->query('SELECT * FROM categories')->fetchAll();
    return $cat;
}

function selectIDCat()
{
    $db = db();
    $categ = $_GET['category'];
    $idcat = $db->query("SELECT id FROM categories WHERE category = '$categ'")->fetchAll();
    return $idcat;
}

function insertCat($newcategory)
{
    $db = db();
    $newcat = $db->prepare('INSERT INTO `categories`(`category`) VALUES (:cat)');
    $newcat->bindParam(':cat', $newcategory);
    $newcat->execute();
    return $newcat;
}

function deleteCat($delcat)
{
    $db = db();
    $catdel = $db->prepare('DELETE FROM `categories` WHERE category = :category');
    $catdel->bindParam(':category', $delcat);
    $catdel->execute();
    return $catdel;
}
?>