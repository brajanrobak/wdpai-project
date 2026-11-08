CREATE TABLE IF NOT EXISTS products (
    id BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    category VARCHAR(40) NOT NULL,
    location VARCHAR(40) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    expiration_date DATE NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'active',
    created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT products_quantity_check CHECK (quantity >= 1),
    CONSTRAINT products_location_check CHECK (location IN ('Fridge', 'Freezer', 'Pantry')),
    CONSTRAINT products_status_check CHECK (status IN ('active', 'consumed', 'discarded'))
);

CREATE INDEX IF NOT EXISTS products_status_idx ON products (status);
CREATE INDEX IF NOT EXISTS products_expiration_idx ON products (expiration_date ASC);

INSERT INTO products (name, category, location, quantity, expiration_date, status)
VALUES
    ('Strawberries', 'Fruit', 'Fridge', 1, CURRENT_DATE + INTERVAL '1 day', 'active'),
    ('Fresh milk', 'Dairy', 'Fridge', 2, CURRENT_DATE + INTERVAL '1 day', 'active'),
    ('Greek yogurt', 'Dairy', 'Fridge', 1, CURRENT_DATE + INTERVAL '2 days', 'active'),
    ('Sourdough bread', 'Bakery', 'Pantry', 1, CURRENT_DATE + INTERVAL '4 days', 'active'),
    ('Salmon fillets', 'Meat', 'Freezer', 3, CURRENT_DATE + INTERVAL '20 days', 'active'),
    ('Avocados', 'Vegetables', 'Pantry', 2, CURRENT_DATE - INTERVAL '2 days', 'consumed'),
    ('Baby spinach', 'Vegetables', 'Fridge', 1, CURRENT_DATE - INTERVAL '4 days', 'discarded');