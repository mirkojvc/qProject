<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthorIndexRequest;
use App\Providers\Services\AuthorService;

class AuthorController extends Controller {
    public static function index(AuthorIndexRequest $request) {
        $query = $request->query('query', '');
        $orderBy = $request->query('orderBy', 'id');
        $direction = $request->query('direction', 'ASC');
        $limit = $request->query('limit', 12);
        $page = $request->query('page', 1);
        $data = AuthorService::getAuthors($query, $orderBy, $direction, $limit, $page);
        $total_pages = $data['total_pages'];
        $current_page = $data['current_page'];
        $authors = $data['authors'];
        return view('authors', ['authors' => $authors, 'total_pages' => $total_pages, 'current_page' => $current_page]);
    }

    public static function show($id) {
        $author = AuthorService::getAuthor($id);
        return view('author', ['author' => $author]);
    }

    public static function destroy($id) {
        AuthorService::deleteAuthor($id);
        return redirect()->route('authors');
    }
}