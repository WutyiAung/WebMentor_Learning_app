<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        // Validate the request
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Create a new comment
        $comment = $blog->comments()->create([
            'user_id' => auth()->id(), // Assuming users are authenticated
            'comment' => $request->comment,
        ]);

        // Return the newly created comment as JSON
        return redirect()->back()->with('status', 'Comment added successfully!');
    }

    public function storeCourse(Request $request, Course $course)
    {
        // Validate the request
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Create a new comment
        $comment = $course->comments()->create([
            'user_id' => auth()->id(), // Assuming users are authenticated
            'comment' => $request->comment,
        ]);

        // Return the newly created comment as JSON
        return redirect()->back()->with('status', 'Comment added successfully!');
    }
    
    public function edit(Comment $comment)
    {
        // Ensure the user is authorized to edit the comment
        if (Auth::user()->id !== $comment->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        return view('comments.edit', compact('comment'));
    }

    // Update the specified comment in storage
    public function update(Request $request, Comment $comment)
    {
        // Ensure the user is authorized to update the comment
        if (Auth::user()->id !== $comment->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('status', 'Comment updated successfully!');
    }

    // Remove the specified comment from storage
    public function destroy(Comment $comment)
    {
        // Ensure the user is authorized to delete the comment
        if (Auth::user()->id !== $comment->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        $blogId = $comment->blog_id;
        $comment->delete();

        return redirect()->back()->with('status', 'Comment deleted successfully!');
    }
    
    public function react(Request $request, $commentId)
    {
        $request->validate([
            'reaction' => 'required|string|in:heart', // Example validation for specific reactions
        ]);
    
        $comment = Comment::findOrFail($commentId);
    
        // Remove existing reaction if it's the same as the new one
        $existingReaction = Reaction::where('user_id', auth()->id())
            ->where('comment_id', $commentId)
            ->first();
    
        if ($existingReaction && $existingReaction->reaction === $request->reaction) {
            $existingReaction->delete();
        } else {
            Reaction::updateOrCreate(
                ['user_id' => auth()->id(), 'comment_id' => $commentId],
                ['reaction' => $request->reaction]
            );
        }
    
        return back()->with('status', 'Reaction recorded successfully!');
    }

   public function storeReply(Request $request, $commentId)
    {
        $request->validate([
            'reply' => 'required|string|max:500',
        ]);

        $comment = Comment::findOrFail($commentId);

        $reply = new Comment;
        $reply->comment = $request->input('reply');
        $reply->user_id = Auth::id();
        $reply->parent_id = $comment->id;
        $reply->blog_id = $comment->blog_id; // Make sure this is correct
        $reply->save();

        return redirect()->route('blog.show', $comment->blog_id)
            ->with('status', 'Reply added successfully!');
    }

    
    public function destroyReply(Comment $reply)
    {
        if (Auth::user()->id !== $reply->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        $reply->delete();

        return redirect()->back()->with('status', 'Reply deleted successfully!');
    }
}
