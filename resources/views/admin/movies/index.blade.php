@extends('layouts.admin')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Override and enhance */
        .admin-content {
            padding: 0 !important;
            background: #0a0a0a !important;
        }

        .movies-hero {
            background: linear-gradient(135deg, #000000 0%, #1a0a0a 50%, #2d1b1b 100%);
            padding: 60px 40px 40px;
            position: relative;
            overflow: hidden;
        }

        .movies-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 50%, rgba(239, 68, 68, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(239, 68, 68, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .movies-hero-content {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
        }

        .hero-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 72px;
            color: #fff;
            margin: 0 0 10px 0;
            letter-spacing: 4px;
            text-transform: uppercase;
            background: linear-gradient(135deg, #fff 0%, #ef4444 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 0.8s ease;
        }

        .hero-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 40px;
            font-weight: 300;
            letter-spacing: 1px;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        /* Stats Pills */
        .stats-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 35px;
            animation: fadeInUp 0.8s ease 0.4s backwards;
        }

        .stat-pill {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 25px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            cursor: default;
        }

        .stat-pill:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(239, 68, 68, 0.5);
            transform: translateY(-2px);
        }

        .stat-pill i {
            font-size: 24px;
            color: #ef4444;
        }

        .stat-pill-content h4 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 28px;
            color: #fff;
            margin: 0;
            letter-spacing: 1px;
        }

        .stat-pill-content p {
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.5);
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        /* Action Bar */
        .action-bar {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease 0.6s backwards;
        }

        .search-filter-group {
            display: flex;
            gap: 15px;
            flex: 1;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-box input {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 14px 20px 14px 50px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(239, 68, 68, 0.5);
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 18px;
        }

        .filter-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 14px 20px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 150px;
        }

        .filter-select:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(239, 68, 68, 0.5);
        }

        .filter-select option {
            background: #1a1a1a;
            color: #fff;
        }

        .btn-add-movie {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #fff;
            border: none;
            padding: 14px 30px;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
        }

        .btn-add-movie:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(239, 68, 68, 0.5);
        }

        .btn-reset {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            padding: 14px 25px;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-reset:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        /* Movies Grid Container */
        .movies-container {
            padding: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            animation: fadeIn 1s ease;
        }

        /* Movie Card */
        .movie-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
        }

        .movie-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: rgba(239, 68, 68, 0.3);
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.5),
                0 0 40px rgba(239, 68, 68, 0.2);
        }

        .movie-poster-wrapper {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 100%);
        }

        .movie-poster {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .movie-card:hover .movie-poster {
            transform: scale(1.1);
        }

        .movie-poster-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.05) 100%);
        }

        .movie-poster-placeholder i {
            font-size: 80px;
            color: rgba(255, 255, 255, 0.1);
        }

        /* Status Badge */
        .status-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 8px 16px;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            backdrop-filter: blur(10px);
            z-index: 2;
        }

        .status-now-showing {
            background: rgba(34, 197, 94, 0.9);
            color: #fff;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.4);
        }

        .status-coming-soon {
            background: rgba(251, 191, 36, 0.9);
            color: #000;
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.4);
        }

        .status-archived {
            background: rgba(148, 163, 184, 0.9);
            color: #fff;
            box-shadow: 0 4px 15px rgba(148, 163, 184, 0.4);
        }

        /* Overlay Actions */
        .movie-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 50%, transparent 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 25px;
            z-index: 1;
        }

        .movie-card:hover .movie-overlay {
            opacity: 1;
        }

        .overlay-actions {
            display: flex;
            gap: 10px;
            transform: translateY(20px);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .movie-card:hover .overlay-actions {
            transform: translateY(0);
        }

        .action-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            text-decoration: none;
        }

        .action-btn-view {
            background: rgba(59, 130, 246, 0.9);
            color: #fff;
        }

        .action-btn-view:hover {
            background: #3b82f6;
            transform: scale(1.1);
        }

        .action-btn-edit {
            background: rgba(251, 191, 36, 0.9);
            color: #000;
        }

        .action-btn-edit:hover {
            background: #fbbf24;
            transform: scale(1.1);
        }

        .action-btn-delete {
            background: rgba(239, 68, 68, 0.9);
            color: #fff;
        }

        .action-btn-delete:hover {
            background: #ef4444;
            transform: scale(1.1);
        }

        /* Movie Info */
        .movie-info {
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
        }

        .movie-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 22px;
            color: #fff;
            margin: 0 0 8px 0;
            letter-spacing: 1px;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .movie-genre {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .movie-genre i {
            color: #ef4444;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 100px 40px;
            animation: fadeIn 1s ease;
        }

        .empty-state-icon {
            font-size: 120px;
            color: rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
        }

        .empty-state h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 42px;
            color: rgba(255, 255, 255, 0.8);
            margin: 0 0 10px 0;
            letter-spacing: 2px;
        }

        .empty-state p {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: rgba(255, 255, 255, 0.4);
            margin: 0 0 30px 0;
        }

        /* No Results */
        .no-results {
            text-align: center;
            padding: 80px 40px;
            animation: fadeIn 0.5s ease;
        }

        .no-results i {
            font-size: 80px;
            color: rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .no-results h4 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 32px;
            color: rgba(255, 255, 255, 0.6);
            margin: 0 0 8px 0;
            letter-spacing: 2px;
        }

        .no-results p {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.3);
            margin: 0;
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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
        @media (max-width: 768px) {
            .hero-title {
                font-size: 48px;
            }

            .stats-container {
                flex-direction: column;
            }

            .stat-pill {
                width: 100%;
            }

            .action-bar {
                flex-direction: column;
            }

            .search-filter-group {
                width: 100%;
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .filter-select {
                width: 100%;
            }

            .movies-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 20px;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="movies-hero">
        <div class="movies-hero-content">
            <h1 class="hero-title">Movies Management</h1>
            <p class="hero-subtitle">Manage your cinema collection with style</p>
            <!-- Stats -->
            <div class="stats-container">
                <div class="stat-pill">
                    <i class="icofont icofont-film"></i>
                    <div class="stat-pill-content">
                        <h4>{{ isset($movies) ? $movies->count() : 0 }}</h4>
                        <p>Total Movies</p>
                    </div>
                </div>
                <div class="stat-pill">
                    <i class="icofont icofont-play-alt-2"></i>
                    <div class="stat-pill-content">
                        <h4>
                            {{ isset($movies) ? $movies->where('status', 'now_showing')->count() : 0 }}
                        </h4>
                        <p>Now Showing</p>
                    </div>
                </div>
                <div class="stat-pill">
                    <i class="icofont icofont-clock-time"></i>
                    <div class="stat-pill-content">
                        <h4>
                            {{ isset($movies) ? $movies->where('status', 'coming_soon')->count() : 0 }}
                        </h4>
                        <p>Coming Soon</p>
                    </div>
                </div>

                <div class="stat-pill">
                    <i class="icofont icofont-archive"></i>
                    <div class="stat-pill-content">
                        <h4>
                            {{ isset($movies) ? $movies->where('status', 'archived')->count() : 0 }}
                        </h4>
                        <p>Archived</p>
                    </div>
                </div>
            </div>
            <!-- Action Bar -->
            <div class="action-bar">
                <div class="search-filter-group">
                    <div class="search-box">
                        <i class="icofont icofont-search"></i>
                        <input type="text" id="searchMovie" placeholder="Search movie title...">
                    </div>
                    <select class="filter-select" id="filterGenre">
                        <option value="">All Genres</option>
                        <option value="Action">Action</option>
                        <option value="Drama">Drama</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Horror">Horror</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Animation">Animation</option>
                    </select>
                    <select class="filter-select" id="filterStatus">
                        <option value="">All Status</option>
                        <option value="now_showing">Now Showing</option>
                        <option value="coming_soon">Coming Soon</option>
                        <option value="archived">Archived</option>
                    </select>
                    <button class="btn-reset" id="resetFilter">
                        <i class="icofont icofont-refresh"></i> Reset
                    </button>
                </div>
                <a href="{{ route('admin.movies.create') }}" class="btn-add-movie">
                    <i class="icofont icofont-plus"></i> Add New Movie
                </a>
            </div>
        </div>
    </div>

    <!-- Movies Grid -->
    <div class="movies-container">
        @if (isset($movies) && $movies->count() > 0)
            <div class="movies-grid" id="moviesGrid">
                @foreach ($movies as $movie)
                    <div class="movie-card" data-title="{{ strtolower($movie->title) }}" data-genre="{{ $movie->genre }}"
                        data-status="{{ $movie->status }}">

                        <div class="movie-poster-wrapper">
                            @if ($movie->poster)
                                <img src="{{ asset('storage/' . $movie->poster) }}" class="movie-poster"
                                    alt="{{ $movie->title }}">
                            @else
                                <div class="movie-poster-placeholder">
                                    <i class="icofont icofont-film"></i>
                                </div>
                            @endif

                            <!-- Status Badge -->
                            @if ($movie->status === 'now_showing')
                                <div class="status-badge status-now-showing">Now Showing</div>
                            @elseif ($movie->status === 'coming_soon')
                                <div class="status-badge status-coming-soon">Coming Soon</div>
                            @else
                                <div class="status-badge status-archived">Archived</div>
                            @endif

                            <!-- Overlay Actions -->
                            <div class="movie-overlay">
                                <div class="overlay-actions">
                                    <a href="{{ route('admin.movies.show', $movie) }}" class="action-btn action-btn-view">
                                        <i class="icofont icofont-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.movies.edit', $movie) }}" class="action-btn action-btn-edit">
                                        <i class="icofont icofont-edit"></i>
                                    </a>
                                    <button class="action-btn action-btn-delete"
                                        onclick="openDeleteModal({{ $movie->id }}, '{{ $movie->title }}')">
                                        <i class="icofont icofont-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="movie-info">
                            <h3 class="movie-title">{{ $movie->title }}</h3>
                            <p class="movie-genre">
                                <i class="icofont icofont-tags"></i>
                                {{ $movie->genre }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Results -->
            <div class="no-results" id="noResults" style="display: none;">
                <i class="icofont icofont-sad"></i>
                <h4>No Movies Found</h4>
                <p>Try adjusting your filters or search query</p>
            </div>
        @else
            <!-- Empty / Safe State -->
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="icofont icofont-film"></i>
                </div>
                <h3>No Movies Yet</h3>
                <p>Start building your cinema collection</p>

                @if (Route::has('admin.movies.create'))
                    <a href="{{ route('admin.movies.create') }}" class="btn-add-movie">
                        <i class="icofont icofont-plus"></i> Add Your First Movie
                    </a>
                @endif
            </div>
        @endif
    </div>
    <!-- Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete Movie</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="movieTitle"></strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm-delete">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Search and Filter
        const searchInput = document.getElementById('searchMovie');
        const genreFilter = document.getElementById('filterGenre');
        const statusFilter = document.getElementById('filterStatus');
        const resetBtn = document.getElementById('resetFilter');
        const movieCards = document.querySelectorAll('.movie-card');
        const noResults = document.getElementById('noResults');
        const moviesGrid = document.getElementById('moviesGrid');

        function filterMovies() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedGenre = genreFilter.value;
            const selectedStatus = statusFilter.value;
            let visibleCount = 0;

            movieCards.forEach(card => {
                const title = card.dataset.title;
                const genre = card.dataset.genre;
                const status = card.dataset.status;

                const matchesSearch = title.includes(searchTerm);
                const matchesGenre = !selectedGenre || genre === selectedGenre;
                const matchesStatus = !selectedStatus || status === selectedStatus;

                if (matchesSearch && matchesGenre && matchesStatus) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0 && moviesGrid) {
                noResults.style.display = 'block';
                moviesGrid.style.display = 'none';
            } else if (moviesGrid) {
                noResults.style.display = 'none';
                moviesGrid.style.display = 'grid';
            }
        }

        searchInput?.addEventListener('input', filterMovies);
        genreFilter?.addEventListener('change', filterMovies);
        statusFilter?.addEventListener('change', filterMovies);

        resetBtn?.addEventListener('click', () => {
            searchInput.value = '';
            genreFilter.value = '';
            statusFilter.value = '';
            filterMovies();
        });

        // Delete Modal
        let currentDeleteUrl = '';

        function openDeleteModal(movieId, movieTitle) {
            const modal = document.getElementById('deleteModal');
            const titleElement = document.getElementById('movieTitle');
            const form = document.getElementById('deleteForm');

            titleElement.textContent = movieTitle;
            form.action = `/admin/movies/${movieId}`;
            modal.classList.add('show');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('show');
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
