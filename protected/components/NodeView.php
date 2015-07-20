<?php

abstract class NodeView
{
	private $id;
	private $title;
	private $content;
	private $excerpt;
	private $author;
	private $publicationDate;
	private $status;
	private $visibility;

	public function __construct(
		$id,
		$title,
		$content,
		$excerpt,
		$author,
		$publicationDate,
		$status,
		$visibility
		)
	{
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->excerpt = $excerpt;
		$this->author = $author;
		$this->publicationDate = $publicationDate;
		$this->status = $status;
		$this->visibility = $visibility;
	}

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		$this->title;
	}

	public function getContent() {
		$this->content;
	}

	public function getExcerpt() {
		$this->excerpt;
	}

	public function getAuthor() {
		$this->author;
	}

	public function getPublicationDate() {
		return $this->publicationDate;
	}

	public function getStatus() {
		return $this->status;
	}

	public function getVisibility() {
		return $this->visibility;
	}
}