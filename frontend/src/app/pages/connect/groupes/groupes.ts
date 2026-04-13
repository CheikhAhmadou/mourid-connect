import { Component, inject, signal, OnInit } from '@angular/core';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { ApiService } from '../../../core/services/api';
import { AuthService } from '../../../core/services/auth';
import { Group } from '../../../core/models/connect';

@Component({
  selector: 'app-groupes',
  imports: [RouterLink, RouterLinkActive, FormsModule],
  templateUrl: './groupes.html',
  styleUrl: './groupes.scss',
})
export class Groupes implements OnInit {
  private api = inject(ApiService);
  auth        = inject(AuthService);

  groups   = signal<Group[]>([]);
  loading  = signal(true);
  search   = '';
  type     = '';

  showCreate = signal(false);
  saving     = signal(false);
  // Formulaire création groupe
  gName = ''; gDescription = ''; gType = 'dahira'; gCountry = ''; gCity = '';

  readonly types = [
    { value: '', label: 'Tous' },
    { value: 'dahira', label: '🕌 Dahiras' },
    { value: 'city', label: '🏙️ Par ville' },
    { value: 'country', label: '🌍 Par pays' },
    { value: 'theme', label: '💡 Thématiques' },
  ];

  ngOnInit() { this.load(); }

  load() {
    this.loading.set(true);
    this.api.getGroups({ type: this.type || undefined, search: this.search || undefined }).subscribe({
      next: res => { this.groups.set(res.data); this.loading.set(false); },
      error: ()  => this.loading.set(false),
    });
  }

  join(group: Group) {
    if (!this.auth.isLoggedIn()) return;
    this.api.joinGroup(group.id).subscribe(res => {
      this.groups.update(gs => gs.map(g =>
        g.id === group.id ? { ...g, is_member: true, members_count: res.members_count } : g
      ));
    });
  }

  leave(group: Group) {
    this.api.leaveGroup(group.id).subscribe(() => {
      this.groups.update(gs => gs.map(g =>
        g.id === group.id ? { ...g, is_member: false, members_count: g.members_count - 1 } : g
      ));
    });
  }

  createGroup() {
    if (!this.gName || !this.gDescription) return;
    this.saving.set(true);
    const form = new FormData();
    form.append('name', this.gName);
    form.append('description', this.gDescription);
    form.append('type', this.gType);
    if (this.gCountry) form.append('country', this.gCountry);
    if (this.gCity)    form.append('city', this.gCity);

    this.api.createGroup(form).subscribe({
      next: res => {
        this.groups.update(gs => [res.data, ...gs]);
        this.showCreate.set(false);
        this.saving.set(false);
        this.gName = ''; this.gDescription = '';
      },
      error: () => this.saving.set(false),
    });
  }

  typeIcon(type: string): string {
    return { dahira: '🕌', city: '🏙️', country: '🌍', theme: '💡', general: '👥' }[type] ?? '👥';
  }
}
