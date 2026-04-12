import { Routes } from '@angular/router';

export const routes: Routes = [
  {
    path: '',
    loadComponent: () => import('./pages/home/home').then(m => m.Home),
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
  { path: '**', redirectTo: '' },
];
