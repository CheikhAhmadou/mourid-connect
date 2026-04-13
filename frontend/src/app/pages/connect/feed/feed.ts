import { Component, inject, signal, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ApiService } from '../../../core/services/api';
import { AuthService } from '../../../core/services/auth';
import { Post, UserProfile, Notification as AppNotification } from '../../../core/models/connect';

@Component({
  selector: 'app-feed',
  imports: [FormsModule, RouterLink, RouterLinkActive],
  templateUrl: './feed.html',
  styleUrl: './feed.scss',
})
export class Feed implements OnInit {
  private api  = inject(ApiService);
  auth         = inject(AuthService);

  posts         = signal<Post[]>([]);
  loading       = signal(true);
  posting       = signal(false);
  content       = '';
  images: File[] = [];
  openComments  = signal<number | null>(null);
  commentText   = signal<Record<number, string>>({});
  nearbyMembers = signal<UserProfile[]>([]);
  notifs        = signal<AppNotification[]>([]);

  ngOnInit() {
    this.api.getFeed().subscribe({
      next: res => { this.posts.set(res.data); this.loading.set(false); },
      error: ()  => this.loading.set(false),
    });
    this.api.getMembersMap().subscribe({
      next: res => this.nearbyMembers.set((res.data as unknown as UserProfile[]).slice(0, 4)),
      error: () => {},
    });
    if (this.auth.isLoggedIn()) {
      this.api.getNotifications().subscribe({
        next: res => this.notifs.set(res.data.slice(0, 4)),
        error: () => {},
      });
    }
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

  followMember(member: UserProfile) {
    if (!this.auth.isLoggedIn()) return;
    if (member.is_following) {
      this.api.unfollowUser(member.id).subscribe(() => {
        this.nearbyMembers.update(ms => ms.map(m => m.id === member.id ? { ...m, is_following: false } : m));
      });
    } else {
      this.api.followUser(member.id).subscribe(() => {
        this.nearbyMembers.update(ms => ms.map(m => m.id === member.id ? { ...m, is_following: true } : m));
      });
    }
  }

  markAllRead() {
    this.api.markAllRead().subscribe(() => {
      this.notifs.update(ns => ns.map(n => ({ ...n, is_read: true })));
    });
  }

  avatarGrad(id: number): string {
    const g = [
      'linear-gradient(135deg,#2D6A4F,#40916C)',
      'linear-gradient(135deg,#C9A84C,#E8C96A)',
      'linear-gradient(135deg,#6D28D9,#8B5CF6)',
      'linear-gradient(135deg,#0D9488,#14B8A6)',
      'linear-gradient(135deg,#DC2626,#EF4444)',
      'linear-gradient(135deg,#1D4ED8,#3B82F6)',
    ];
    return g[id % g.length];
  }

  initial(name: string): string {
    return name?.charAt(0)?.toUpperCase() ?? '?';
  }
}
