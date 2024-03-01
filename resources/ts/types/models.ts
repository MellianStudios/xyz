export interface User {
    id: number;
    email: string;
    first_name: string;
    last_name: string;
    street: string|null;
    street_number: string|null;
    zip: string|null;
    city: string|null;
    country: string|null;
    phone_number: string|null;
    email_verified_at: string;
    created_at: string;
    updated_at: string;
}
