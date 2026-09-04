-- Smart School Management System Database Schema
-- MySQL Database Setup

CREATE DATABASE IF NOT EXISTS school_management;
USE school_management;

-- ============================================
-- USERS TABLE (Base user table)
-- ============================================
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('super_admin', 'admin', 'teacher', 'staff', 'student', 'parent') NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    gender ENUM('Male', 'Female', 'Other'),
    date_of_birth DATE,
    phone VARCHAR(20),
    address TEXT,
    state VARCHAR(50),
    lga VARCHAR(50),
    nationality VARCHAR(50),
    profile_picture VARCHAR(255),
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_role (role),
    INDEX idx_status (status)
);

-- ============================================
-- DEPARTMENTS TABLE
-- ============================================
CREATE TABLE departments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    head_id INT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (head_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ============================================
-- STUDENTS TABLE
-- ============================================
CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    student_id VARCHAR(50) UNIQUE,
    admission_number VARCHAR(50) UNIQUE NOT NULL,
    class_id INT,
    department_id INT,
    session_id INT,
    admission_date DATE,
    status ENUM('active', 'inactive', 'graduated', 'suspended') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL,
    INDEX idx_admission_number (admission_number),
    INDEX idx_student_id (student_id),
    INDEX idx_status (status)
);

-- ============================================
-- STUDENT REGISTRATIONS TABLE (Pending applications)
-- ============================================
CREATE TABLE student_registrations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    gender ENUM('Male', 'Female', 'Other'),
    date_of_birth DATE,
    address TEXT,
    state VARCHAR(50),
    lga VARCHAR(50),
    nationality VARCHAR(50),
    passport_photo VARCHAR(255),
    class_id INT,
    department_id INT,
    admission_date DATE,
    parent_name VARCHAR(100),
    parent_relationship VARCHAR(50),
    parent_phone VARCHAR(20),
    parent_email VARCHAR(100),
    parent_address TEXT,
    username VARCHAR(50),
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_status (status)
);

-- ============================================
-- TEACHERS TABLE
-- ============================================
CREATE TABLE teachers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    teacher_id VARCHAR(50) UNIQUE NOT NULL,
    department_id INT,
    qualification VARCHAR(100),
    specialization VARCHAR(100),
    date_joined DATE,
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL,
    INDEX idx_teacher_id (teacher_id),
    INDEX idx_status (status)
);

-- ============================================
-- STAFF TABLE
-- ============================================
CREATE TABLE staff (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    staff_id VARCHAR(50) UNIQUE NOT NULL,
    position VARCHAR(100) NOT NULL,
    department_id INT,
    employment_type ENUM('Full Time', 'Part Time', 'Contract') DEFAULT 'Full Time',
    date_joined DATE,
    qualification VARCHAR(100),
    specialization VARCHAR(100),
    experience INT,
    salary_grade VARCHAR(20),
    employment_status ENUM('Active', 'Pending', 'Suspended', 'Resigned') DEFAULT 'Pending',
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL,
    INDEX idx_staff_id (staff_id),
    INDEX idx_status (status)
);

-- ============================================
-- STAFF REGISTRATIONS TABLE (Pending applications)
-- ============================================
CREATE TABLE staff_registrations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    gender ENUM('Male', 'Female', 'Other'),
    date_of_birth DATE,
    address TEXT,
    state VARCHAR(50),
    lga VARCHAR(50),
    nationality VARCHAR(50),
    passport_photo VARCHAR(255),
    position VARCHAR(100) NOT NULL,
    department_id INT,
    employment_type ENUM('Full Time', 'Part Time', 'Contract') DEFAULT 'Full Time',
    date_joined DATE,
    qualification VARCHAR(100),
    specialization VARCHAR(100),
    experience INT,
    salary_grade VARCHAR(20),
    username VARCHAR(50),
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL,
    INDEX idx_email (email),
    INDEX idx_status (status)
);

-- ============================================
-- PARENTS TABLE
-- ============================================
CREATE TABLE parents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL UNIQUE,
    parent_id VARCHAR(50) UNIQUE,
    occupation VARCHAR(100),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- PARENT-STUDENT RELATIONSHIP
-- ============================================
CREATE TABLE student_parents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    parent_id INT NOT NULL,
    relationship VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (parent_id) REFERENCES parents(id) ON DELETE CASCADE,
    UNIQUE KEY unique_student_parent (student_id, parent_id)
);

-- ============================================
-- SESSIONS TABLE
-- ============================================
CREATE TABLE sessions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    session_name VARCHAR(50) NOT NULL UNIQUE,
    start_year INT NOT NULL,
    end_year INT NOT NULL,
    is_active BOOLEAN DEFAULT FALSE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_is_active (is_active)
);

