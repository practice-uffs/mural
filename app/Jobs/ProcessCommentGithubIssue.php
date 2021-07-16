<?php

namespace App\Jobs;

use App\Model\Comment;
use App\Services\Github;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCommentGithubIssue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Comment $comment;
    public string $githubIssueLink;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, string $githubIssueLink)
    {
        $this->comment = $comment;
        $this->githubIssueLink = $githubIssueLink;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Github $github)
    {
        if (empty($this->githubIssueLink)) {
            return;
        }

        $issue = $this->getGithubIssueInfo($this->githubIssueLink);
        $url = route('order.show', ['order' => $this->comment->commentable]);

        $content = 
                '> ***' . $this->comment->user->name . "*** comentou o seguinte no [mural]($url):\n\n" .
                $this->comment->content;

        $github->commentIssue($issue['org'], $issue['repo'], $issue['number'], $content);
    }

    private function getGithubIssueInfo($url)
    {
        $url = parse_url($url);
        $path = explode('/', $url['path']);

        $issueNumber = $path[count($path) - 1];
        $repository = $path[count($path) - 3];
        $organization = $path[count($path) - 4];

        return [
            'org' => $organization,
            'repo' => $repository,
            'number' => $issueNumber,
        ];
    }
}
