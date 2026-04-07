@extends('layouts.admin')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.content-area {
    padding: 0 !important;
}

/* Hero Section with Backdrop */
.movie-hero {
    position: relative;
    min-height: 200px;
    overflow: hidden;
    background: linear-gradient(135deg, #0a0a0a 0%, #1a0a0a 100%);
    padding-bottom: 20px;
}

.hero-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
    filter: blur(10px);
    transform: scale(1.1);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, 
        rgba(10, 10, 10, 0.7) 0%, 
        rgba(10, 10, 10, 0.85) 50%,
        #0a0a0a 90%,
        #0a0a0a 100%);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 40px 20px;
    height: 100%;
    display: flex;
    align-items: flex-end;
}

.hero-info {
    flex: 1;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    transition: all 0.3s ease;
    margin-bottom: 12px;
}

.back-button:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
    transform: translateX(-5px);
}

.movie-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 38px;
    color: #fff;
    margin: 0 0 12px 0;
    letter-spacing: 2px;
    line-height: 1;
    animation: fadeInUp 0.8s ease;
}

.movie-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 0;
    animation: fadeInUp 0.8s ease 0.2s backwards;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.meta-item i {
    color: #ef4444;
    font-size: 16px;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.status-now-showing {
    background: rgba(34, 197, 94, 0.15);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.3);
}

.status-coming-soon {
    background: rgba(251, 191, 36, 0.15);
    color: #fbbf24;
    border: 1px solid rgba(251, 191, 36, 0.3);
}

.status-archived {
    background: rgba(148, 163, 184, 0.15);
    color: #94a3b8;
    border: 1px solid rgba(148, 163, 184, 0.3);
}

/* Content Section */
.movie-content {
    max-width: 1200px;
    margin: 40px auto 0;
    padding: 0 40px 40px;
    position: relative;
    z-index: 3;
}

.content-grid {
    display: grid;
    grid-template-columns: 350px 1fr;
    gap: 40px;
    margin-bottom: 40px;
}

/* Poster Card */
.poster-card {
    position: relative;
    animation: fadeInUp 0.8s ease 0.4s backwards;
}

.poster-wrapper {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.movie-poster {
    width: 100%;
    height: auto;
    display: block;
}

.poster-placeholder {
    width: 100%;
    height: 500px;
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.05) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.poster-placeholder i {
    font-size: 120px;
    color: rgba(255, 255, 255, 0.1);
}

.poster-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.action-btn {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
}

.btn-edit {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.3);
}

.btn-edit:hover {
    background: rgba(245, 158, 11, 0.2);
    transform: translateY(-2px);
}

.btn-delete {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
}

.btn-delete:hover {
    background: rgba(239, 68, 68, 0.2);
    transform: translateY(-2px);
}

/* Details Card */
.details-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 35px;
    animation: fadeInUp 0.8s ease 0.6s backwards;
}

.section-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0 0 25px 0;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    gap: 12px;
    padding-top: 5px;
}

.section-title:not(:first-child) {
    margin-top: 10px;
}

.section-title i {
    color: #ef4444;
    font-size: 32px;
}

