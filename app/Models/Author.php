<?php

namespace App\Models;

use App\Providers\Services\ApiService;

class Author {
    public $id;
    public $first_name;
    public $last_name;
    public $birthday;
    public $gender;
    public $place_of_birth;
    public $books;

    /**
     * Constructor to initialize the Author model with data.
     */
    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->first_name = $data['first_name'] ?? null;
        $this->last_name = $data['last_name'] ?? null;
        $this->birthday = $data['birthday'] ?? null;
        $this->gender = $data['gender'] ?? null;
        $this->place_of_birth = $data['place_of_birth'] ?? null;
        $this->books = isset($data['books']) ? collect($data['books'])->map(function ($bookData) {
            return new Book($bookData);
        }) : collect();
    }

    /**
     * Static method to retrieve all authors.
     */
    public static function all($query = '', $orderBy = 'id', $direction = 'ASC', $limit = 12, $page = 1) {
        try {
            $url = config('api.base_uri') . config('api.authors.all');;

            $authors = ApiService::sendAuthorizedRequest($url, [
                'query' => $query,
                'orderBy' => $orderBy,
                'direction' => $direction,
                'limit' => $limit,
                'page' => $page,
            ]);
            $total_pages = $authors['total_pages'];
            $current_page = $authors['current_page'];
            $authors_collection = collect($authors['items'])->map(function ($author) {
                return new self($author);
            });

            return [
                'authors' => $authors_collection,
                'total_pages' => $total_pages,
                'current_page' => $current_page,
            ];

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public static function getAuthor(int $id) {
        try {
            $url = config('api.base_uri') . config('api.authors.one') . $id;
            $author = ApiService::sendAuthorizedRequest($url);
            return new self($author);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public static function delete(int $id) {
        try {
            $url = config('api.base_uri') . config('api.authors.delete') . $id;
            ApiService::sendAuthorizedRequest($url, [], 'delete');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public static function create($data) {
        try {
            $url = config('api.base_uri') . config('api.authors.create');
            $author = ApiService::sendAuthorizedRequest($url, $data, 'post');
            return new self($author);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}


