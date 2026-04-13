import { Component, inject, signal, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { ApiService } from '../../../core/services/api';
import { AuthService } from '../../../core/services/auth';
import { UserProfile } from '../../../core/models/connect';

@Component({
  selector: 'app-carte',
  imports: [FormsModule, RouterLink, RouterLinkActive],
  templateUrl: './carte.html',
  styleUrl: './carte.scss',
})
export class Carte implements OnInit {
  private api = inject(ApiService);
  auth        = inject(AuthService);

  members  = signal<UserProfile[]>([]);
  loading  = signal(true);
  search   = '';
  country  = '';
  selected = signal<UserProfile | null>(null);

  // Statistiques par pays
  byCountry = signal<{ country: string; count: number }[]>([]);

  ngOnInit() { this.load(); }

  load() {
    this.loading.set(true);
    this.api.getMembersMap({ country: this.country || undefined }).subscribe({
      next: res => {
        this.members.set(res.data as unknown as UserProfile[]);
        this.computeStats(res.data as unknown as UserProfile[]);
        this.loading.set(false);
      },
      error: () => this.loading.set(false),
    });
  }

  computeStats(members: UserProfile[]) {
    const map: Record<string, number> = {};
    members.forEach(m => {
      if (m.country) map[m.country] = (map[m.country] ?? 0) + 1;
    });
    const sorted = Object.entries(map)
      .map(([country, count]) => ({ country, count }))
      .sort((a, b) => b.count - a.count)
      .slice(0, 8);
    this.byCountry.set(sorted);
  }

  get filtered(): UserProfile[] {
    const q = this.search.toLowerCase();
    return this.members().filter(m =>
      !q || m.name?.toLowerCase().includes(q) ||
             (m as any).dahira_name?.toLowerCase().includes(q) ||
             (m as any).city?.toLowerCase().includes(q)
    );
  }

  follow(member: UserProfile) {
    if (!this.auth.isLoggedIn()) return;
    if (member.is_following) {
      this.api.unfollowUser(member.id).subscribe(() => {
        this.members.update(ms => ms.map(m => m.id === member.id ? { ...m, is_following: false } : m));
      });
    } else {
      this.api.followUser(member.id).subscribe(() => {
        this.members.update(ms => ms.map(m => m.id === member.id ? { ...m, is_following: true } : m));
      });
    }
  }

  avatarGrad(id: number): string {
    const g = [
      'linear-gradient(135deg,#2D6A4F,#40916C)',
      'linear-gradient(135deg,#C9A84C,#E8C96A)',
      'linear-gradient(135deg,#6D28D9,#8B5CF6)',
      'linear-gradient(135deg,#0D9488,#14B8A6)',
      'linear-gradient(135deg,#DC2626,#EF4444)',
      'linear-gradient(135deg,#1D4ED8,#3B82F6)',
    ];
    return g[id % g.length];
  }

  countryFlag(code: string): string {
    const flags: Record<string, string> = {
      FR: '🇫🇷', SN: '🇸🇳', US: '🇺🇸', BE: '🇧🇪', IT: '🇮🇹',
      ES: '🇪🇸', MA: '🇲🇦', CI: '🇨🇮', AE: '🇦🇪', DE: '🇩🇪',
      GB: '🇬🇧', CA: '🇨🇦', PT: '🇵🇹', NL: '🇳🇱', CH: '🇨🇭',
    };
    return flags[code] ?? '🌍';
  }
}
