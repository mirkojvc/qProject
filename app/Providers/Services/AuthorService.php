<?php
namespace App\Providers\Services;

use App\Models\Author;
use Illuminate\Support\Facades\Http;

class AuthorService {

    public static function create($first_name, $last_name, $birthday, $gender, $place_of_birth ) {
        $author = Author::create($first_name, $last_name, $birthday, $gender, $place_of_birth);
    }

    public static function getAuthors(string $query = '', string $orderBy = 'id', string $direction = 'ASC', int $limit = 12, int $page = 1) {
        try{
            $authors = Author::all($query, $orderBy, $direction, $limit, $page);
            return $authors;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public static function getAuthor(int $id) {
        try {
            $author = Author::getAuthor($id);
            return $author;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public static function deleteAuthor(int $id) {
        try {
            $author = self::getAuthor($id);
            if($author->books->count() > 0) {
                throw new \Exception('Cannot delete author with books');
            }

            Author::delete($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}