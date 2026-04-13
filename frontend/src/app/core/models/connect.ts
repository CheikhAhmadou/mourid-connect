export interface UserProfile {
  id: number;
  name: string;
  email: string;
  avatar: string;
  cover_image: string;
  bio: string | null;
  cheikh_ref: string | null;
  profession: string | null;
  dahira_name: string | null;
  country: string | null;
  city: string | null;
  latitude: number | null;
  longitude: number | null;
  whatsapp: string | null;
  website: string | null;
  is_visible_map: boolean;
  is_available_help: boolean;
  followers_count: number;
  following_count: number;
  posts_count: number;
  is_following: boolean;
  created_at: string;
}

export interface PostMedia {
  id: number;
  url: string;
  url_thumbnail: string;
  type: 'image' | 'video' | 'audio';
  order: number;
}

export interface Comment {
  id: number;
  content: string;
  likes_count: number;
  user: { id: number; name: string; avatar: string };
  replies?: Comment[];
  replies_count: number;
  parent_id: number | null;
  created_at: string;
}

export interface Post {
  id: number;
  content: string;
  type: string;
  location: string | null;
  likes_count: number;
  comments_count: number;
  is_liked: boolean;
  is_pinned: boolean;
  user: { id: number; name: string; avatar: string; city: string | null };
  group?: { id: number; name: string; slug: string } | null;
  media?: PostMedia[];
  comments?: Comment[];
  created_at: string;
  created_at_raw: string;
}

export interface Group {
  id: number;
  name: string;
  slug: string;
  description: string | null;
  cover: string;
  type: string;
  country: string | null;
  city: string | null;
  members_count: number;
  posts_count: number;
  is_private: boolean;
  is_member: boolean;
  is_admin: boolean;
  creator: { id: number; name: string };
  created_at: string;
}

export interface ConnectEvent {
  id: number;
  title: string;
  description: string | null;
  cover: string;
  type: string;
  location: string | null;
  latitude: number | null;
  longitude: number | null;
  city: string | null;
  country: string | null;
  start_date: string;
  end_date: string | null;
  start_date_human: string;
  participants_count: number;
  max_participants: number | null;
  is_full: boolean;
  is_online: boolean;
  is_participant: boolean;
  organizer: { id: number; name: string };
  group?: { id: number; name: string } | null;
  created_at: string;
}

export interface Notification {
  id: string;
  type: string;
  title: string;
  body: string | null;
  data: Record<string, unknown>;
  is_read: boolean;
  read_at: string | null;
  created_at: string;
}

export interface Paginated<T> {
  data: T[];
  meta: { current_page: number; last_page: number; per_page: number; total: number };
}
