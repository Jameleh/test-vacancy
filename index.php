<?php

require 'JsonPlaceholderApiClient.php';

$apiClient = new JsonPlaceholderApiClient();

// Get a list of users
$users = $apiClient->getUsers();
print_r($users);

// Get posts for a specific user (e.g., user with ID 1)
$userPosts = $apiClient->getUserPosts(1);
print_r($userPosts);

// Get tasks for a specific user (e.g., user with ID 1)
$userTasks = $apiClient->getUserTasks(1);
print_r($userTasks);

// Get a specific post (e.g., post with ID 1)
$post = $apiClient->getPost(1);
print_r($post);

// Add a new post
$newPostData = [
    'userId' => 1,
    'title' => 'New Post Title',
    'body' => 'New Post Body',
];
$newPost = $apiClient->addPost($newPostData);
print_r($newPost);

// Edit an existing post (e.g., post with ID 1)
$editedPostData = [
    'title' => 'Edited Post Title',
    'body' => 'Edited Post Body',
];
$editedPost = $apiClient->editPost(1, $editedPostData);
print_r($editedPost);

// Delete a post (e.g., post with ID 1)
$apiClient->deletePost(1);
