CREATE DATABASE AssetManagementDB;
GO

USE AssetManagementDB;
GO

/*============================================================*/
/*                          Roles                             */
/*============================================================*/
CREATE TABLE Roles (
    RoleID INT IDENTITY(1,1) PRIMARY KEY,
    RoleName NVARCHAR(50) NOT NULL UNIQUE,
    Description NVARCHAR(255),
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    UpdatedAt DATETIME2 NOT NULL DEFAULT GETDATE()
);
GO

/*============================================================*/
/*                      Departments                           */
/*============================================================*/
CREATE TABLE Departments (
    DepartmentID INT IDENTITY(1,1) PRIMARY KEY,
    DepartmentName NVARCHAR(100) NOT NULL UNIQUE,
    Description NVARCHAR(255),
    Location NVARCHAR(150),
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    UpdatedAt DATETIME2 NOT NULL DEFAULT GETDATE()
);
GO

/*============================================================*/
/*                         Users                              */
/*============================================================*/
CREATE TABLE Users (
    UserID INT IDENTITY(1,1) PRIMARY KEY,
    FirstName NVARCHAR(100) NOT NULL,
    LastName NVARCHAR(100) NOT NULL,
    Email NVARCHAR(150) NOT NULL UNIQUE,
    PasswordHash NVARCHAR(255) NOT NULL,
    Phone NVARCHAR(30),
    DepartmentID INT NOT NULL,
    RoleID INT NOT NULL,
    Status NVARCHAR(20) NOT NULL DEFAULT 'Active'
        CHECK (Status IN ('Active','Inactive')),
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    UpdatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    CONSTRAINT FK_Users_Departments FOREIGN KEY (DepartmentID)
        REFERENCES Departments(DepartmentID),
    CONSTRAINT FK_Users_Roles FOREIGN KEY (RoleID)
        REFERENCES Roles(RoleID)
);
GO

CREATE TABLE Categories (
    CategoryID INT IDENTITY(1,1) PRIMARY KEY,
    CategoryName NVARCHAR(100) NOT NULL UNIQUE,
    Description NVARCHAR(255),
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    UpdatedAt DATETIME2 NOT NULL DEFAULT GETDATE()
);
GO

CREATE TABLE Suppliers (
    SupplierID INT IDENTITY(1,1) PRIMARY KEY,
    CompanyName NVARCHAR(150) NOT NULL,
    ContactPerson NVARCHAR(150),
    Email NVARCHAR(150),
    Phone NVARCHAR(30),
    Address NVARCHAR(255),
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    UpdatedAt DATETIME2 NOT NULL DEFAULT GETDATE()
);
GO

CREATE TABLE Assets (
    AssetID INT IDENTITY(1,1) PRIMARY KEY,
    AssetCode NVARCHAR(50) NOT NULL UNIQUE,
    AssetName NVARCHAR(150) NOT NULL,
    SerialNumber NVARCHAR(150) NOT NULL UNIQUE,
    CategoryID INT NOT NULL,
    SupplierID INT NULL,
    DepartmentID INT NULL,
    PurchaseDate DATE,
    WarrantyEnd DATE,
    PurchasePrice DECIMAL(18,2),
    Status NVARCHAR(30) NOT NULL DEFAULT 'Available'
        CHECK (Status IN ('Available','Assigned','Maintenance','Retired')),
    Location NVARCHAR(150),
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    UpdatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID),
    FOREIGN KEY (SupplierID) REFERENCES Suppliers(SupplierID),
    FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);
GO

CREATE TABLE Assignments (
    AssignmentID INT IDENTITY(1,1) PRIMARY KEY,
    AssetID INT NOT NULL,
    UserID INT NOT NULL,
    AssignedDate DATE NOT NULL,
    ReturnedDate DATE NULL,
    Status NVARCHAR(30) NOT NULL DEFAULT 'Assigned',
    Notes NVARCHAR(255),
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    FOREIGN KEY (AssetID) REFERENCES Assets(AssetID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);
GO

CREATE TABLE Tickets (
    TicketID INT IDENTITY(1,1) PRIMARY KEY,
    Title NVARCHAR(200) NOT NULL,
    Description NVARCHAR(MAX),
    CategoryID INT NULL,
    Priority NVARCHAR(20) NOT NULL DEFAULT 'Medium'
        CHECK (Priority IN ('Low','Medium','High')),
    Status NVARCHAR(20) NOT NULL DEFAULT 'Open'
        CHECK (Status IN ('Open','In Progress','Resolved','Closed')),
    CreatedBy INT NOT NULL,
    AssignedTo INT NULL,
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    ClosedAt DATETIME2 NULL,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID),
    FOREIGN KEY (CreatedBy) REFERENCES Users(UserID),
    FOREIGN KEY (AssignedTo) REFERENCES Users(UserID)
);
GO

CREATE TABLE TicketComments (
    CommentID INT IDENTITY(1,1) PRIMARY KEY,
    TicketID INT NOT NULL,
    UserID INT NOT NULL,
    Comment NVARCHAR(MAX) NOT NULL,
    CreatedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    FOREIGN KEY (TicketID) REFERENCES Tickets(TicketID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);
GO

CREATE TABLE TicketAttachments (
    AttachmentID INT IDENTITY(1,1) PRIMARY KEY,
    TicketID INT NOT NULL,
    FileName NVARCHAR(255) NOT NULL,
    FilePath NVARCHAR(500) NOT NULL,
    UploadedAt DATETIME2 NOT NULL DEFAULT GETDATE(),
    FOREIGN KEY (TicketID) REFERENCES Tickets(TicketID)
);
GO
