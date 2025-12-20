-- Dynasty Hotels - Complete Database Setup
-- Run this file to create all required tables
-- Date: December 20, 2025

-- Create Database
CREATE DATABASE IF NOT EXISTS `dynasty_hotels` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `dynasty_hotels`;

-- ============================================
-- 1. USERS TABLE (Authentication)
-- ============================================
CREATE TABLE IF NOT EXISTS `login` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `profile_photo` VARCHAR(500) DEFAULT NULL,
    `phone` VARCHAR(20) DEFAULT NULL,
    `address` TEXT DEFAULT NULL,
    `role` ENUM('customer', 'admin', 'staff') DEFAULT 'customer',
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 2. ROOMS TABLE (Room Inventory)
-- ============================================
CREATE TABLE IF NOT EXISTS `rooms` (
    `room_id` INT(11) NOT NULL AUTO_INCREMENT,
    `room_number` VARCHAR(50) NOT NULL UNIQUE,
    `room_type` ENUM('single', 'double', 'suite', 'deluxe', 'presidential') NOT NULL,
    `room_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `capacity` INT(11) NOT NULL DEFAULT 2,
    `base_price` DECIMAL(10,2) NOT NULL,
    `weekend_price` DECIMAL(10,2) DEFAULT NULL,
    `size_sqft` INT(11) DEFAULT NULL,
    `floor_number` INT(11) DEFAULT NULL,
    `bed_type` VARCHAR(100) DEFAULT NULL,
    `view_type` VARCHAR(100) DEFAULT NULL,
    `is_available` TINYINT(1) DEFAULT 1,
    `is_smoking` TINYINT(1) DEFAULT 0,
    `image_url` VARCHAR(500) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`room_id`),
    INDEX `idx_room_type` (`room_type`),
    INDEX `idx_is_available` (`is_available`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 3. ROOM AMENITIES TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `amenities` (
    `amenity_id` INT(11) NOT NULL AUTO_INCREMENT,
    `amenity_name` VARCHAR(255) NOT NULL,
    `amenity_icon` VARCHAR(255) DEFAULT NULL,
    `category` VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (`amenity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 4. ROOM-AMENITIES MAPPING TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `room_amenities` (
    `room_id` INT(11) NOT NULL,
    `amenity_id` INT(11) NOT NULL,
    PRIMARY KEY (`room_id`, `amenity_id`),
    FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE CASCADE,
    FOREIGN KEY (`amenity_id`) REFERENCES `amenities`(`amenity_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 5. ROOM BOOKINGS TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `room_bookings` (
    `booking_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `room_id` INT(11) NOT NULL,
    `booking_reference` VARCHAR(50) NOT NULL UNIQUE,
    `guest_name` VARCHAR(255) NOT NULL,
    `guest_email` VARCHAR(255) NOT NULL,
    `guest_phone` VARCHAR(20) NOT NULL,
    `check_in_date` DATE NOT NULL,
    `check_out_date` DATE NOT NULL,
    `num_adults` INT(11) DEFAULT 1,
    `num_children` INT(11) DEFAULT 0,
    `num_rooms` INT(11) DEFAULT 1,
    `total_nights` INT(11) NOT NULL,
    `total_amount` DECIMAL(10,2) NOT NULL,
    `special_requests` TEXT DEFAULT NULL,
    `booking_status` ENUM('pending', 'confirmed', 'checked_in', 'checked_out', 'cancelled', 'no_show') DEFAULT 'pending',
    `payment_status` ENUM('pending', 'partial', 'paid', 'refunded') DEFAULT 'pending',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`booking_id`),
    FOREIGN KEY (`user_id`) REFERENCES `login`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE RESTRICT,
    INDEX `idx_check_in` (`check_in_date`),
    INDEX `idx_check_out` (`check_out_date`),
    INDEX `idx_booking_status` (`booking_status`),
    INDEX `idx_booking_ref` (`booking_reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 6. EVENT BOOKINGS TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `event_bookings` (
    `event_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) DEFAULT NULL,
    `event_reference` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `event_type` ENUM('wedding', 'birthday', 'conference', 'corporate', 'other') NOT NULL,
    `event_date` DATE NOT NULL,
    `event_time` TIME DEFAULT NULL,
    `venue_preference` VARCHAR(255) DEFAULT NULL,
    `num_guests` INT(11) NOT NULL,
    `budget_range` VARCHAR(100) DEFAULT NULL,
    `catering_required` TINYINT(1) DEFAULT 0,
    `decoration_required` TINYINT(1) DEFAULT 0,
    `additional_info` TEXT DEFAULT NULL,
    `total_amount` DECIMAL(10,2) DEFAULT NULL,
    `booking_status` ENUM('inquiry', 'quoted', 'confirmed', 'completed', 'cancelled') DEFAULT 'inquiry',
    `payment_status` ENUM('pending', 'advance_paid', 'paid', 'refunded') DEFAULT 'pending',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`event_id`),
    FOREIGN KEY (`user_id`) REFERENCES `login`(`id`) ON DELETE SET NULL,
    INDEX `idx_event_date` (`event_date`),
    INDEX `idx_event_status` (`booking_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 7. TABLE BOOKINGS (Restaurant)
-- ============================================
CREATE TABLE IF NOT EXISTS `table_bookings` (
    `table_booking_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) DEFAULT NULL,
    `booking_reference` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `booking_date` DATE NOT NULL,
    `booking_time` TIME NOT NULL,
    `num_guests` INT(11) NOT NULL,
    `meal_type` ENUM('breakfast', 'lunch', 'dinner', 'high_tea') DEFAULT NULL,
    `table_preference` VARCHAR(100) DEFAULT NULL,
    `dietary_requirements` TEXT DEFAULT NULL,
    `special_occasion` VARCHAR(255) DEFAULT NULL,
    `additional_info` TEXT DEFAULT NULL,
    `booking_status` ENUM('pending', 'confirmed', 'seated', 'completed', 'cancelled', 'no_show') DEFAULT 'pending',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`table_booking_id`),
    FOREIGN KEY (`user_id`) REFERENCES `login`(`id`) ON DELETE SET NULL,
    INDEX `idx_booking_date` (`booking_date`),
    INDEX `idx_booking_time` (`booking_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 8. PAYMENTS TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `payments` (
    `payment_id` INT(11) NOT NULL AUTO_INCREMENT,
    `booking_type` ENUM('room', 'event', 'table', 'other') NOT NULL,
    `booking_id` INT(11) NOT NULL,
    `user_id` INT(11) NOT NULL,
    `transaction_id` VARCHAR(255) DEFAULT NULL,
    `payment_method` ENUM('credit_card', 'debit_card', 'upi', 'net_banking', 'cash', 'wallet') NOT NULL,
    `amount` DECIMAL(10,2) NOT NULL,
    `currency` VARCHAR(10) DEFAULT 'INR',
    `payment_status` ENUM('pending', 'processing', 'completed', 'failed', 'refunded') DEFAULT 'pending',
    `payment_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `card_last_four` VARCHAR(4) DEFAULT NULL,
    `payment_gateway` VARCHAR(100) DEFAULT NULL,
    `gateway_response` TEXT DEFAULT NULL,
    `refund_amount` DECIMAL(10,2) DEFAULT NULL,
    `refund_date` TIMESTAMP NULL DEFAULT NULL,
    `notes` TEXT DEFAULT NULL,
    PRIMARY KEY (`payment_id`),
    FOREIGN KEY (`user_id`) REFERENCES `login`(`id`) ON DELETE CASCADE,
    INDEX `idx_booking_type_id` (`booking_type`, `booking_id`),
    INDEX `idx_payment_status` (`payment_status`),
    INDEX `idx_transaction_id` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 9. REVIEWS TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `reviews` (
    `review_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `booking_type` ENUM('room', 'event', 'restaurant', 'general') NOT NULL,
    `booking_id` INT(11) DEFAULT NULL,
    `rating` INT(1) NOT NULL CHECK (`rating` >= 1 AND `rating` <= 5),
    `review_title` VARCHAR(255) DEFAULT NULL,
    `review_text` TEXT NOT NULL,
    `cleanliness_rating` INT(1) DEFAULT NULL,
    `service_rating` INT(1) DEFAULT NULL,
    `facilities_rating` INT(1) DEFAULT NULL,
    `value_rating` INT(1) DEFAULT NULL,
    `is_verified` TINYINT(1) DEFAULT 0,
    `is_approved` TINYINT(1) DEFAULT 0,
    `admin_response` TEXT DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`review_id`),
    FOREIGN KEY (`user_id`) REFERENCES `login`(`id`) ON DELETE CASCADE,
    INDEX `idx_rating` (`rating`),
    INDEX `idx_is_approved` (`is_approved`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 10. CONTACT INQUIRIES TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `contact_inquiries` (
    `inquiry_id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) DEFAULT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `message` TEXT NOT NULL,
    `inquiry_type` ENUM('general', 'booking', 'complaint', 'feedback', 'other') DEFAULT 'general',
    `status` ENUM('new', 'in_progress', 'resolved', 'closed') DEFAULT 'new',
    `admin_notes` TEXT DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`inquiry_id`),
    INDEX `idx_status` (`status`),
    INDEX `idx_inquiry_type` (`inquiry_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 11. PROMOTIONAL CODES TABLE
-- ============================================
CREATE TABLE IF NOT EXISTS `promo_codes` (
    `promo_id` INT(11) NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `description` VARCHAR(255) DEFAULT NULL,
    `discount_type` ENUM('percentage', 'fixed') NOT NULL,
    `discount_value` DECIMAL(10,2) NOT NULL,
    `min_booking_amount` DECIMAL(10,2) DEFAULT NULL,
    `max_discount` DECIMAL(10,2) DEFAULT NULL,
    `usage_limit` INT(11) DEFAULT NULL,
    `used_count` INT(11) DEFAULT 0,
    `valid_from` DATE NOT NULL,
    `valid_until` DATE NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `applicable_to` ENUM('all', 'rooms', 'events', 'restaurant') DEFAULT 'all',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`promo_id`),
    INDEX `idx_code` (`code`),
    INDEX `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 12. ROOM AVAILABILITY CALENDAR
-- ============================================
CREATE TABLE IF NOT EXISTS `room_availability` (
    `availability_id` INT(11) NOT NULL AUTO_INCREMENT,
    `room_id` INT(11) NOT NULL,
    `date` DATE NOT NULL,
    `is_available` TINYINT(1) DEFAULT 1,
    `reason` VARCHAR(255) DEFAULT NULL,
    `special_price` DECIMAL(10,2) DEFAULT NULL,
    PRIMARY KEY (`availability_id`),
    FOREIGN KEY (`room_id`) REFERENCES `rooms`(`room_id`) ON DELETE CASCADE,
    UNIQUE KEY `unique_room_date` (`room_id`, `date`),
    INDEX `idx_date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- SAMPLE DATA - Default Admin User
-- ============================================
-- Password: admin123 (hashed with bcrypt)
INSERT INTO `login` (`username`, `email`, `password`, `role`, `is_active`) VALUES
('admin', 'admin@dynastyhotels.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 1)
ON DUPLICATE KEY UPDATE `username`='admin';

-- ============================================
-- SAMPLE DATA - Room Types
-- ============================================
INSERT INTO `rooms` (`room_number`, `room_type`, `room_name`, `description`, `capacity`, `base_price`, `size_sqft`, `bed_type`, `view_type`) VALUES
('101', 'single', 'Deluxe Single Room', 'Cozy single room with modern amenities', 1, 3500.00, 250, 'King Bed', 'City View'),
('201', 'double', 'Superior Double Room', 'Spacious double room perfect for couples', 2, 5500.00, 400, 'Queen Bed', 'Garden View'),
('301', 'suite', 'Executive Suite', 'Luxurious suite with separate living area', 4, 12000.00, 800, 'King Bed + Sofa Bed', 'Pool View'),
('401', 'deluxe', 'Deluxe Premium Room', 'Premium room with exclusive amenities', 3, 8500.00, 600, 'King Bed', 'Ocean View'),
('501', 'presidential', 'Presidential Suite', 'Ultimate luxury with panoramic views', 6, 25000.00, 1500, '2 King Beds', 'Panoramic View')
ON DUPLICATE KEY UPDATE `room_number`=VALUES(`room_number`);

-- ============================================
-- SAMPLE DATA - Amenities
-- ============================================
INSERT INTO `amenities` (`amenity_name`, `category`) VALUES
('Free WiFi', 'Technology'),
('Air Conditioning', 'Comfort'),
('Flat Screen TV', 'Entertainment'),
('Mini Bar', 'Refreshments'),
('Room Service', 'Service'),
('Safe Deposit Box', 'Security'),
('Rain Shower', 'Bathroom'),
('Bathtub', 'Bathroom'),
('Work Desk', 'Business'),
('Coffee Maker', 'Refreshments')
ON DUPLICATE KEY UPDATE `amenity_name`=VALUES(`amenity_name`);

-- ============================================
-- VIEWS FOR EASY QUERYING
-- ============================================

-- View: User Booking History
CREATE OR REPLACE VIEW `user_booking_history` AS
SELECT 
    l.id AS user_id,
    l.username,
    'room' AS booking_type,
    rb.booking_id AS booking_id,
    rb.booking_reference,
    rb.check_in_date AS booking_date,
    rb.total_amount,
    rb.booking_status,
    rb.payment_status,
    rb.created_at
FROM login l
JOIN room_bookings rb ON l.id = rb.user_id

UNION ALL

SELECT 
    l.id AS user_id,
    l.username,
    'event' AS booking_type,
    eb.event_id AS booking_id,
    eb.event_reference AS booking_reference,
    eb.event_date AS booking_date,
    eb.total_amount,
    eb.booking_status,
    eb.payment_status,
    eb.created_at
FROM login l
JOIN event_bookings eb ON l.id = eb.user_id

UNION ALL

SELECT 
    l.id AS user_id,
    l.username,
    'table' AS booking_type,
    tb.table_booking_id AS booking_id,
    tb.booking_reference,
    tb.booking_date,
    0.00 AS total_amount,
    tb.booking_status,
    'N/A' AS payment_status,
    tb.created_at
FROM login l
JOIN table_bookings tb ON l.id = tb.user_id;

-- View: Available Rooms
CREATE OR REPLACE VIEW `available_rooms_summary` AS
SELECT 
    r.room_id,
    r.room_number,
    r.room_type,
    r.room_name,
    r.capacity,
    r.base_price,
    r.is_available,
    COUNT(DISTINCT ra.amenity_id) AS amenity_count
FROM rooms r
LEFT JOIN room_amenities ra ON r.room_id = ra.room_id
WHERE r.is_available = 1
GROUP BY r.room_id;

-- ============================================
-- DATABASE SETUP COMPLETE
-- ============================================
-- Total Tables: 12
-- Total Views: 2
-- Status: Ready for Production
