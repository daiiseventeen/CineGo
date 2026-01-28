@extends('layouts.admin')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.content-area {
    padding: 0 !important;
}

/* Hero Section */
.studio-hero {
    position: relative;
    min-height: 200px;
    overflow: hidden;
    background: linear-gradient(135deg, #1a0a0a 0%, #1b2d3a 100%);
    padding-bottom: 20px;
}

.hero-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
    pointer-events: none;
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

.studio-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 38px;
    color: #fff;
    margin: 0 0 12px 0;
    letter-spacing: 2px;
    line-height: 1;
    animation: fadeInUp 0.8s ease;
}

.studio-meta {
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
    color: #3b82f6;
    font-size: 16px;
}

/* Content Section */
.studio-content {
    max-width: 1200px;
    margin: 40px auto 0;
    padding: 0 40px 40px;
    position: relative;
    z-index: 3;
}

.content-grid {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 30px;
    margin-bottom: 30px;
}

/* Studio Card */
.studio-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 35px;
    animation: fadeInUp 0.8s ease 0.4s backwards;
    height: fit-content;
}

.studio-icon-large {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 64px;
    color: #3b82f6;
    margin: 0 auto 25px;
    box-shadow: 0 10px 40px rgba(59, 130, 246, 0.2);
}

.studio-name-display {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 36px;
    color: #fff;
    margin: 0 0 20px 0;
    letter-spacing: 2px;
    text-align: center;
}

.capacity-display {
    background: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    margin-bottom: 25px;
}

.capacity-label {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
}

.capacity-value {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 48px;
    color: #3b82f6;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.capacity-value i {
    font-size: 40px;
}

.capacity-unit {
    font-size: 20px;
    color: rgba(255, 255, 255, 0.5);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 10px;
    margin-top: 25px;
}

.action-btn {
    flex: 1;
    padding: 12px;
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
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.section-title i {
    color: #3b82f6;
    font-size: 32px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 30px;
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
    border-color: rgba(59, 130, 246, 0.2);
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
    color: #3b82f6;
    font-size: 16px;
}

.info-value {
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
}

/* Statistics Card */
.statistics-card {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(37, 99, 235, 0.02) 100%);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 12px;
    padding: 25px;
    margin-top: 30px;
}

.statistics-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 20px;
    color: #3b82f6;
    margin: 0 0 15px 0;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.statistics-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.stat-box {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 8px;
    padding: 15px;
    text-align: center;
}

.stat-box-label {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
}

.stat-box-value {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 32px;
    color: #3b82f6;
    letter-spacing: 1px;
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
    
    .studio-card {
        max-width: 500px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .studio-hero {
        min-height: 180px;
        padding-bottom: 15px;
    }
    
    .hero-content {
        padding: 25px 20px 15px;
    }
    
    .studio-title {
        font-size: 32px;
    }
    
    .studio-content {
        padding: 0 20px 20px;
        margin-top: 30px;
    }
    
    .details-card {
        padding: 25px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .statistics-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
    }
}
</style>

<!-- Hero Section -->
<div class="studio-hero">
    <div class="hero-backdrop"></div>
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <div class="hero-info">
            <a href="{{ route('admin.studios.index') }}" class="back-button">
                <i class="icofont icofont-arrow-left"></i>
                Back to Studios
            </a>
            
            <h1 class="studio-title">{{ $studio->name }}</h1>
            
            <div class="studio-meta">
                <div class="meta-item">
                    <i class="icofont icofont-seat"></i>
                    {{ $studio->total_seat }} Seats
                </div>
                <div class="meta-item">
                    <i class="icofont icofont-architecture-alt"></i>
                    Cinema Hall
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<div class="studio-content">
    <div class="content-grid">
        <!-- Studio Card -->
        <div class="studio-card">
            <div class="studio-icon-large">
                <i class="icofont icofont-architecture-alt"></i>
            </div>
            
            <h2 class="studio-name-display">{{ $studio->name }}</h2>
            
            <div class="capacity-display">
                <div class="capacity-label">Total Seating Capacity</div>
                <div class="capacity-value">
                    <i class="icofont icofont-seat"></i>
                    {{ $studio->total_seat }}
                    <span class="capacity-unit">seats</span>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('admin.studios.edit', $studio) }}" class="action-btn btn-edit">
                    <i class="icofont icofont-edit"></i>
                    Edit
                </a>
                <button class="action-btn btn-delete" onclick="openDeleteModal()">
                    <i class="icofont icofont-trash"></i>
                    Delete
                </button>
            </div>
        </div>
        
        <!-- Details Card -->
        <div class="details-card">
            <h2 class="section-title">
                <i class="icofont icofont-info-circle"></i>
                Studio Information
            </h2>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-architecture-alt"></i>
                        Studio Name
                    </div>
                    <div class="info-value">{{ $studio->name }}</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-seat"></i>
                        Total Seats
                    </div>
                    <div class="info-value">{{ $studio->total_seat }} seats</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-ui-calendar"></i>
                        Created At
                    </div>
                    <div class="info-value">{{ $studio->created_at->format('d M Y') }}</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-clock-time"></i>
                        Last Updated
                    </div>
                    <div class="info-value">{{ $studio->updated_at->format('d M Y') }}</div>
                </div>
            </div>
            
            <!-- Statistics Card -->
            <div class="statistics-card">
                <h3 class="statistics-title">
                    <i class="icofont icofont-chart-bar-graph"></i>
                    Capacity Statistics
                </h3>
                <div class="statistics-grid">
                    <div class="stat-box">
                        <div class="stat-box-label">Total Capacity</div>
                        <div class="stat-box-value">{{ $studio->total_seat }}</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-box-label">Rows (Est.)</div>
                        <div class="stat-box-value">{{ ceil($studio->total_seat / 12) }}</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-box-label">Per Row (Est.)</div>
                        <div class="stat-box-value">~12</div>
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
            <h3 class="modal-title">Delete Studio</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete <strong>{{ $studio->name }}</strong>? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
            <form action="{{ route('admin.studios.destroy', $studio) }}" method="POST" style="display: inline;">
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