DELIMITER $$

CREATE PROCEDURE AddHotel(
    IN hotelName VARCHAR(255),
    IN hotelLocation VARCHAR(255),
    IN pricePerNight DECIMAL(10, 2),
    IN hotelImage VARCHAR(255)
)
BEGIN
    INSERT INTO hotels (name, location, price_per_night, image)
    VALUES (hotelName, hotelLocation, pricePerNight, hotelImage);
END $$

CREATE PROCEDURE UpdateHotelPrice(
    IN hotelID INT,
    IN newPrice DECIMAL(10, 2)
)
BEGIN
    UPDATE hotels
    SET price_per_night = newPrice
    WHERE id = hotelID;
END $$

CREATE PROCEDURE DeleteHotel(
    IN hotelID INT
)
BEGIN
    DELETE FROM hotels
    WHERE id = hotelID;
END $$

DELIMITER ;
DELIMITER //

CREATE PROCEDURE RegisterUser(
    IN p_username VARCHAR(255),
    IN p_email VARCHAR(255),
    IN p_password VARCHAR(255)
)
BEGIN
    INSERT INTO users (username, email, password) VALUES (p_username, p_email, p_password);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE AuthenticateUser(
    IN p_username VARCHAR(255),
    IN p_password VARCHAR(255),
    OUT p_user_id INT
)
BEGIN
    DECLARE user_count INT;

    -- check user 
    SELECT COUNT(*) INTO user_count
    FROM users
    WHERE username = p_username AND password = p_password;

    IF user_count = 1 THEN
        
        SELECT id INTO p_user_id
        FROM users
        WHERE username = p_username;
    ELSE
        SET p_user_id = -1; -- user not found
    END IF;
END //

DELIMITER ;
