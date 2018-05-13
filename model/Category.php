<?php

class Category
{
    public function selectCategories()
    {
        $db = db();
        $categories  = $db->query('SELECT id, name FROM categories')->fetchAll();
        return $categories;
    }

    public function insertCategory($newcategory)
    {
        $db = db();
        $newCategory = $db->prepare('INSERT INTO `categories`(`name`) VALUES (:category)');
        $newCategory->bindParam(':category', $newcategory);
        $newCategory->execute();
        return $newCategory;
    }

    public function deleteCategory($delcat)
    {
        $db = db();
        $categorydelete = $db->prepare('DELETE FROM `categories` WHERE id = :category');
        $categorydelete->bindParam(':category', $delcat);
        $categorydelete->execute();
        return $categorydelete;
    }
}

?>