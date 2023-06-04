<?php

namespace Controller;

use Entities\Post;
use Libraries\Notification;
use Exceptions\EntityNotFoundException;

class PageController extends Controller
{
	/**
	 *
	 * @return string
	 */
	public function index(): string
	{
		return $this->render('add_post');
	}

	/**
	 * Add post
	 *
	 * @return void
	 */
	public function addPost() : void
	{
        $title = $_POST['title'];
        $content = $_POST['postDetail'];
		$post = new Post();
		$post->setTitle($title);
		$post->setBody($content);
		$this->ci->get('db')->persist($post);
		$this->ci->get('db')->flush();

		$notification = new Notification();
		$notification->sendData($post->getTitle(), $post->getBody());

        header('Location: /post/' . $post->getId());
	}

	/**
	 * Shows post by ID
	 *
	 * @param integer $id ID of the requested post
	 * @return string generated HTML output
	 */
	public function showPost(int $id): string
	{
		$post = $this->ci->get('db')->getRepository(Post::class)->find($id);
		if($post === null)
		{
            throw new EntityNotFoundException();
		}
		return $this->render('post_detail', [
            'postInfo' => $post
		]);
	}
}