-- ============================================
-- TERMS TABLE
-- ============================================
CREATE TABLE terms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    session_id INT NOT NULL,
    term_name VARCHAR(50) NOT NULL,
    start_date DATE,
    end_date DATE,
    is_active BOOLEAN DEFAULT FALSE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    UNIQUE KEY unique_session_term (session_id, term_name),
    INDEX idx_is_active (is_active)
);

-- ============================================
-- CLASSES TABLE
-- ============================================
CREATE TABLE classes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    class_name VARCHAR(100) NOT NULL,
    class_code VARCHAR(50) UNIQUE NOT NULL,
    level VARCHAR(50),
    department_id INT,
    class_teacher_id INT,
    session_id INT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL,
    FOREIGN KEY (class_teacher_id) REFERENCES teachers(id) ON DELETE SET NULL,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE SET NULL,
    INDEX idx_class_code (class_code),
    INDEX idx_status (status)
);

-- ============================================
-- SUBJECTS TABLE
-- ============================================
CREATE TABLE subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_name VARCHAR(100) NOT NULL,
    subject_code VARCHAR(50) UNIQUE NOT NULL,
    department_id INT,
    credit_unit INT DEFAULT 3,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL,
    INDEX idx_subject_code (subject_code)
);

-- ============================================
-- CLASS-SUBJECT ASSIGNMENT
-- ============================================
CREATE TABLE class_subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    class_id INT NOT NULL,
    subject_id INT NOT NULL,
    teacher_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id) ON DELETE SET NULL,
    UNIQUE KEY unique_class_subject (class_id, subject_id)
);

-- ============================================
-- STUDENT ENROLLMENT
-- ============================================
CREATE TABLE enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    class_id INT NOT NULL,
    session_id INT NOT NULL,
    term_id INT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    FOREIGN KEY (term_id) REFERENCES terms(id) ON DELETE CASCADE,
    UNIQUE KEY unique_enrollment (student_id, class_id, session_id),
    INDEX idx_student_id (student_id)
);

-- ============================================
-- ATTENDANCE TABLE
-- ============================================
CREATE TABLE attendance (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    class_id INT NOT NULL,
    subject_id INT,
    attendance_date DATE NOT NULL,
    status ENUM('present', 'absent', 'late') DEFAULT 'present',
    marked_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE SET NULL,
    FOREIGN KEY (marked_by) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_student_date (student_id, attendance_date),
    INDEX idx_attendance_date (attendance_date)
);

-- ============================================
-- EXAMINATIONS TABLE
-- ============================================
CREATE TABLE examinations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    exam_name VARCHAR(100) NOT NULL,
    exam_type ENUM('Test', 'CA', 'Assignment', 'Examination') DEFAULT 'Examination',
    session_id INT NOT NULL,
    term_id INT,
    class_id INT NOT NULL,
    subject_id INT NOT NULL,
    exam_date DATE,
    duration INT,
    total_marks INT DEFAULT 100,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    FOREIGN KEY (term_id) REFERENCES terms(id) ON DELETE SET NULL,
    FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
    INDEX idx_exam_date (exam_date)
);

-- ============================================
-- RESULTS TABLE
-- ============================================
CREATE TABLE results (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    subject_id INT NOT NULL,
    exam_id INT,
    session_id INT NOT NULL,
    term_id INT,
    ca_score DECIMAL(5, 2) DEFAULT 0,
    assignment_score DECIMAL(5, 2) DEFAULT 0,
    exam_score DECIMAL(5, 2) DEFAULT 0,
    total_score DECIMAL(5, 2) GENERATED ALWAYS AS (COALESCE(ca_score, 0) + COALESCE(assignment_score, 0) + COALESCE(exam_score, 0)) STORED,
    grade VARCHAR(2),
    remark VARCHAR(50),
    status ENUM('draft', 'submitted', 'approved', 'rejected') DEFAULT 'draft',
    submitted_by INT,
    approved_by INT,
    submission_date DATETIME,
    approval_date DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE,
    FOREIGN KEY (exam_id) REFERENCES examinations(id) ON DELETE SET NULL,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    FOREIGN KEY (term_id) REFERENCES terms(id) ON DELETE SET NULL,
    FOREIGN KEY (submitted_by) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (approved_by) REFERENCES users(id) ON DELETE SET NULL,
    UNIQUE KEY unique_result (student_id, subject_id, session_id, term_id),
    INDEX idx_student_id (student_id),
    INDEX idx_status (status)
);

-- ============================================
-- GRADING SYSTEM
-- ============================================
CREATE TABLE grading_system (
    id INT PRIMARY KEY AUTO_INCREMENT,
    session_id INT,
    min_score INT NOT NULL,
    max_score INT NOT NULL,
    grade VARCHAR(2) NOT NULL,
    remark VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE SET NULL,
    UNIQUE KEY unique_grade_range (min_score, max_score)
);

