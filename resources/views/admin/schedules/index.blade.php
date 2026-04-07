@extends('layouts.admin')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.content-area {
    padding: 0 !important;
}

/* Schedules Hero */
.schedules-hero {
    background: linear-gradient(135deg, #1a0a0a 0%, #2d1b1b 50%, #1a0a0a 100%);
    padding: 50px 40px 40px;
    position: relative;
    overflow: hidden;
}

.schedules-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.schedules-hero-content {
    position: relative;
    z-index: 1;
    max-width: 1400px;
    margin: 0 auto;
}

.hero-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 64px;
    color: #fff;
    margin: 0 0 10px 0;
    letter-spacing: 4px;
    text-transform: uppercase;
    background: linear-gradient(135deg, #fff 0%, #3b82f6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: fadeInUp 0.8s ease;
}

.hero-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 35px;
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
    animation: fadeInUp 0.8s ease 0.3s backwards;
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
    border-color: rgba(59, 130, 246, 0.5);
    transform: translateY(-2px);
}

.stat-pill i {
    font-size: 24px;
    color: #3b82f6;
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
    animation: fadeInUp 0.8s ease 0.5s backwards;
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
    border-color: rgba(59, 130, 246, 0.5);
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

.btn-add-schedule {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
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
    box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
}

.btn-add-schedule:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 30px rgba(59, 130, 246, 0.5);
}

/* Schedules Container */
.schedules-container {
    padding: 40px;
    max-width: 1400px;
    margin: 0 auto;
}

/* Table Container */
.table-container {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    overflow: hidden;
    animation: fadeIn 1s ease;
}

.table-header {
    padding: 25px 30px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.table-header h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0;
    letter-spacing: 2px;
}

/* Table Styles */
.schedules-table {
    width: 100%;
    border-collapse: collapse;
}

.schedules-table thead {
    background: rgba(255, 255, 255, 0.03);
}

.schedules-table thead th {
    padding: 18px 30px;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.schedules-table tbody tr {
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.schedules-table tbody tr:hover {
    background: rgba(255, 255, 255, 0.03);
}

.schedules-table tbody td {
    padding: 20px 30px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}

/* Movie Info */
.movie-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.movie-poster {
    width: 50px;
    height: 70px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #3b82f6;
    flex-shrink: 0;
    overflow: hidden;
    position: relative;
}

.movie-poster-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.movie-poster i {
    position: relative;
    z-index: 1;
}

.movie-details {
    flex: 1;
}

.movie-title {
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 4px;
}

.movie-genre {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.4);
}

/* Studio Badge */
.studio-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.2);
    padding: 8px 14px;
    border-radius: 8px;
}

.studio-badge i {
    color: #3b82f6;
    font-size: 16px;
}

.studio-badge span {
    font-weight: 500;
    color: rgba(255, 255, 255, 0.9);
}

/* Date Time */
.datetime-info {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.date-badge,
.time-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
}

.date-badge i,
.time-badge i {
    color: #3b82f6;
    font-size: 14px;
}

.date-badge {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
}

.time-badge {
    color: rgba(255, 255, 255, 0.7);
}

/* Price */
.price-value {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 24px;
    color: #10b981;
    letter-spacing: 1px;
}

.price-label {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.4);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
    justify-content: flex-end;
}

.btn-action {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 16px;
}

.btn-view {
    background: rgba(59, 130, 246, 0.1);
    color: #60a5fa;
    border: 1px solid rgba(59, 130, 246, 0.2);
}

.btn-view:hover {
    background: rgba(59, 130, 246, 0.2);
    transform: translateY(-2px);
}

.btn-edit {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.2);
}

.btn-edit:hover {
    background: rgba(245, 158, 11, 0.2);
    transform: translateY(-2px);
}

.btn-delete {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.2);
}

