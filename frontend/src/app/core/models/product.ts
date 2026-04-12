import { Category } from './category';
import { Shop } from './shop';

export interface ProductImage {
  id: number;
  url: string;
  url_thumbnail: string | null;
  is_main: boolean;
  order: number;
  alt_text: string | null;
}

export interface Review {
  id: number;
  rating: number;
  comment: string | null;
  is_verified_purchase: boolean;
  user: { id: number; name: string };
  created_at: string;
}

export interface Product {
  id: number;
  name: string;
  slug: string;
  description: string;
  price_fcfa: number;
  price_eur: number;
  price_promo_fcfa: number | null;
  price_promo_eur: number | null;
  unit: string;
  stock: number;
  min_order: number;
  delivery_zones: string[];
  delivery_delay: string | null;
  delivery_free: boolean;
  is_available: boolean;
  is_featured: boolean;
  average_rating: number;
  views_count: number;
  contacts_count: number;
  shop?: Shop;
  category?: Category;
  images?: ProductImage[];
  main_image?: ProductImage;
  reviews?: Review[];
}

export interface PaginatedProducts {
  data: Product[];
  meta: {
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
  };
}
