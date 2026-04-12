export interface Category {
  id: number;
  name: string;
  slug: string;
  icon: string;
  description: string | null;
  parent_id: number | null;
  parent?: Category;
  children?: Category[];
}
