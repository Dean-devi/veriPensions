CREATE DATABASE VeriPensionDB;
USE VeriPensionDB;

-- Admin Table (created first to prevent FK issues)
CREATE TABLE Admin (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    passwordHash VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Verifier') NOT NULL,
    dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Pensioner Table
CREATE TABLE Pensioner (
    pensionerID INT AUTO_INCREMENT PRIMARY KEY,
    pen_firstName VARCHAR(50) NOT NULL,
    pen_middleName VARCHAR(50),
    pen_lastName VARCHAR(50) NOT NULL,
    birthDate DATE NOT NULL,
    pen_purok VARCHAR(50) NOT NULL,
    pen_brgy VARCHAR(100) NOT NULL,
    pen_contactNumber VARCHAR(15) NOT NULL,
    status ENUM('Active', 'Inactive') NOT NULL,
    dateRegistered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Claimant Table
CREATE TABLE Claimant (
    claimantID INT AUTO_INCREMENT PRIMARY KEY,
    pensionerID INT NOT NULL,
    cl_firstName VARCHAR(50) NOT NULL,
    cl_middleName VARCHAR(50),
    cl_lastName VARCHAR(50) NOT NULL,
    cl_purok VARCHAR(50) NOT NULL,
    cl_brgy VARCHAR(100) NOT NULL,
    relationship VARCHAR(50) NOT NULL,
    cl_contactNumber VARCHAR(15) NOT NULL,
    FOREIGN KEY (pensionerID) REFERENCES Pensioner(pensionerID) ON DELETE CASCADE
);

-- BiometricRecord Table
CREATE TABLE BiometricRecord (
    biometricID INT AUTO_INCREMENT PRIMARY KEY,
    claimantID INT NOT NULL,
    fingerprint BLOB NOT NULL,
    FOREIGN KEY (claimantID) REFERENCES Claimant(claimantID) ON DELETE CASCADE
);

-- PayoutRecord Table (Now created after Admin)
CREATE TABLE PayoutRecord (
    payoutID INT AUTO_INCREMENT PRIMARY KEY,
    claimantID INT NOT NULL,
    payoutDate DATE NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    verifiedBy INT, -- Allow NULL in case admin account is deleted
    FOREIGN KEY (claimantID) REFERENCES Claimant(claimantID) ON DELETE CASCADE,
    FOREIGN KEY (verifiedBy) REFERENCES Admin(userID) ON DELETE SET NULL
);

-- Application Table
CREATE TABLE Application (
    applicationID INT AUTO_INCREMENT PRIMARY KEY,
    app_firstName VARCHAR(50) NOT NULL,
    app_middleName VARCHAR(50),
    app_lastName VARCHAR(50) NOT NULL,
    app_birthDate DATE NOT NULL,
    app_purok VARCHAR(50) NOT NULL,
    app_brgy VARCHAR(100) NOT NULL,
    app_contactNumber VARCHAR(15) NOT NULL,
    applicationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Approved', 'Rejected') NOT NULL
);

-- Requirement Table
CREATE TABLE Requirement (
    requirementID INT AUTO_INCREMENT PRIMARY KEY,
    applicationID INT NOT NULL,
    documentType VARCHAR(100) NOT NULL,
    documentImage LONGBLOB NOT NULL,
    FOREIGN KEY (applicationID) REFERENCES ApplicationID(applicationID) ON DELETE CASCADE
);
