import { Component, inject, signal, OnInit } from '@angular/core';
import { ActivatedRoute, RouterLink } from '@angular/router';
import { DecimalPipe } from '@angular/common';
import { ApiService } from '../../../core/services/api';
import { Shop } from '../../../core/models/shop';

@Component({
  selector: 'app-shop-detail',
  imports: [RouterLink, DecimalPipe],
  templateUrl: './shop-detail.html',
  styleUrl: './shop-detail.scss',
})
export class ShopDetail implements OnInit {
  private api = inject(ApiService);
  private route = inject(ActivatedRoute);

  shop = signal<Shop | null>(null);
  loading = signal(true);

  ngOnInit() {
    const slug = this.route.snapshot.paramMap.get('slug')!;
    this.api.getShop(slug).subscribe(res => {
      this.shop.set(res.data);
      this.loading.set(false);
    });
  }

  getLevelLabel(level: string): string {
    return { basic: 'Basique', pro: 'Pro ⭐', premium: 'Premium 👑' }[level] ?? level;
  }

  whatsappContact(shop: Shop) {
    const phone = shop.whatsapp ?? shop.phone;
    if (phone) {
      const msg = encodeURIComponent(`Bonjour, je vous contacte depuis Souk Mouride.`);
      window.open(`https://wa.me/${phone.replace(/\s+/g, '')}?text=${msg}`, '_blank');
    }
  }
}
