import { Component, inject, signal, OnInit } from '@angular/core';
import { ActivatedRoute, RouterLink } from '@angular/router';
import { DecimalPipe, SlicePipe } from '@angular/common';
import { ApiService } from '../../../core/services/api';
import { CurrencyService } from '../../../core/services/currency';
import { Product, ProductImage } from '../../../core/models/product';

@Component({
  selector: 'app-product-detail',
  imports: [RouterLink, DecimalPipe, SlicePipe],
  templateUrl: './product-detail.html',
  styleUrl: './product-detail.scss',
})
export class ProductDetail implements OnInit {
  private api = inject(ApiService);
  private route = inject(ActivatedRoute);
  currency = inject(CurrencyService);

  product = signal<Product | null>(null);
  selectedImage = signal<ProductImage | null>(null);
  loading = signal(true);

  ngOnInit() {
    const slug = this.route.snapshot.paramMap.get('slug')!;
    this.api.getProduct(slug).subscribe(res => {
      this.product.set(res.data);
      this.selectedImage.set(res.data.main_image ?? (res.data.images?.[0] ?? null));
      this.loading.set(false);
    });
  }

  selectImage(img: ProductImage) {
    this.selectedImage.set(img);
  }

  whatsappContact(product: Product) {
    const phone = product.shop?.whatsapp ?? product.shop?.phone;
    if (phone) {
      const msg = encodeURIComponent(`Bonjour, je suis intéressé par votre produit "${product.name}" sur Souk Mouride.`);
      window.open(`https://wa.me/${phone.replace(/\s+/g, '')}?text=${msg}`, '_blank');
    }
  }

  stars(rating: number): string[] {
    return Array.from({ length: 5 }, (_, i) => i < Math.round(rating) ? '★' : '☆');
  }

  getLevelLabel(level: string | undefined): string {
    return { basic: 'Basique', pro: 'Pro ⭐', premium: 'Premium 👑' }[level ?? ''] ?? '';
  }
}
