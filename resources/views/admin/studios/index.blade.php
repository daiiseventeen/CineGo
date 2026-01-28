@extends('layouts.admin')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.content-area {
    padding: 0 !important;
}

/* Studios Hero */
.studios-hero {
    background: linear-gradient(135deg, #1a0a0a 0%, #2d1b1b 50%, #1a0a0a 100%);
    padding: 50px 40px 40px;
    position: relative;
    overflow: hidden;
}

.studios-hero::before {
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

.studios-hero-content {
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

.btn-add-studio {
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

.btn-add-studio:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 30px rgba(59, 130, 246, 0.5);
}

/* Studios Container */
.studios-container {
    padding: 40px;
    max-width: 1400px;
    margin: 0 auto;
}

/* Studios Grid */
.studios-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 25px;
    animation: fadeIn 1s ease;
}

/* Studio Card */
.studio-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 30px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.studio-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.studio-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.04);
    border-color: rgba(59, 130, 246, 0.3);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.studio-card:hover::before {
    transform: scaleX(1);
}

.studio-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.studio-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: #3b82f6;
    margin-bottom: 15px;
}

.studio-name {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 32px;
    color: #fff;
    margin: 0 0 8px 0;
    letter-spacing: 2px;
}

.studio-capacity {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: rgba(59, 130, 246, 0.1);
    border-radius: 20px;
    width: fit-content;
}

.studio-capacity i {
    color: #3b82f6;
    font-size: 18px;
}

.studio-capacity span {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
}

.studio-capacity small {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
    font-weight: 400;
}

/* Studio Actions */
.studio-actions {
    display: flex;
    gap: 10px;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.action-btn {
    flex: 1;
    padding: 10px 16px;
    border: none;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-decoration: none;
}

.btn-view {
    background: rgba(59, 130, 246, 0.1);
    color: #3b82f6;
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
    .studios-hero {
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
    
    .studios-container {
        padding: 20px;
    }
    
    .studios-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<!-- Studios Hero -->
<div class="studios-hero">
    <div class="studios-hero-content">
        <h1 class="hero-title">Cinema Studios</h1>
        <p class="hero-subtitle">Manage your cinema halls and screening rooms</p>
        
        <!-- Stats -->
        <div class="stats-container">
            <div class="stat-pill">
                <i class="icofont icofont-architecture-alt"></i>
                <div class="stat-pill-content">
                    <h4>{{ $studios->count() }}</h4>
                    <p>Total Studios</p>
                </div>
            </div>
            <div class="stat-pill">
                <i class="icofont icofont-users-alt-4"></i>
                <div class="stat-pill-content">
                    <h4>{{ $studios->sum('total_seat') }}</h4>
                    <p>Total Seats</p>
                </div>
            </div>
            <div class="stat-pill">
                <i class="icofont icofont-chart-bar-graph"></i>
                <div class="stat-pill-content">
                    <h4>{{ $studios->count() > 0 ? round($studios->avg('total_seat')) : 0 }}</h4>
                    <p>Avg Capacity</p>
                </div>
            </div>
        </div>
        
        <!-- Action Bar -->
        <div class="action-bar">
            <div class="search-box">
                <i class="icofont icofont-search"></i>
                <input type="text" id="searchStudio" placeholder="Search studio name...">
            </div>
            <a href="{{ route('admin.studios.create') }}" class="btn-add-studio">
                <i class="icofont icofont-plus"></i>
                Add New Studio
            </a>
        </div>
    </div>
</div>

<!-- Studios Grid -->
<div class="studios-container">
    @if($studios->count() > 0)
        <div class="studios-grid" id="studiosGrid">
            @foreach($studios as $studio)
            <div class="studio-card" data-name="{{ strtolower($studio->name) }}">
                <div class="studio-icon">
                    <i class="icofont icofont-architecture-alt"></i>
                </div>
                
                <div class="studio-header">
                    <div>
                        <h3 class="studio-name">{{ $studio->name }}</h3>
                        <div class="studio-capacity">
                            <i class="icofont icofont-seat"></i>
                            <span>{{ $studio->total_seat }}</span>
                            <small>seats</small>
                        </div>
                    </div>
                </div>
                
                <div class="studio-actions">
                    <a href="{{ route('admin.studios.show', $studio) }}" class="action-btn btn-view">
                        <i class="icofont icofont-eye"></i>
                        View
                    </a>
                    <a href="{{ route('admin.studios.edit', $studio) }}" class="action-btn btn-edit">
                        <i class="icofont icofont-edit"></i>
                        Edit
                    </a>
                    <button class="action-btn btn-delete" onclick="openDeleteModal({{ $studio->id }}, '{{ $studio->name }}')">
                        <i class="icofont icofont-trash"></i>
                        Delete
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="icofont icofont-architecture-alt"></i>
            </div>
            <h3>No Studios Yet</h3>
            <p>Start adding your cinema studios and screening rooms</p>
            <a href="{{ route('admin.studios.create') }}" class="btn-add-studio">
                <i class="icofont icofont-plus"></i>
                Add First Studio
            </a>
        </div>
    @endif
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Delete Studio</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete <strong id="studioName"></strong>? This action cannot be undone.</p>
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
const searchInput = document.getElementById('searchStudio');
const studioCards = document.querySelectorAll('.studio-card');

searchInput?.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    
    studioCards.forEach(card => {
        const studioName = card.dataset.name;
        if (studioName.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});

// Delete modal functions
function openDeleteModal(studioId, studioName) {
    const modal = document.getElementById('deleteModal');
    const nameElement = document.getElementById('studioName');
    const form = document.getElementById('deleteForm');
    
    nameElement.textContent = studioName;
    form.action = `/admin/studios/${studioId}`;
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