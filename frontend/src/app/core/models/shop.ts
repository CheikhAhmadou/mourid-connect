import { User } from './user';
import { Product } from './product';

export interface Shop {
  id: number;
  name: string;
  slug: string;
  description: string | null;
  logo: string | null;
  cover_image: string | null;
  country: string;
  city: string | null;
  phone: string | null;
  whatsapp: string | null;
  email: string | null;
  website: string | null;
  level: 'basic' | 'pro' | 'premium';
  is_verified: boolean;
  views_count: number;
  contacts_count: number;
  owner?: User;
  products?: Product[];
}

export interface PaginatedShops {
  data: Shop[];
  meta: PaginationMeta;
  links: PaginationLinks;
}

export interface PaginationMeta {
  current_page: number;
  last_page: number;
  per_page: number;
  total: number;
}

export interface PaginationLinks {
  next: string | null;
  prev: string | null;
}
