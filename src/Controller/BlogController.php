<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{   
    private const POSTS =[
        [
            'id' => 1,
            'slug' => 'hello-world',
            'title' => 'hello world'
        ],
        [
            'id' => 2,
            'slug' => 'another-post',
            'title' => 'another world'
        ],
        [
            'id' => 3,
            'slug' => 'last-world',
            'title' => 'this is hello world'
        ]
        ];
    /**
     * @Route("/{page}", name="blog_list")
     */
    public function list($page = 1)
    {
      return new JsonResponse(
          [
              'page' => $page,
              'data' => self::POSTS
          ]

      );
    }
    /**
     * @Route("/{id}", name="blog_by_id")
     */
    public function post($id)
    {
        return new JsonResponse(
            self::POSTS[array_search($id, array_column(self::POSTS, 'id'))]
        );
    }
    /**
     * @Route("/{slug}", name="blog_by_slug")
     */
    public function postBySlug($slug)
    {
        return new JsonResponse(
            self::POSTS[array_search($slug, array_column(self::POSTS, 'slug'))]
        );
    }
}

