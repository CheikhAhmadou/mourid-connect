import { Component, inject, signal, OnInit } from '@angular/core';
import { Router, RouterLink } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { DecimalPipe } from '@angular/common';
import { AuthService } from '../../core/services/auth';
import { ApiService } from '../../core/services/api';
import { CurrencyService } from '../../core/services/currency';
import { Shop } from '../../core/models/shop';
import { Category } from '../../core/models/category';
import { Product } from '../../core/models/product';

type View = 'shops' | 'create-shop' | 'create-product';

@Component({
  selector: 'app-dashboard',
  imports: [FormsModule, RouterLink, DecimalPipe],
  templateUrl: './dashboard.html',
  styleUrl: './dashboard.scss',
})
export class Dashboard implements OnInit {
  auth = inject(AuthService);
  private api = inject(ApiService);
  private router = inject(Router);
  currency = inject(CurrencyService);

  view = signal<View>('shops');
  shops = signal<Shop[]>([]);
  categories = signal<Category[]>([]);
  loading = signal(true);
  saving = signal(false);
  success = signal<string | null>(null);
  error = signal<string | null>(null);

  // Formulaire boutique
  shopName = '';
  shopCity = '';
  shopCountry = 'FR';
  shopPhone = '';
  shopWhatsapp = '';
  shopEmail = '';
  shopDescription = '';

  // Formulaire produit
  selectedShopId: number | null = null;
  productName = '';
  productDescription = '';
  productCategoryId: number | null = null;
  productPrice = 0;
  productUnit = 'unité';
  productStock = 1;
  productDeliveryFree = true;
  productDeliveryDelay = '3-5 jours';
  productDeliveryZones = 'France,Sénégal';
  productImages: File[] = [];

  ngOnInit() {
    if (!this.auth.isLoggedIn()) {
      this.router.navigate(['/auth']);
      return;
    }
    this.loadData();
  }

  loadData() {
    this.loading.set(true);
    this.api.getMyShops().subscribe({
      next: res => {
        this.shops.set(res.data);
        this.loading.set(false);
      },
      error: () => this.loading.set(false),
    });
    this.api.getCategories().subscribe(res => {
      const flat: Category[] = [];
      res.data.forEach(cat => {
        if (cat.children?.length) flat.push(...cat.children);
        else flat.push(cat);
      });
      this.categories.set(flat);
    });
  }

  createShop() {
    this.saving.set(true);
    this.error.set(null);
    const form = new FormData();
    form.append('name', this.shopName);
    form.append('city', this.shopCity);
    form.append('country', this.shopCountry);
    if (this.shopPhone) form.append('phone', this.shopPhone);
    if (this.shopWhatsapp) form.append('whatsapp', this.shopWhatsapp);
    if (this.shopEmail) form.append('email', this.shopEmail);
    if (this.shopDescription) form.append('description', this.shopDescription);

    this.api.createShop(form).subscribe({
      next: res => {
        this.shops.update(s => [res.data, ...s]);
        this.success.set('Boutique créée avec succès !');
        this.saving.set(false);
        this.view.set('shops');
        setTimeout(() => this.success.set(null), 4000);
      },
      error: err => {
        this.error.set(err.error?.message ?? 'Erreur lors de la création.');
        this.saving.set(false);
      },
    });
  }

  onImages(event: Event) {
    const input = event.target as HTMLInputElement;
    if (input.files) this.productImages = Array.from(input.files);
  }

  createProduct() {
    if (!this.selectedShopId) { this.error.set('Sélectionne une boutique.'); return; }
    this.saving.set(true);
    this.error.set(null);
    const form = new FormData();
    form.append('shop_id', String(this.selectedShopId));
    form.append('name', this.productName);
    form.append('description', this.productDescription);
    if (this.productCategoryId) form.append('category_id', String(this.productCategoryId));
    form.append('price', String(this.productPrice));
    form.append('unit', this.productUnit);
    form.append('stock', String(this.productStock));
    form.append('delivery_free', this.productDeliveryFree ? '1' : '0');
    form.append('delivery_delay', this.productDeliveryDelay);
    form.append('delivery_zones', this.productDeliveryZones);
    this.productImages.forEach(f => form.append('images[]', f));

    this.api.createProduct(form).subscribe({
      next: res => {
        this.success.set(`Produit "${res.data.name}" mis en vente !`);
        this.saving.set(false);
        this.view.set('shops');
        this.loadData();
        setTimeout(() => this.success.set(null), 5000);
      },
      error: err => {
        this.error.set(err.error?.message ?? 'Erreur lors de la création du produit.');
        this.saving.set(false);
      },
    });
  }

  logout() {
    this.auth.logout().subscribe(() => this.router.navigate(['/']));
  }

  getLevelLabel(level: string): string {
    return { basic: 'Basique', pro: 'Pro ⭐', premium: 'Premium 👑' }[level] ?? level;
  }
}
