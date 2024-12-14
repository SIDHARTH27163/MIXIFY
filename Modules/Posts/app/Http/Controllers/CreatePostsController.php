<?php

namespace Modules\Posts\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Posts\Models\Post;
use Illuminate\Support\Facades\Auth;

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
            $data = $request->only(['title', 'caption', 'tags', 'location', 'media']);
            
            // Ensure the tags are separated by commas
            if (!empty($data['tags'])) {
                // Clean and normalize tags input
                $tags = explode(',', $data['tags']); // Split by commas
                $tags = array_map('trim', $tags); // Trim whitespace around each tag
                $tags = array_filter($tags); // Remove empty values
                $data['tags'] = implode(', ', $tags); // Rejoin into a comma-separated string
            }
            
            // Add the authenticated user's ID
            $data['user_id'] = auth()->id();
    
            // Handle media uploads
            if ($request->file('media')) {
                $data['media'] = array_map(
                    fn($media) => $media->store('uploads/posts', 'public'),
                    $request->file('media')
                );
            }
    
            // Save the post to the database
            Post::create($data);
    
            return redirect()->route('posts.index')->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Post Creation Error', ['error' => $e->getMessage()]);
            // Redirect back with an error message
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
                // Find the post or fail if not found
                $post = Post::findOrFail($id);

                // Extract fields from the request
                $data = $request->only(['title', 'caption', 'tags', 'location', 'media']);

                // Normalize tags to ensure they are comma-separated
                if (!empty($data['tags'])) {
                    $tags = explode(',', $data['tags']); // Split by commas
                    $tags = array_map('trim', $tags); // Trim whitespace around each tag
                    $tags = array_filter($tags); // Remove empty values
                    $data['tags'] = implode(', ', $tags); // Rejoin into a comma-separated string
                }

                // Handle media uploads if provided
                if ($request->file('media')) {
                    $data['media'] = array_map(
                        fn($media) => $media->store('uploads/posts', 'public'),
                        $request->file('media')
                    );
                }

                // Update the post in the database
                $post->update($data);

                return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
            } catch (\Exception $e) {
                // Log the error for debugging
                \Log::error('Post Update Error', ['error' => $e->getMessage()]);
                // Redirect back with an error message
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
