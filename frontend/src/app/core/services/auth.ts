import { Injectable, inject, signal } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { tap } from 'rxjs/operators';
import { User, AuthResponse } from '../models/user';

const API = 'https://mourid-connect-production.up.railway.app/api';

@Injectable({ providedIn: 'root' })
export class AuthService {
  private http = inject(HttpClient);

  currentUser = signal<User | null>(this.loadUser());
  token = signal<string | null>(localStorage.getItem('token'));

  private loadUser(): User | null {
    const raw = localStorage.getItem('user');
    return raw ? JSON.parse(raw) : null;
  }

  register(name: string, email: string, password: string, password_confirmation: string) {
    return this.http.post<AuthResponse>(`${API}/auth/register`, {
      name, email, password, password_confirmation
    }).pipe(tap(res => this.persist(res)));
  }

  login(email: string, password: string) {
    return this.http.post<AuthResponse>(`${API}/auth/login`, { email, password })
      .pipe(tap(res => this.persist(res)));
  }

  logout() {
    return this.http.post(`${API}/auth/logout`, {}).pipe(
      tap(() => this.clear())
    );
  }

  isLoggedIn(): boolean {
    return !!this.token();
  }

  private persist(res: AuthResponse) {
    localStorage.setItem('token', res.token);
    localStorage.setItem('user', JSON.stringify(res.user));
    this.token.set(res.token);
    this.currentUser.set(res.user);
  }

  private clear() {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    this.token.set(null);
    this.currentUser.set(null);
  }
}
