import { Component, inject, signal, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ApiService } from '../../../core/services/api';
import { AuthService } from '../../../core/services/auth';
import { UserProfile } from '../../../core/models/connect';

@Component({
  selector: 'app-carte',
  imports: [FormsModule],
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

  countryFlag(code: string): string {
    const flags: Record<string, string> = {
      FR: '🇫🇷', SN: '🇸🇳', US: '🇺🇸', BE: '🇧🇪', IT: '🇮🇹',
      ES: '🇪🇸', MA: '🇲🇦', CI: '🇨🇮', AE: '🇦🇪', DE: '🇩🇪',
      GB: '🇬🇧', CA: '🇨🇦', PT: '🇵🇹', NL: '🇳🇱', CH: '🇨🇭',
    };
    return flags[code] ?? '🌍';
  }
}
