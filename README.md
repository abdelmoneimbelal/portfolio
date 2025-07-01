# 🚀 Livewire Portfolio - Professional Portfolio Management System

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel" alt="Laravel 10.x">
  <img src="https://img.shields.io/badge/Livewire-3.x-orange?style=for-the-badge&logo=livewire" alt="Livewire 3.x">
  <img src="https://img.shields.io/badge/PHP-8.1+-blue?style=for-the-badge&logo=php" alt="PHP 8.1+">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=for-the-badge&logo=alpine.js" alt="Alpine.js">
</div>

<br>

<div align="center">
  <h3>✨ A Modern, Dynamic Portfolio Website Built with Laravel & Livewire</h3>
  <p>Showcase your projects, skills, and services with a beautiful, responsive portfolio that's easy to manage.</p>
</div>

---

## 🌟 Features

### 🎨 Frontend Features
- **Responsive Design** - Beautiful, modern UI that works on all devices
- **Dynamic Portfolio** - Showcase projects with filtering by categories
- **Skills Showcase** - Display your expertise with animated progress bars
- **Services Section** - Highlight your professional services
- **Contact Form** - Easy communication with visitors
- **Newsletter Subscription** - Build your email list
- **Counter Statistics** - Display impressive numbers and achievements
- **Testimonials** - Show client feedback and reviews
- **Team Section** - Introduce your team members

### ⚙️ Admin Panel Features
- **Dashboard** - Overview of your portfolio statistics
- **Project Management** - Add, edit, delete projects with image uploads
- **Category Management** - Organize projects by categories
- **Skills Management** - Update your skills and progress percentages
- **Services Management** - Manage your service offerings
- **Messages Management** - Handle contact form submissions
- **Subscribers Management** - Manage newsletter subscribers
- **Counters Management** - Update statistics and achievements
- **Sliders Management** - Control homepage sliders
- **Settings Management** - Configure site settings

### 🛠️ Technical Features
- **Real-time Updates** - Livewire provides instant UI updates
- **File Upload** - Secure image upload with progress tracking
- **Search & Filter** - Advanced search and filtering capabilities
- **Pagination** - Efficient data handling for large datasets
- **Responsive Admin Panel** - Modern admin interface
- **Security** - Built-in Laravel security features
- **SEO Optimized** - Clean URLs and meta tags
- **RESTful API** - Complete API for frontend applications
- **Frontend Agnostic** - Works with React, Vue, Angular, or any frontend framework

---

## 🛠️ Technology Stack

### Backend
- **Laravel 10.x** - PHP framework for web applications
- **Livewire 3.x** - Full-stack framework for Laravel
- **PHP 8.1+** - Modern PHP with enhanced features
- **MySQL/PostgreSQL** - Database management

### Frontend
- **TailwindCSS 3.x** - Utility-first CSS framework
- **Alpine.js 3.x** - Lightweight JavaScript framework
- **Bootstrap 5** - Additional UI components
- **Font Awesome** - Icon library
- **WOW.js** - Scroll animations
- **Isotope.js** - Portfolio filtering
- **Lightbox** - Image gallery

### Development Tools
- **Vite** - Fast build tool
- **Laravel Breeze** - Authentication scaffolding
- **Laravel Sanctum** - API authentication

### API & Frontend Integration
- **RESTful API** - Complete backend API for React/Vue/Angular
- **API Resources** - Structured JSON responses
- **CORS Support** - Cross-origin resource sharing
- **API Documentation** - Well-documented endpoints

---

## 📦 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL/PostgreSQL database

### Step 1: Clone the Repository
```bash
git clone https://github.com/abdelmoneimbelal/portfolio.git
cd portfolio
```

### Step 2: Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Step 3: Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Database Configuration
```bash
# Update .env file with your database credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 5: Run Migrations & Seeders
```bash
# Run database migrations
php artisan migrate

# Run seeders to populate initial data
php artisan db:seed
```

### Step 6: Storage Setup
```bash
# Create storage link
php artisan storage:link
```

### Step 7: Build Assets
```bash
# Build frontend assets
npm run build
```

### Step 8: Start Development Server
```bash
# Start Laravel development server
php artisan serve

# In another terminal, start Vite for development
npm run dev
```

---

## 🚀 Quick Start

### Web Application
1. **Access the Website**: Visit `http://localhost:8000`
2. **Access Admin Panel**: Visit `http://localhost:8000/admin`
3. **Default Admin Credentials**:
   - Email: `admin@example.com`
   - Password: `password`

