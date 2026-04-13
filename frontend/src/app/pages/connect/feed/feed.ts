import { Component, inject, signal, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { ApiService } from '../../../core/services/api';
import { AuthService } from '../../../core/services/auth';
import { Post } from '../../../core/models/connect';

@Component({
  selector: 'app-feed',
  imports: [FormsModule, RouterLink],
  templateUrl: './feed.html',
  styleUrl: './feed.scss',
})
export class Feed implements OnInit {
  private api  = inject(ApiService);
  auth         = inject(AuthService);

  posts        = signal<Post[]>([]);
  loading      = signal(true);
  posting      = signal(false);
  content      = '';
  images: File[] = [];
  openComments = signal<number | null>(null);
  commentText  = signal<Record<number, string>>({});

  ngOnInit() {
    this.api.getFeed().subscribe({
      next: res => { this.posts.set(res.data); this.loading.set(false); },
      error: ()  => this.loading.set(false),
    });
  }

  onImages(e: Event) {
    const input = e.target as HTMLInputElement;
    if (input.files) this.images = Array.from(input.files).slice(0, 5);
  }

  publish() {
    if (!this.content.trim() && this.images.length === 0) return;
    this.posting.set(true);
    const form = new FormData();
    form.append('content', this.content);
    this.images.forEach(f => form.append('images[]', f));

    this.api.createPost(form).subscribe({
      next: res => {
        this.posts.update(p => [res.data, ...p]);
        this.content = '';
        this.images  = [];
        this.posting.set(false);
      },
      error: () => this.posting.set(false),
    });
  }

  like(post: Post) {
    this.api.likePost(post.id).subscribe(res => {
      this.posts.update(ps => ps.map(p =>
        p.id === post.id ? { ...p, is_liked: res.liked, likes_count: res.likes_count } : p
      ));
    });
  }

  toggleComments(postId: number) {
    this.openComments.update(id => id === postId ? null : postId);
  }

  setComment(postId: number, value: string) {
    this.commentText.update(m => ({ ...m, [postId]: value }));
  }

  sendComment(post: Post) {
    const text = this.commentText()[post.id]?.trim();
    if (!text) return;
    this.api.addComment(post.id, text).subscribe(res => {
      this.posts.update(ps => ps.map(p =>
        p.id === post.id
          ? { ...p, comments: [res.data, ...(p.comments ?? [])], comments_count: p.comments_count + 1 }
          : p
      ));
      this.commentText.update(m => ({ ...m, [post.id]: '' }));
    });
  }

  avatar(url: string) {
    return url?.startsWith('http') ? url : '/assets/avatar.png';
  }
}
