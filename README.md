# phph5p

-- User Table with Email, Password, and Role
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    -- Add other user-related fields as needed
);

-- Course Table
CREATE TABLE course (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT, --owner creator of the course
    FOREIGN KEY (user_id) REFERENCES user(user_id),
);

-- Module Table
CREATE TABLE module (
    module_id INT AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT, --uploader of the module
    FOREIGN KEY (user_id) REFERENCES user(user_id),
);

-- Linker Table for Courses and Modules
CREATE TABLE course_module (
    course_module_id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    module_id INT,
    FOREIGN KEY (course_id) REFERENCES course(course_id),
    FOREIGN KEY (module_id) REFERENCES module(module_id),
);

-- Records module questions and answers given by participant (user)
CREATE TABLE user_responses (
    response_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    course_id INT,
    module_id INT,
    question_id INT, --This should be a unique identifier for the question, but in h5p this might be an id string
    question TEXT,
    answer TEXT,
    response_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id),
    FOREIGN KEY (module_id) REFERENCES course_modules(module_id),
    FOREIGN KEY (question_id) REFERENCES questions(question_id)
);

-- Linker Table for Users and Courses
CREATE TABLE user_course (
    user_course_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    course_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (course_id) REFERENCES course(course_id),
);