### API Usage
1. **API Base URL**: `http://localhost:8000/api`
2. **Test API Endpoints**: 
   - Projects: `http://localhost:8000/api/projects`
   - Services: `http://localhost:8000/api/services`
   - Categories: `http://localhost:8000/api/categories`
3. **Use with Frontend**: Connect your React/Vue/Angular app to the API endpoints

---

## 🔌 API Documentation

### Overview
This project includes a complete **RESTful API** that can be used with any frontend framework (React, Vue, Angular, etc.). The API provides all the data needed for a portfolio website.

### Base URL
```
http://localhost:8000/api
```

### Available Endpoints

#### 📊 Settings
```http
GET /api/settings
```
Returns site settings and configuration.

#### 🖼️ Sliders
```http
GET /api/sliders
```
Returns homepage slider data.

#### 🛠️ Services
```http
GET /api/services
```
Returns all services offered.

#### 📈 Counters
```http
GET /api/counters
```
Returns statistics and achievements.

#### 📁 Categories
```http
GET /api/categories
```
Returns project categories.

#### 🎯 Projects
```http
GET /api/projects
GET /api/projects/{id}
```
Returns all projects or a specific project by ID.

### API Response Format
All API responses follow a consistent format:

```json
{
    "status": 200,
    "msg": "Success message",
    "data": [
        // Response data here
    ]
}
```

### Example Usage with React

```javascript
// Fetch all projects
const fetchProjects = async () => {
    try {
        const response = await fetch('http://localhost:8000/api/projects');
        const result = await response.json();
        
        if (result.status === 200) {
            console.log('Projects:', result.data);
        }
    } catch (error) {
        console.error('Error fetching projects:', error);
    }
};

// Fetch specific project
const fetchProject = async (id) => {
    try {
        const response = await fetch(`http://localhost:8000/api/projects/${id}`);
        const result = await response.json();
        
        if (result.status === 200) {
            console.log('Project:', result.data);
        }
    } catch (error) {
        console.error('Error fetching project:', error);
    }
};
```

### CORS Configuration
The API is configured to work with frontend applications. Make sure to configure CORS in your `.env` file:

```env
CORS_ALLOWED_ORIGINS=http://localhost:3000,http://localhost:5173
```

### API Authentication
Currently, the API endpoints are public. For protected endpoints, you can implement Laravel Sanctum authentication.

---

## 📁 Project Structure

```
portfolio/
├── app/
│   ├── Livewire/
│   │   ├── Admin/          # Admin panel Livewire components
│   │   └── Front/          # Frontend Livewire components
│   ├── Models/             # Eloquent models
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/        # API controllers
│   │   └── Resources/      # API resources
│   └── Helpers/
│       └── ApiResponse.php # API response helper
├── resources/
│   └── views/
│       ├── admin/          # Admin panel views
│       └── front/          # Frontend views
├── public/
│   ├── admin-assets/       # Admin panel assets
│   └── front/              # Frontend assets
├── routes/
│   └── api.php            # API routes
└── database/
    ├── migrations/         # Database migrations
    └── seeders/           # Database seeders
