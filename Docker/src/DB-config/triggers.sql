CREATE TRIGGER after_hotel_stars_update
AFTER UPDATE ON hotels
FOR EACH ROW
BEGIN
    IF OLD.stars <> NEW.stars THEN
        INSERT INTO booking_audit (hotel_id, old_price_per_night, new_price_per_night, old_free_rooms, new_free_rooms, old_stars, new_stars)
        VALUES (NEW.id, OLD.price_per_night, NEW.price_per_night, OLD.free_rooms, NEW.free_rooms, OLD.stars, NEW.stars);
    END IF;
END;


CREATE TRIGGER after_hotel_rooms_update
AFTER UPDATE ON hotels
FOR EACH ROW
BEGIN
    IF OLD.free_rooms <> NEW.free_rooms THEN
        INSERT INTO booking_audit (hotel_id, old_price_per_night, new_price_per_night, old_free_rooms, new_free_rooms, old_stars, new_stars)
        VALUES (NEW.id, OLD.price_per_night, NEW.price_per_night, OLD.free_rooms, NEW.free_rooms, OLD.stars, NEW.stars);
    END IF;
END;



CREATE TRIGGER after_hotel_insert
AFTER INSERT ON hotels
FOR EACH ROW
BEGIN
    INSERT INTO booking_audit (hotel_id, old_price_per_night, new_price_per_night, old_free_rooms, new_free_rooms, old_stars, new_stars)
    VALUES (NEW.id, 0, 0, 0, NEW.free_rooms, 0, NEW.stars);
END;


CREATE TRIGGER after_hotel_price_update
AFTER UPDATE ON hotels
FOR EACH ROW
BEGIN
    IF OLD.price_per_night <> NEW.price_per_night THEN
        INSERT INTO booking_audit (hotel_id, old_price_per_night, new_price_per_night, old_free_rooms, new_free_rooms, old_stars, new_stars)
        VALUES (NEW.id, OLD.price_per_night, NEW.price_per_night, OLD.free_rooms, NEW.free_rooms, OLD.stars, NEW.stars);
    END IF;
END;