-- ============================================
-- FEE CATEGORIES TABLE
-- ============================================
CREATE TABLE fee_categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- FEES TABLE
-- ============================================
CREATE TABLE fees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    category_id INT NOT NULL,
    session_id INT NOT NULL,
    term_id INT,
    amount DECIMAL(10, 2) NOT NULL,
    amount_paid DECIMAL(10, 2) DEFAULT 0,
    balance DECIMAL(10, 2) GENERATED ALWAYS AS (amount - COALESCE(amount_paid, 0)) STORED,
    status ENUM('paid', 'partially_paid', 'unpaid') DEFAULT 'unpaid',
    due_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES fee_categories(id) ON DELETE CASCADE,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    FOREIGN KEY (term_id) REFERENCES terms(id) ON DELETE SET NULL,
    INDEX idx_student_id (student_id),
    INDEX idx_status (status)
);

-- ============================================
-- PAYMENTS TABLE
-- ============================================
CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    payment_id VARCHAR(50) UNIQUE NOT NULL,
    student_id INT NOT NULL,
    fee_id INT,
    amount DECIMAL(10, 2) NOT NULL,
    payment_method ENUM('cash', 'bank_transfer', 'online_payment') DEFAULT 'cash',
    reference_number VARCHAR(100),
    payment_date DATE NOT NULL,
    status ENUM('completed', 'pending', 'failed') DEFAULT 'completed',
    recorded_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (fee_id) REFERENCES fees(id) ON DELETE SET NULL,
    FOREIGN KEY (recorded_by) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_student_id (student_id),
    INDEX idx_payment_date (payment_date),
    INDEX idx_status (status)
);

-- ============================================
-- ANNOUNCEMENTS TABLE
-- ============================================
CREATE TABLE announcements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    audience ENUM('all_users', 'students', 'teachers', 'staff', 'parents') DEFAULT 'all_users',
    created_by INT NOT NULL,
    announcement_date DATE NOT NULL,
    status ENUM('published', 'draft', 'archived') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_announcement_date (announcement_date),
    INDEX idx_status (status)
);

-- ============================================
-- NOTIFICATIONS TABLE
-- ============================================
CREATE TABLE notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    type ENUM('result', 'fee', 'announcement', 'attendance', 'registration', 'system') DEFAULT 'system',
    reference_id INT,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_is_read (user_id, is_read),
    INDEX idx_created_at (created_at)
);

-- ============================================
-- ACTIVITY LOGS TABLE
-- ============================================
CREATE TABLE activity_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    action VARCHAR(255) NOT NULL,
    description TEXT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    INDEX idx_user_id (user_id),
    INDEX idx_created_at (created_at)
);

-- ============================================
-- PASSWORD RESETS TABLE
-- ============================================
CREATE TABLE password_resets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    token VARCHAR(255) UNIQUE NOT NULL,
    expires_at DATETIME NOT NULL,
    used BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- SETTINGS TABLE
-- ============================================
CREATE TABLE settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================
-- CREATE INDEXES FOR PERFORMANCE
-- ============================================
CREATE INDEX idx_enrollments_session ON enrollments(session_id);
CREATE INDEX idx_results_session_term ON results(session_id, term_id);
CREATE INDEX idx_attendance_class ON attendance(class_id);
CREATE INDEX idx_fees_student_session ON fees(student_id, session_id);
CREATE INDEX idx_payments_student ON payments(student_id);

-- ============================================
-- INSERT DEFAULT DATA
-- ============================================

-- Insert default departments
INSERT INTO departments (name, description) VALUES
('Science', 'Science Department'),
('Social Sciences', 'Social Sciences Department'),
('Languages', 'Languages Department'),
('Commercial', 'Commercial Department'),
('Administration', 'School Administration');

-- Insert default fee categories
INSERT INTO fee_categories (category_name, description) VALUES
('Tuition', 'School Tuition Fee'),
('Examination Fee', 'Examination Registration Fee'),
('Registration Fee', 'Student Registration Fee'),
('Library Fee', 'Library Usage Fee'),
('ICT Fee', 'Information and Communication Technology Fee'),
('Sports Fee', 'Sports and Athletics Fee'),
('Other Fees', 'Miscellaneous Fees');

-- Insert default grading system
INSERT INTO grading_system (min_score, max_score, grade, remark) VALUES
(70, 100, 'A', 'Excellent'),
(60, 69, 'B', 'Very Good'),
(50, 59, 'C', 'Good'),
(45, 49, 'D', 'Fair'),
(40, 44, 'E', 'Pass'),
(0, 39, 'F', 'Fail');

-- Insert default settings
INSERT INTO settings (setting_key, setting_value) VALUES
('school_name', 'Smart School'),
('school_email', 'info@smartschool.edu'),
('school_phone', '+234 800 123 4567'),
('school_address', '123 Education Way, Lagos, Nigeria'),
('school_website', 'www.smartschool.edu'),
('school_motto', 'Excellence in Education'),
('current_session_id', '1'),
('current_term_id', '1'),
('enable_notifications', 'true'),
('max_file_upload_size', '5242880');
