import { Routes } from '@angular/router';

export const routes: Routes = [
  { path: '', redirectTo: 'souk', pathMatch: 'full' },
  {
    path: 'auth',
    loadComponent: () => import('./pages/auth/auth').then(m => m.AuthPage),
  },
  {
    path: 'souk',
    loadComponent: () => import('./pages/souk/souk-list/souk-list').then(m => m.SoukList),
  },
  {
    path: 'souk/boutiques/:slug',
    loadComponent: () => import('./pages/souk/shop-detail/shop-detail').then(m => m.ShopDetail),
  },
  {
    path: 'souk/produits/:slug',
    loadComponent: () => import('./pages/souk/product-detail/product-detail').then(m => m.ProductDetail),
  },
  {
    path: 'connect',
    loadComponent: () => import('./pages/connect/feed/feed').then(m => m.Feed),
  },
  {
    path: 'connect/groupes',
    loadComponent: () => import('./pages/connect/groupes/groupes').then(m => m.Groupes),
  },
  {
    path: 'connect/evenements',
    loadComponent: () => import('./pages/connect/evenements/evenements').then(m => m.Evenements),
  },
  {
    path: 'connect/membres',
    loadComponent: () => import('./pages/connect/carte/carte').then(m => m.Carte),
  },
  { path: '**', redirectTo: 'souk' },
];