.btn-delete:hover {
    background: rgba(239, 68, 68, 0.2);
    transform: translateY(-2px);
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
@media (max-width: 768px) {
    .schedules-hero {
        padding: 30px 20px;
    }
    
    .hero-title {
        font-size: 42px;
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
    
    .search-box {
        width: 100%;
    }
    
    .schedules-container {
        padding: 20px;
    }
    
    .table-container {
        overflow-x: auto;
    }
    
    .schedules-table thead th,
    .schedules-table tbody td {
        padding: 15px;
        font-size: 12px;
    }
    
    .movie-info {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<!-- Schedules Hero -->
<div class="schedules-hero">
    <div class="schedules-hero-content">
        <h1 class="hero-title">Movie Schedules</h1>
        <p class="hero-subtitle">Manage movie screening schedules and showtimes</p>
        
        <!-- Stats -->
        <div class="stats-container">
            <div class="stat-pill">
                <i class="icofont icofont-calendar"></i>
                <div class="stat-pill-content">
                    <h4>{{ $schedules->count() }}</h4>
                    <p>Total Schedules</p>
                </div>
            </div>
            <div class="stat-pill">
                <i class="icofont icofont-film"></i>
                <div class="stat-pill-content">
                    <h4>{{ $schedules->unique('movie_id')->count() }}</h4>
                    <p>Active Movies</p>
                </div>
            </div>
            <div class="stat-pill">
                <i class="icofont icofont-clock-time"></i>
                <div class="stat-pill-content">
                    <h4>{{ $schedules->where('show_date', '>=', date('Y-m-d'))->count() }}</h4>
                    <p>Upcoming Shows</p>
                </div>
            </div>
        </div>
        
        <!-- Action Bar -->
        <div class="action-bar">
            <div class="search-box">
                <i class="icofont icofont-search"></i>
                <input type="text" id="searchSchedule" placeholder="Search by movie, studio, or date...">
            </div>
            <a href="{{ route('admin.schedules.create') }}" class="btn-add-schedule">
                <i class="icofont icofont-plus"></i>
                Add New Schedule
            </a>
        </div>
    </div>
</div>

<!-- Schedules Container -->
<div class="schedules-container">
    @if($schedules->count() > 0)
        <div class="table-container">
            <div class="table-header">
                <h2>All Schedules</h2>
            </div>
            
            <table class="schedules-table">
                <thead>
                    <tr>
                        <th>MOVIE</th>
                        <th>STUDIO</th>
                        <th>DATE & TIME</th>
                        <th>PRICE</th>
                        <th style="text-align: right;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody id="schedulesTableBody">
                    @foreach($schedules as $schedule)
                    <tr class="schedule-row" data-search="{{ strtolower($schedule->movie->title . ' ' . $schedule->studio->name . ' ' . $schedule->show_date) }}">
                        <td>
                            <div class="movie-info">
                                <div class="movie-poster">
                                    @if($schedule->movie->poster)
                                        <img src="{{ asset('storage/' . $schedule->movie->poster) }}" 
                                             alt="{{ $schedule->movie->title }}" 
                                             class="movie-poster-img">
                                    @else
                                        <i class="icofont icofont-movie"></i>
                                    @endif
                                </div>
                                <div class="movie-details">
                                    <div class="movie-title">{{ $schedule->movie->title }}</div>
                                    <div class="movie-genre">{{ $schedule->movie->genre ?? 'Drama' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="studio-badge">
                                <i class="icofont icofont-architecture-alt"></i>
                                <span>{{ $schedule->studio->name }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="datetime-info">
                                <div class="date-badge">
                                    <i class="icofont icofont-calendar"></i>
                                    {{ \Carbon\Carbon::parse($schedule->show_date)->format('d M Y') }}
                                </div>
                                <div class="time-badge">
                                    <i class="icofont icofont-clock-time"></i>
                                    {{ \Carbon\Carbon::parse($schedule->show_time)->format('H:i') }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="price-value">Rp {{ number_format($schedule->price, 0, ',', '.') }}</div>
                            <div class="price-label">Per Ticket</div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.schedules.show', $schedule) }}" class="btn-action btn-view" title="View">
                                    <i class="icofont icofont-eye"></i>
                                </a>
                                <a href="{{ route('admin.schedules.edit', $schedule) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="icofont icofont-edit"></i>
                                </a>
                                <button class="btn-action btn-delete" onclick="openDeleteModal({{ $schedule->id }}, '{{ $schedule->movie->title }}')" title="Delete">
                                    <i class="icofont icofont-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="icofont icofont-calendar"></i>
            </div>
            <h3>No Schedules Yet</h3>
            <p>Start creating movie schedules and showtimes</p>
            <a href="{{ route('admin.schedules.create') }}" class="btn-add-schedule">
                <i class="icofont icofont-plus"></i>
                Add First Schedule
            </a>
        </div>
    @endif
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Delete Schedule</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete the schedule for <strong id="movieTitle"></strong>? This action cannot be undone and may affect existing bookings.</p>
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
// Search functionality
const searchInput = document.getElementById('searchSchedule');
const scheduleRows = document.querySelectorAll('.schedule-row');

searchInput?.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    
    scheduleRows.forEach(row => {
        const searchData = row.dataset.search;
        if (searchData.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Delete modal functions
function openDeleteModal(scheduleId, movieTitle) {
    const modal = document.getElementById('deleteModal');
    const titleElement = document.getElementById('movieTitle');
    const form = document.getElementById('deleteForm');
    
    titleElement.textContent = movieTitle;
    form.action = `/admin/schedules/${scheduleId}`;
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