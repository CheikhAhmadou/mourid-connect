import { Component, inject, signal } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { AuthService } from '../../core/services/auth';

@Component({
  selector: 'app-auth',
  imports: [FormsModule, RouterLink],
  templateUrl: './auth.html',
  styleUrl: './auth.scss',
})
export class AuthPage {
  private auth = inject(AuthService);
  private router = inject(Router);

  tab = signal<'login' | 'register'>('register');
  loading = signal(false);
  error = signal<string | null>(null);

  // Formulaire inscription
  regName = '';
  regEmail = '';
  regPassword = '';
  regConfirm = '';

  // Formulaire connexion
  loginEmail = '';
  loginPassword = '';

  setTab(t: 'login' | 'register') {
    this.tab.set(t);
    this.error.set(null);
  }

  register() {
    if (this.regPassword !== this.regConfirm) {
      this.error.set('Les mots de passe ne correspondent pas.');
      return;
    }
    this.loading.set(true);
    this.error.set(null);
    this.auth.register(this.regName, this.regEmail, this.regPassword, this.regConfirm).subscribe({
      next: () => this.router.navigate(['/dashboard']),
      error: err => {
        this.error.set(err.error?.message ?? 'Erreur lors de l\'inscription.');
        this.loading.set(false);
      },
    });
  }

  login() {
    this.loading.set(true);
    this.error.set(null);
    this.auth.login(this.loginEmail, this.loginPassword).subscribe({
      next: () => this.router.navigate(['/dashboard']),
      error: err => {
        this.error.set(err.error?.message ?? 'Email ou mot de passe incorrect.');
        this.loading.set(false);
      },
    });
  }
}
