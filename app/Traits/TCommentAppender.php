<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait TCommentAppender
{
    /**
     * Append a dated, user-tagged comment to a given comment field.
     *
     * @param string $fieldName  The column name (e.g., 'l1_comments')
     * @param string $commentText The comment text only
     * @return void
     */
    public function appendComment(string $fieldName, string $commentText): void
    {
        // Get current date
        $date = Carbon::now()->format('Y-m-d');

        // Get logged-in user's name (fallback to 'System' if no user)
        $userName = Auth::check() ? Auth::user()->name : 'System';

        // Build the full comment string
        $fullComment = "{$date} : {$userName} : {$commentText}";

        // Append or set fresh
        if (empty($this->{$fieldName})) {
            $this->{$fieldName} = $fullComment;
        } else {
            $this->{$fieldName} .= "\n" . $fullComment;
        }

        // Save the model
        //$this->save();
    }
}
