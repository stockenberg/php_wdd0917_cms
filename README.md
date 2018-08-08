# CMS Features
- Core
    Login
    Register
    Session Handling
    Customer Feedback
    
- Additional
    - News Page
        - Create
        - Edit
        - Read
        - Delete
            CRUD
    - Users Page (Backend)
        CRUD
        - Roles
    
    - Gallery Page
        - Image Slider
        
    - Versionierung von Inhalten
    - (Page Templates) - Marcel
    
    
- Must Haves
    - Navigation visible with correct role
    - File Upload
    - Date Handling
    - Async CRUD
   
# 30.07.
- Initial CMS Setup
- Database connection
- Login
- Logout
- Session Handling
- Status Handling

# 31.07.
- User Management
    - Read all users
    - Delete users
    - Create users
    - Update users

# News
- Datenbank HAKEN
   - id AI 
   - headline
   - teaser
   - content
   - user_id
   - created_at
   - updated_at
   
- methods
    - getAllNews() 
    - createNews()
    - deleteNews()
    - updateNews()
    
- permissions
    - admin
    - author
    
- pages
    - whitelist
    - name
        - create-news
        - edit-news
        - all-news
    
- wysiwyg plugin
    - summernote.org
    
# Setup
```
> git clone https://github.com/stockenberg/php_wdd0917_cms.git
> cd php_wdd0917_cms
> composer update
> npm install
```