<div>
    <!--
        Comments list
        Source: https://tailwindcomponents.com/component/comment-section
    -->
    <div class="antialiased w-full">
        <h3 class="pb-3 mb-4 text-lg font-semibold text-gray-700 border-b-2 border-gray-100 inline-flex items-center w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block text-gray-300 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
            Comentários
        </h3>
        @forelse ($items as $comment)
            <div class="space-y-4">
                <div class="flex pb-4 comment-view" data-comment-id="{{ $comment['id'] }}">
                    <div class="mr-3">
                        <img class="rounded-full object-cover w-12 h-12 m-1" src="https://cc.uffs.edu.br/avatar/iduffs/{{ $comment['user']['uid'] }}" alt="" />
                    </div>
                    <div class="flex-1 relative border rounded-lg px-4 py-2 pb-3 sm:px-6 sm:py-4 leading-relaxed">
                        @admin
                            <span class="absolute right-2 top-0 text-gray-400 ml-3 text-xl">
                                @if ($comment['read'])
                                    <i class="bi bi-check-all text-green-400" title="Solicitante leu o comentário."></i>
                                @else
                                    <i class="bi bi-check" title="Solicitante não leu o comentário ainda."></i>
                                @endif
                            </span>
                        @endadmin
                        <div>
                            <strong>{{ Str::title($comment['user']['name']) }}</strong> 
                            <span class="text-xs text-gray-400 ml-3 mr-2">
                                <i class="bi bi-clock"></i> {{ $comment['created_at_human'] }}
                            </span>
                        </div>
                        <div class="text-md pt-2">{!! nl2br(Str::markdown($comment['content'])) !!}</div>
                        <div class="mt-4 flex items-center hidden">
                            <div class="flex -space-x-2 mr-2">
                                <img class="rounded-full w-6 h-6 border border-white"
                                    src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80"
                                    alt="">
                                <img class="rounded-full w-6 h-6 border border-white"
                                    src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80"
                                    alt="">
                            </div>
                            <div class="text-sm text-gray-500 font-semibold">
                                5 Replies
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Nenhum comentário por enquanto</p>
        @endforelse
    </div>

    <div class="w-full pt-2 mb-1">
        {{ $items->links() }}
    </div>

    <div class="w-full pt-4 mb-6">
        <hr class="text-gray-400" />
    </div>

    <!--
        Comment form
        Source: https://tailwindcomponents.com/component/comment-form
    -->
    <div class="antialiased w-full">
        <div class="space-y-4">
            <div class="flex">
                <div class="flex-shrink-0 mr-1">
                    <div class="mt-2">
                        <img class="rounded-full object-cover w-14 h-14" src="https://cc.uffs.edu.br/avatar/iduffs/{{ auth()->user()->uid }}" alt="" />
                    </div>
                </div>
                <div class="flex-1 rounded-lg px-1 py-0 sm:px-6 sm:py-4 leading-relaxed">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-full px-3 mb-2 mt-2">
                            <div class="form-control pb-3">
                                <label class="label">
                                  <span class="label-text">Comentar</span>
                                </label> 
                                <textarea wire:model="content" name="content" class="textarea h-32 textarea-bordered @error('content') textarea-error @enderror" placeholder="Escreva seu comentário"></textarea>
                            </div>
                        </div>
                        <div class="w-full md:w-full flex items-start md:w-full px-3">
                            <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                <p class="text-xs md:text-sm pt-px text-gray-400">
                                    <i class="bi bi-info-circle"></i>
                                    Você pode usar <a href="https://docs.github.com/pt/github/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax" target="_blank" class="underline">markdown</a> para formatação.
                                </p>
                            </div>
                            <div class="-mr-1">
                                <button wire:click="store()" class="btn btn-primary">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var wire = null;

        var readUntilCommentId = @json($commentable->read_until_comment_id);
        var commentableUserId = @json($commentable->user->id);
        var userId = @json(auth()->id());

        var options = {
            root: null,
            rootMargin: '0px',
            threshold: 1.0
        }
          
        var observer = new IntersectionObserver(function(entries) { 
            entries.forEach(function(entry) {
                var commentId = entry.target.getAttribute('data-comment-id');
                var alreadyChecked = entry.target.classList.contains('comment-read');

                if (readUntilCommentId >= commentId || alreadyChecked) {
                    return;
                }

                entry.target.classList.add('comment-read');
                wire.markAsRead(commentId);
            });
            
        }, options);

        var comments = document.querySelectorAll(".comment-view");

        if (comments.length > 0 && commentableUserId == userId) {
            comments.forEach(function(comment) {
                observer.observe(comment);
            });
        }
        
        document.addEventListener('livewire:load', function () {
            wire = @this;
        });

    </script>
</div>