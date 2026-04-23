import { Component, inject, signal, OnInit } from '@angular/core';
import { RouterLink } from '@angular/router';
import { DecimalPipe } from '@angular/common';
import { ApiService } from '../../core/services/api';
import { Product } from '../../core/models/product';

@Component({
  selector: 'app-home',
  imports: [RouterLink, DecimalPipe],
  templateUrl: './home.html',
  styleUrl: './home.scss',
})
export class Home implements OnInit {
  private api = inject(ApiService);
  featuredProducts = signal<Product[]>([]);

  ngOnInit() {
    this.api.getProducts({ featured: true, page: 1 }).subscribe(res => {
      this.featuredProducts.set(res.data.slice(0, 4));
    });
  }

  getColorClass(p: Product): string {
    const colors = ['c1', 'c2', 'c3', 'c4'];
    return colors[p.id % 4];
  }
}
