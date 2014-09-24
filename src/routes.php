<?php

// Main default listing e.g. http://domain.com/blog
Route::get(Config::get('laravel-blog::routes.base_uri'), 'Mandofever78\LaravelBlog\PostsController@index');

// Archive (year / month) filtered listing e.g. http://domain.com/blog/yyyy/mm
Route::get(Config::get('laravel-blog::routes.base_uri').'/{year}/{month}', 'Mandofever78\LaravelBlog\PostsController@indexByYearMonth')->where(array('year' => '\d{4}', 'month' => '\d{2}'));

if (Config::get('laravel-blog::routes.relationship_uri_prefix'))
{
	// Relationship filtered listing, e.g. by category or tag, e.g. http://domain.com/blog/category/my-category
	Route::get(Config::get('laravel-blog::routes.base_uri').'/'.Config::get('laravel-blog::routes.relationship_uri_prefix').'/{relationshipIdentifier}', 'Mandofever78\LaravelBlog\PostsController@indexByRelationship');
}

// Blog post detail page e.g. http://domain.com/blog/my-post
Route::get(Config::get('laravel-blog::routes.base_uri').'/{slug}', 'Mandofever78\LaravelBlog\PostsController@view');

// RSS feed URL e.g. http://domain.com/blog.rss
Route::get(Config::get('laravel-blog::routes.base_uri').'.rss', 'Mandofever78\LaravelBlog\PostsController@rss');
