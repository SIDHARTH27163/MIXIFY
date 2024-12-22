<?php

namespace Modules\Posts\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Posts\Models\Post;
use Illuminate\Support\Facades\Auth;
use Cloudinary\Cloudinary;


class CreatePostsController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts::index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('posts::create.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        try {
            // Extract fields from the request
            $data = $request->only(['title', 'caption', 'tags', 'location']);
            
            // Normalize tags
            if (!empty($data['tags'])) {
                $tags = explode(',', $data['tags']);
                $tags = array_map('trim', $tags);
                $tags = array_filter($tags);
                $data['tags'] = implode(', ', $tags);
            }

            // Add the authenticated user's ID
            $data['user_id'] = auth()->id();

            // Handle media uploads using Cloudinary
            if ($request->file('media')) {
                $cloudinary = new Cloudinary(config('services.cloudinary.url'));
                $uploadedMedia = [];

                foreach ($request->file('media') as $media) {
                    $uploadResult = $cloudinary->uploadApi()->upload($media->getPathName(), [
                        'folder' => 'posts/' . auth()->id(), // Organize by user ID
                    ]);
                    $encodedUrl = base64_encode($uploadResult['secure_url']); // Encode the URL
                    $uploadedMedia[] = $encodedUrl;
                }

                $data['media'] = json_encode($uploadedMedia); // Store as JSON in the database
            }

            // Save the post to the database
            Post::create($data);

            return redirect()->route('posts.index')->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            \Log::error('Post Creation Error', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to create post. Please try again.');
        }
    }



    /**
     * Display the specified post.
     */
    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts::create.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts::create.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);

            // Extract fields from the request
            $data = $request->only(['title', 'caption', 'tags', 'location']);

            // Normalize tags
            if (!empty($data['tags'])) {
                $tags = explode(',', $data['tags']);
                $tags = array_map('trim', $tags);
                $tags = array_filter($tags);
                $data['tags'] = implode(', ', $tags);
            }

            // Handle media uploads using Cloudinary
            if ($request->file('media')) {
                $cloudinary = new Cloudinary(config('services.cloudinary.url'));
                $uploadedMedia = [];

                foreach ($request->file('media') as $media) {
                    $uploadResult = $cloudinary->uploadApi()->upload($media->getPathName(), [
                        'folder' => 'posts/' . auth()->id(),
                    ]);
                    $encodedUrl = base64_encode($uploadResult['secure_url']); // Encode the URL
                    $uploadedMedia[] = $encodedUrl;
                }

                $data['media'] = json_encode($uploadedMedia); // Update media in the database
            }

            // Update the post in the database
            $post->update($data);

            return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Post Update Error', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to update the post. Please try again.');
        }
    }


    /**
     * Remove the specified post from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Delete images from storage
        if ($post->images) {
            foreach ($post->images as $image) {
                \Storage::disk('public')->delete($image);
            }
        }

        // Delete the post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
