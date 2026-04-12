import { Component, inject, signal, computed, OnInit } from '@angular/core';
import { RouterLink } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { DecimalPipe } from '@angular/common';
import { ApiService } from '../../../core/services/api';
import { Product } from '../../../core/models/product';
import { Category } from '../../../core/models/category';

export interface CategorySection {
  parent: Category;
  products: Product[];
}

@Component({
  selector: 'app-souk-list',
  imports: [RouterLink, FormsModule, DecimalPipe],
  templateUrl: './souk-list.html',
  styleUrl: './souk-list.scss',
})
export class SoukList implements OnInit {
  private api = inject(ApiService);

  // State
  parentCategories = signal<Category[]>([]);
  products = signal<Product[]>([]);
  loading = signal(true);
  currentPage = signal(1);
  totalPages = signal(1);
  search = '';
  selectedParent = signal<Category | null>(null);

  // Vue groupée = aucune catégorie sélectionnée + pas de recherche
  get isGroupedView(): boolean {
    return !this.selectedParent() && !this.search.trim();
  }

  // Groupement des produits par catégorie parente
  sections = computed<CategorySection[]>(() => {
    if (!this.isGroupedView) return [];
    const prods = this.products();
    const parents = this.parentCategories();
    return parents
      .map(parent => ({
        parent,
        products: prods.filter(p => p.category?.parent_id === parent.id),
      }))
      .filter(s => s.products.length > 0);
  });

  ngOnInit() {
    this.api.getCategories().subscribe(res => {
      this.parentCategories.set(res.data.filter(c => c.parent_id === null));
    });
    this.load();
  }

  load() {
    this.loading.set(true);
    const parent = this.selectedParent();

    this.api.getProducts({
      page: this.currentPage(),
      per_page: this.isGroupedView ? 100 : 24,
      search: this.search.trim() || undefined,
      parent_category: parent?.id ?? undefined,
    }).subscribe(res => {
      this.products.set(res.data);
      this.totalPages.set(res.meta.last_page);
      this.loading.set(false);
    });
  }

  onSearch() {
    this.currentPage.set(1);
    this.load();
  }

  clearSearch() {
    this.search = '';
    this.currentPage.set(1);
    this.load();
  }

  filterByParent(cat: Category | null) {
    this.selectedParent.set(cat);
    this.search = '';
    this.currentPage.set(1);
    this.load();
  }

  nextPage() {
    if (this.currentPage() < this.totalPages()) {
      this.currentPage.update(p => p + 1);
      this.load();
    }
  }

  prevPage() {
    if (this.currentPage() > 1) {
      this.currentPage.update(p => p - 1);
      this.load();
    }
  }

  getColorClass(p: Product): string {
    return ['c1', 'c2', 'c3', 'c4'][p.id % 4];
  }

  trackSection(_: number, s: CategorySection) { return s.parent.id; }
  trackProduct(_: number, p: Product) { return p.id; }
}