.movie-description {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 40px;
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.info-item {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 12px;
    padding: 20px;
    transition: all 0.3s ease;
}

.info-item:hover {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(239, 68, 68, 0.2);
}

.info-label {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.info-label i {
    color: #ef4444;
    font-size: 16px;
}

.info-value {
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
}

/* Delete Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(5px);
    animation: fadeIn 0.3s ease;
}

.modal.show {
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px;
    max-width: 450px;
    width: 90%;
    animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.modal-header {
    margin-bottom: 20px;
}

.modal-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0;
    letter-spacing: 2px;
}

.modal-body {
    margin-bottom: 30px;
}

.modal-body p {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
    line-height: 1.6;
}

.modal-body strong {
    color: #ef4444;
}

.modal-footer {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
}

.btn-cancel {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.7);
    padding: 12px 24px;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
}

.btn-confirm-delete {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border: none;
    color: #fff;
    padding: 12px 24px;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-confirm-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Responsive */
@media (max-width: 992px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
    
    .poster-card {
        max-width: 400px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .movie-hero {
        min-height: 180px;
        padding-bottom: 15px;
    }
    
    .hero-content {
        padding: 25px 20px 15px;
    }
    
    .movie-title {
        font-size: 32px;
    }
    
    .movie-content {
        padding: 0 20px 20px;
        margin-top: 30px;
    }
    
    .details-card {
        padding: 25px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .poster-actions {
        flex-direction: column;
    }
}
</style>

<!-- Hero Section -->
<div class="movie-hero">
    @if($movie->poster)
        <img src="{{ asset('storage/'.$movie->poster) }}" alt="{{ $movie->title }}" class="hero-backdrop">
    @endif
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <div class="hero-info">
            <a href="{{ route('admin.movies.index') }}" class="back-button">
                <i class="icofont icofont-arrow-left"></i>
                Back to Movies
            </a>
            
            <h1 class="movie-title">{{ $movie->title }}</h1>
            
            <div class="movie-meta">
                <div class="meta-item">
                    <i class="icofont icofont-tags"></i>
                    {{ $movie->genre }}
                </div>
                <div class="meta-item">
                    <i class="icofont icofont-clock-time"></i>
                    {{ $movie->duration }} min
                </div>
                <div class="meta-item">
                    <i class="icofont icofont-warning"></i>
                    {{ $movie->age_rating }}
                </div>
                @if($movie->status == 'now_showing')
                    <div class="status-badge status-now-showing">
                        <i class="icofont icofont-play-alt-2"></i>
                        Now Showing
                    </div>
                @elseif($movie->status == 'coming_soon')
                    <div class="status-badge status-coming-soon">
                        <i class="icofont icofont-clock-time"></i>
                        Coming Soon
                    </div>
                @else
                    <div class="status-badge status-archived">
                        <i class="icofont icofont-archive"></i>
                        Archived
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<div class="movie-content">
    <div class="content-grid">
        <!-- Poster -->
        <div class="poster-card">
            <div class="poster-wrapper">
                @if($movie->poster)
                    <img src="{{ asset('storage/'.$movie->poster) }}" alt="{{ $movie->title }}" class="movie-poster">
                @else
                    <div class="poster-placeholder">
                        <i class="icofont icofont-film"></i>
                    </div>
                @endif
            </div>
            
            <div class="poster-actions">
                <a href="{{ route('admin.movies.edit', $movie) }}" class="action-btn btn-edit">
                    <i class="icofont icofont-edit"></i>
                    Edit
                </a>
                <button class="action-btn btn-delete" onclick="openDeleteModal()">
                    <i class="icofont icofont-trash"></i>
                    Delete
                </button>
            </div>
        </div>
        
        <!-- Details -->
        <div class="details-card">
            <h2 class="section-title">
                <i class="icofont icofont-file-text"></i>
                Synopsis
            </h2>
            <p class="movie-description">
                {{ $movie->description }}
            </p>
            
            <h2 class="section-title">
                <i class="icofont icofont-info-circle"></i>
                Movie Information
            </h2>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-tags"></i>
                        Genre
                    </div>
                    <div class="info-value">{{ $movie->genre }}</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-clock-time"></i>
                        Duration
                    </div>
                    <div class="info-value">{{ $movie->duration }} minutes</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-warning"></i>
                        Age Rating
                    </div>
                    <div class="info-value">{{ $movie->age_rating }}</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-ui-settings"></i>
                        Status
                    </div>
                    <div class="info-value">
                        @if($movie->status == 'now_showing')
                            Now Showing
                        @elseif($movie->status == 'coming_soon')
                            Coming Soon
                        @else
                            Archived
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Delete Movie</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete <strong>{{ $movie->title }}</strong>? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
            <form action="{{ route('admin.movies.destroy', $movie) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-confirm-delete">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.add('show');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('show');
}

// Close modal on outside click
window.addEventListener('click', (e) => {
    const modal = document.getElementById('deleteModal');
    if (e.target === modal) {
        closeDeleteModal();
    }
});
</script>
@endsection