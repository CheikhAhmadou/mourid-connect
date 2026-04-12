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

  pillars = [
    { icon: '🌍', color: 'green', title: 'Connect', desc: 'Le réseau social mondial de la communauté mouride.', features: ['Carte mondiale des mourides', 'Profil communautaire complet', 'Module "Je viens d\'arriver"', 'Annuaire professionnel', 'Groupes par pays & ville'] },
    { icon: '🕌', color: 'gold', title: 'Dahira', desc: 'Gestion complète de ta dahira — cotisations, trésorerie, événements.', features: ['Suivi cotisations mensuelles & Magal', 'Trésorerie & rapports automatiques', 'Événements sociaux', 'Devises dans 30+ pays', 'Statistiques & tableaux de bord'] },
    { icon: '📖', color: 'teal', title: 'Académie', desc: 'Khassaïdes, actualités de la Khalife, diffusions live.', features: ['Khassaïdes complètes & traduites', 'Actualités de la Khalife Générale', 'Diffusion live des cérémonies', 'Forum avec érudits vérifiés', 'Agenda Magal, Gamou, Ziarras'] },
    { icon: '👶', color: 'green', title: 'Kids & Youth', desc: 'L\'académie pour les enfants de la diaspora.', features: ['Bamba Kids (3-7 ans)', 'Bamba Academy (8-12 ans)', 'Bamba Youth (13-17 ans)', 'Validation vocale', 'Tableau de bord parents'] },
    { icon: '🏪', color: 'gold', title: 'Souk Mouride', desc: 'L\'annuaire et marketplace des entrepreneurs mourides.', features: ['Annuaire des entreprises', 'Vitrine produits & services', 'Contact direct vendeur', 'Prix en devise locale', 'Avis communautaires vérifiés'] },
    { icon: '💱', color: 'teal', title: 'Multi-Devises', desc: 'Chaque membre voit les montants dans sa devise locale.', features: ['FCFA, €, $, £, CHF, AED...', 'Taux de change en temps réel', '3 modes de configuration', 'Consolidation trésorerie', 'Stats par zone géographique'] },
  ];

  getColorClass(p: Product): string {
    const colors = ['c1', 'c2', 'c3', 'c4'];
    return colors[p.id % 4];
  }
}
