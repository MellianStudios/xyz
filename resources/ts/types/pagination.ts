export interface LengthAwarePaginator<Data> {
    data: Data;
    links: PaginationLink[];
}

export interface PaginationLink {
    active: boolean;
    label: string;
    url: string | null;
}
