import { Injectable } from '@angular/core';

// Taux de conversion depuis FCFA (XOF)
// 1 EUR = 655.957 XOF (taux fixe zone CFA)
const RATES: Record<string, number> = {
  XOF: 1,
  EUR: 655.957,
  USD: 610,
  GBP: 775,
  MAD: 61,
  AED: 166,
  CAD: 445,
  CHF: 680,
};

// Mapping pays → devise
const COUNTRY_CURRENCY: Record<string, string> = {
  FR: 'EUR', BE: 'EUR', IT: 'EUR', ES: 'EUR', DE: 'EUR',
  PT: 'EUR', NL: 'EUR', LU: 'EUR', AT: 'EUR', FI: 'EUR',
  SN: 'XOF', CI: 'XOF', ML: 'XOF', BF: 'XOF', NE: 'XOF',
  TG: 'XOF', BJ: 'XOF', GW: 'XOF',
  MA: 'MAD',
  AE: 'AED',
  US: 'USD', CA: 'CAD',
  GB: 'GBP',
  CH: 'CHF',
};

// Mapping locale navigateur → code pays
function localeToCountry(locale: string): string {
  const region = locale.split('-')[1]?.toUpperCase();
  if (region && COUNTRY_CURRENCY[region]) return region;
  // Fallback sur la langue
  const lang = locale.split('-')[0].toLowerCase();
  const langMap: Record<string, string> = {
    fr: 'FR', en: 'US', ar: 'MA', pt: 'PT', de: 'DE', nl: 'NL',
  };
  return langMap[lang] ?? 'FR';
}

@Injectable({ providedIn: 'root' })
export class CurrencyService {
  private country: string;
  private currency: string;

  constructor() {
    this.country = localeToCountry(navigator.language ?? 'fr-FR');
    this.currency = COUNTRY_CURRENCY[this.country] ?? 'EUR';
  }

  /** Convertit un montant FCFA dans la devise locale */
  convert(fcfa: number): number {
    const rate = RATES[this.currency] ?? RATES['EUR'];
    return fcfa / rate;
  }

  /** Formate un montant FCFA en devise locale avec le symbole */
  format(fcfa: number): string {
    const amount = this.convert(fcfa);
    try {
      return new Intl.NumberFormat(navigator.language, {
        style: 'currency',
        currency: this.currency,
        maximumFractionDigits: this.currency === 'XOF' ? 0 : 2,
      }).format(amount);
    } catch {
      return `${amount.toFixed(0)} ${this.currency}`;
    }
  }

  /** Retourne le code devise (EUR, XOF, USD...) */
  get code(): string { return this.currency; }

  /** Retourne true si l'utilisateur est en zone FCFA */
  get isFcfaZone(): boolean { return this.currency === 'XOF'; }
}
