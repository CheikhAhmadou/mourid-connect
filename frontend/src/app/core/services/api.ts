import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Category } from '../models/category';
import { Shop, PaginatedShops } from '../models/shop';
import { Product, PaginatedProducts } from '../models/product';
import { Post, Group, ConnectEvent, UserProfile, Notification as AppNotification, Paginated, Comment } from '../models/connect';

const API = 'https://mourid-connect-production.up.railway.app/api';

@Injectable({ providedIn: 'root' })
export class ApiService {
  private http = inject(HttpClient);

  // ── Categories
  getCategories(): Observable<{ data: Category[] }> {
    return this.http.get<{ data: Category[] }>(`${API}/categories`);
  }

  // ── Shops
  getShops(page = 1): Observable<PaginatedShops> {
    const params = new HttpParams().set('page', page);
    return this.http.get<PaginatedShops>(`${API}/shops`, { params });
  }

  getShop(slug: string): Observable<{ data: Shop }> {
    return this.http.get<{ data: Shop }>(`${API}/shops/${slug}`);
  }

  // ── Products
  getProducts(filters: {
    page?: number;
    per_page?: number;
    search?: string;
    category?: number;
    parent_category?: number;
    shop?: number;
    featured?: boolean;
  } = {}): Observable<PaginatedProducts> {
    let params = new HttpParams();
    if (filters.page)            params = params.set('page', filters.page);
    if (filters.per_page)        params = params.set('per_page', filters.per_page);
    if (filters.search)          params = params.set('search', filters.search);
    if (filters.category)        params = params.set('category', filters.category);
    if (filters.parent_category) params = params.set('parent_category', filters.parent_category);
    if (filters.shop)            params = params.set('shop', filters.shop);
    if (filters.featured)        params = params.set('featured', '1');
    return this.http.get<PaginatedProducts>(`${API}/products`, { params });
  }

  getProduct(slug: string): Observable<{ data: Product }> {
    return this.http.get<{ data: Product }>(`${API}/products/${slug}`);
  }

  // ── Vendor
  getMyShops(): Observable<{ data: Shop[] }> {
    return this.http.get<{ data: Shop[] }>(`${API}/vendor/shops`);
  }

  createShop(data: FormData): Observable<{ data: Shop }> {
    return this.http.post<{ data: Shop }>(`${API}/shops`, data);
  }

  createProduct(data: FormData): Observable<{ data: Product }> {
    return this.http.post<{ data: Product }>(`${API}/products`, data);
  }

  // ── Connect : Fil d'actualité
  getFeed(page = 1): Observable<Paginated<Post>> {
    return this.http.get<Paginated<Post>>(`${API}/posts`, { params: { page: String(page) } });
  }

  createPost(data: FormData): Observable<{ data: Post }> {
    return this.http.post<{ data: Post }>(`${API}/posts`, data);
  }

  likePost(id: number): Observable<{ liked: boolean; likes_count: number }> {
    return this.http.post<{ liked: boolean; likes_count: number }>(`${API}/posts/${id}/like`, {});
  }

  addComment(postId: number, content: string, parentId?: number): Observable<{ data: Comment }> {
    return this.http.post<{ data: Comment }>(`${API}/posts/${postId}/comment`, { content, parent_id: parentId });
  }

  // ── Connect : Groupes
  getGroups(filters: { type?: string; country?: string; search?: string; page?: number } = {}): Observable<Paginated<Group>> {
    let params = new HttpParams();
    if (filters.type)    params = params.set('type', filters.type);
    if (filters.country) params = params.set('country', filters.country);
    if (filters.search)  params = params.set('search', filters.search);
    if (filters.page)    params = params.set('page', String(filters.page));
    return this.http.get<Paginated<Group>>(`${API}/groups`, { params });
  }

  getGroup(slug: string): Observable<{ data: Group }> {
    return this.http.get<{ data: Group }>(`${API}/groups/${slug}`);
  }

  getGroupPosts(id: number, page = 1): Observable<Paginated<Post>> {
    return this.http.get<Paginated<Post>>(`${API}/groups/${id}/posts`, { params: { page } });
  }

  joinGroup(id: number): Observable<{ message: string; members_count: number }> {
    return this.http.post<{ message: string; members_count: number }>(`${API}/groups/${id}/join`, {});
  }

  leaveGroup(id: number): Observable<{ message: string }> {
    return this.http.delete<{ message: string }>(`${API}/groups/${id}/leave`);
  }

  createGroup(data: FormData): Observable<{ data: Group }> {
    return this.http.post<{ data: Group }>(`${API}/groups`, data);
  }

  // ── Connect : Événements
  getEvents(filters: { type?: string; city?: string; country?: string; page?: number } = {}): Observable<Paginated<ConnectEvent>> {
    let params = new HttpParams();
    if (filters.type)    params = params.set('type', filters.type);
    if (filters.city)    params = params.set('city', filters.city);
    if (filters.country) params = params.set('country', filters.country);
    if (filters.page)    params = params.set('page', String(filters.page));
    return this.http.get<Paginated<ConnectEvent>>(`${API}/events`, { params });
  }

  joinEvent(id: number): Observable<{ message: string; participants_count: number }> {
    return this.http.post<{ message: string; participants_count: number }>(`${API}/events/${id}/join`, {});
  }

  // ── Connect : Profils & Membres
  getProfile(userId: number): Observable<{ data: UserProfile }> {
    return this.http.get<{ data: UserProfile }>(`${API}/profile/${userId}`);
  }

  updateProfile(data: FormData): Observable<{ data: UserProfile }> {
    return this.http.post<{ data: UserProfile }>(`${API}/profile?_method=PUT`, data);
  }

  getMembersMap(filters: { country?: string; city?: string } = {}): Observable<{ data: UserProfile[] }> {
    let params = new HttpParams();
    if (filters.country) params = params.set('country', filters.country);
    if (filters.city)    params = params.set('city', filters.city);
    return this.http.get<{ data: UserProfile[] }>(`${API}/members/map`, { params });
  }

  searchMembers(q: string): Observable<Paginated<UserProfile>> {
    return this.http.get<Paginated<UserProfile>>(`${API}/members/search`, { params: { q } });
  }

  followUser(userId: number): Observable<{ message: string; followers_count: number }> {
    return this.http.post<{ message: string; followers_count: number }>(`${API}/follow/${userId}`, {});
  }

  unfollowUser(userId: number): Observable<{ message: string }> {
    return this.http.delete<{ message: string }>(`${API}/follow/${userId}`);
  }

  // ── Connect : Notifications
  getNotifications(unread = false): Observable<Paginated<AppNotification>> {
    let params = new HttpParams();
    if (unread) params = params.set('unread', '1');
    return this.http.get<Paginated<AppNotification>>(`${API}/notifications`, { params });
  }

  getUnreadCount(): Observable<{ count: number }> {
    return this.http.get<{ count: number }>(`${API}/notifications/count`);
  }

  markAllRead(): Observable<{ message: string }> {
    return this.http.put<{ message: string }>(`${API}/notifications/read-all`, {});
  }
}