```

---

## 🎯 Key Components

### Frontend Components
- **ProjectsComponent** - Portfolio projects with filtering
- **SkillsComponent** - Skills showcase with progress bars
- **ServicesComponent** - Services display
- **CountersComponent** - Statistics counters
- **MessageComponent** - Contact form
- **SubscribeComponent** - Newsletter subscription

### Admin Components
- **Projects Management** - CRUD operations for projects
- **Categories Management** - Project categories
- **Skills Management** - Skills and progress
- **Services Management** - Service offerings
- **Messages Management** - Contact form submissions
- **Settings Management** - Site configuration

### API Components
- **ProjectController** - Projects API endpoints
- **ServiceController** - Services API endpoints
- **CategoryController** - Categories API endpoints
- **CounterController** - Statistics API endpoints
- **SliderController** - Sliders API endpoints
- **SettingController** - Settings API endpoints
- **ApiResponse Helper** - Standardized API responses

---

## 🔧 Configuration

### Customizing the Portfolio

1. **Update Site Information**: Go to Admin Panel → Settings
2. **Add Projects**: Admin Panel → Projects → Add New
3. **Manage Categories**: Admin Panel → Categories
4. **Update Skills**: Admin Panel → Skills
5. **Configure Services**: Admin Panel → Services

### Styling Customization

The project uses TailwindCSS for styling. You can customize:
- Colors in `tailwind.config.js`
- Custom CSS in `resources/css/app.css`
- Frontend styles in `public/front/css/style.css`

### API Configuration

For frontend integration, configure these settings:

1. **CORS Settings** in `.env`:
   ```env
   CORS_ALLOWED_ORIGINS=http://localhost:3000,http://localhost:5173
   ```

2. **API Base URL** for frontend apps:
   ```javascript
   const API_BASE_URL = 'http://localhost:8000/api';
   ```

3. **API Response Format**:
   ```json
   {
       "status": 200,
       "msg": "Success message",
       "data": []
   }
   ```

---

## 📱 Responsive Design

The portfolio is fully responsive and optimized for:
- 📱 Mobile devices
- 📱 Tablets
- 💻 Desktop computers
- 🖥️ Large screens

---

## 🔒 Security Features

- **CSRF Protection** - Built-in Laravel CSRF protection
- **XSS Prevention** - Automatic XSS filtering
- **SQL Injection Protection** - Eloquent ORM protection
- **File Upload Security** - Secure file handling
- **Authentication** - Secure admin authentication

---

## 🚀 Deployment

### Production Deployment

1. **Set Environment Variables**:
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Optimize for Production**:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Build Assets**:
   ```bash
   npm run build
   ```

4. **Set Proper Permissions**:
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

### API Deployment

For production API deployment:

1. **Update CORS Settings**:
   ```env
   CORS_ALLOWED_ORIGINS=https://your-frontend-domain.com
   ```

2. **API Rate Limiting** (optional):
   ```php
   // In routes/api.php
   Route::middleware('throttle:60,1')->group(function () {
       // API routes
   });
   ```

3. **API Documentation**:
   - Consider using tools like Swagger/OpenAPI
   - Document all endpoints for frontend developers

---

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 Author

**Abdelmoneim Belal**

- GitHub: [@abdelmoneimbelal](https://github.com/abdelmoneimbelal)
- Portfolio: [Live Demo](https://your-portfolio-url.com)

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework
- [Livewire](https://livewire.laravel.com) - Full-stack framework
- [TailwindCSS](https://tailwindcss.com) - CSS framework
- [Alpine.js](https://alpinejs.dev) - JavaScript framework
- [Laravel Sanctum](https://laravel.com/docs/sanctum) - API authentication
- [Laravel Resources](https://laravel.com/docs/eloquent-resources) - API response formatting

---

<div align="center">
  <p>⭐ If you find this project helpful, please give it a star!</p>
  <p>Made with ❤️ using Laravel & Livewire</p>
</div>

---

## 🚀 Frontend Integration Examples

### React Integration
This API works perfectly with React applications. Here's a quick example:

```jsx
// React component using the API
import React, { useState, useEffect } from 'react';

const Portfolio = () => {
    const [projects, setProjects] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetchProjects();
    }, []);

    const fetchProjects = async () => {
        try {
            const response = await fetch('http://localhost:8000/api/projects');
            const result = await response.json();
            
            if (result.status === 200) {
                setProjects(result.data);
            }
        } catch (error) {
            console.error('Error:', error);
        } finally {
            setLoading(false);
        }
    };

    if (loading) return <div>Loading...</div>;

    return (
        <div>
            <h1>My Portfolio</h1>
            {projects.map(project => (
                <div key={project.id}>
                    <h3>{project.name}</h3>
                    <p>{project.description}</p>
                </div>
            ))}
        </div>
    );
};

export default Portfolio;
```

### Vue.js Integration
```javascript
// Vue component using the API
export default {
    data() {
        return {
            projects: [],
            loading: true
        }
    },
    async mounted() {
        await this.fetchProjects();
    },
    methods: {
        async fetchProjects() {
            try {
                const response = await fetch('http://localhost:8000/api/projects');
                const result = await response.json();
                
                if (result.status === 200) {
                    this.projects = result.data;
                }
            } catch (error) {
                console.error('Error:', error);
            } finally {
                this.loading = false;
            }
        }
    }
}
```

### Angular Integration
```typescript
// Angular service using the API
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
    providedIn: 'root'
})
export class PortfolioService {
    private apiUrl = 'http://localhost:8000/api';

    constructor(private http: HttpClient) { }

    getProjects(): Observable<any> {
        return this.http.get(`${this.apiUrl}/projects`);
    }

    getProject(id: number): Observable<any> {
        return this.http.get(`${this.apiUrl}/projects/${id}`);
    }
}
```

---

<div align="center">
  <h3>🎯 Perfect for Full-Stack Development!</h3>
  <p>Use this Laravel API with any frontend framework of your choice</p>
  <p>React • Vue • Angular • Svelte • Next.js • Nuxt.js</p>
</div>
