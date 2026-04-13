import { Component, inject, signal, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ApiService } from '../../../core/services/api';
import { AuthService } from '../../../core/services/auth';
import { ConnectEvent } from '../../../core/models/connect';

@Component({
  selector: 'app-evenements',
  imports: [FormsModule],
  templateUrl: './evenements.html',
  styleUrl: './evenements.scss',
})
export class Evenements implements OnInit {
  private api = inject(ApiService);
  auth        = inject(AuthService);

  events  = signal<ConnectEvent[]>([]);
  loading = signal(true);
  type    = '';

  readonly types = [
    { value: '', label: '🗓️ Tous' },
    { value: 'religious', label: '🕌 Religieux' },
    { value: 'cultural',  label: '🎭 Culturels' },
    { value: 'social',    label: '🤝 Sociaux' },
    { value: 'professional', label: '💼 Professionnels' },
    { value: 'sports',    label: '⚽ Sports' },
  ];

  ngOnInit() { this.load(); }

  load() {
    this.loading.set(true);
    this.api.getEvents({ type: this.type || undefined }).subscribe({
      next: res => { this.events.set(res.data); this.loading.set(false); },
      error: ()  => this.loading.set(false),
    });
  }

  join(event: ConnectEvent) {
    if (!this.auth.isLoggedIn()) return;
    this.api.joinEvent(event.id).subscribe(res => {
      this.events.update(es => es.map(e =>
        e.id === event.id ? { ...e, is_participant: !e.is_participant, participants_count: res.participants_count } : e
      ));
    });
  }

  typeLabel(type: string): string {
    return this.types.find(t => t.value === type)?.label ?? type;
  }
}
