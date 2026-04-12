import { Injectable, inject } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Category } from '../models/category';
import { Shop, PaginatedShops } from '../models/shop';
import { Product, PaginatedProducts } from '../models/product';

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
}
