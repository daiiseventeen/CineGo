@extends('layouts.admin')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.content-area {
    padding: 0 !important;
}

/* Seats Hero */
.seats-hero {
    background: linear-gradient(135deg, #1a0a0a 0%, #2d1b1b 50%, #1a0a0a 100%);
    padding: 50px 40px 40px;
    position: relative;
    overflow: hidden;
}

.seats-hero::before {
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

.seats-hero-content {
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

.btn-add-seat {
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

.btn-add-seat:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 30px rgba(59, 130, 246, 0.5);
}

/* Seats Container */
.seats-container {
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
.seats-table {
    width: 100%;
    border-collapse: collapse;
}

.seats-table thead {
    background: rgba(255, 255, 255, 0.03);
}

.seats-table thead th {
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

.seats-table tbody tr {
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.seats-table tbody tr:hover {
    background: rgba(255, 255, 255, 0.03);
}

.seats-table tbody td {
    padding: 20px 30px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}

/* Studio Info */
.studio-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.studio-avatar {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Bebas Neue', sans-serif;
    font-size: 18px;
    color: #3b82f6;
    letter-spacing: 1px;
}

.studio-name {
    font-weight: 500;
    color: rgba(255, 255, 255, 0.9);
}

/* Seat Code */
.seat-code {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: #fff;
    background: rgba(255, 255, 255, 0.08);
    padding: 6px 14px;
    border-radius: 8px;
    display: inline-block;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Badge Type */
.badge {
    display: inline-block;
    padding: 8px 18px;
    border-radius: 50px;
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.badge-vip {
    background: rgba(245, 158, 11, 0.15);
    color: #fbbf24;
    border: 1px solid rgba(245, 158, 11, 0.3);
}

.badge-regular {
    background: rgba(59, 130, 246, 0.15);
    color: #60a5fa;
    border: 1px solid rgba(59, 130, 246, 0.3);
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
    .seats-hero {
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
    
    .seats-container {
        padding: 20px;
    }
    
    .table-container {
        overflow-x: auto;
    }
    
    .seats-table thead th,
    .seats-table tbody td {
        padding: 15px;
        font-size: 12px;
    }
    
    .studio-info {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<!-- Seats Hero -->
<div class="seats-hero">
    <div class="seats-hero-content">
        <h1 class="hero-title">Seat Management</h1>
        <p class="hero-subtitle">Manage all studio seats and configurations</p>
        
        <!-- Stats -->
        <div class="stats-container">
            <div class="stat-pill">
                <i class="icofont icofont-ui-settings"></i>
                <div class="stat-pill-content">
                    <h4>{{ $seats->count() }}</h4>
                    <p>Total Seats</p>
                </div>
            </div>
            <div class="stat-pill">
                <i class="icofont icofont-crown"></i>
                <div class="stat-pill-content">
                    <h4>{{ $seats->where('type', 'vip')->count() }}</h4>
                    <p>VIP Seats</p>
                </div>
            </div>
            <div class="stat-pill">
                <i class="icofont icofont-users-alt-4"></i>
                <div class="stat-pill-content">
                    <h4>{{ $seats->where('type', 'regular')->count() }}</h4>
                    <p>Regular Seats</p>
                </div>
            </div>
        </div>
        
        <!-- Action Bar -->
        <div class="action-bar">
            <div class="search-box">
                <i class="icofont icofont-search"></i>
                <input type="text" id="searchSeat" placeholder="Search seats...">
            </div>
            <a href="{{ route('admin.seats.create') }}" class="btn-add-seat">
                <i class="icofont icofont-plus"></i>
                Add New Seat
            </a>
        </div>
    </div>
</div>

<!-- Seats Container -->
<div class="seats-container">
    @if($seats->count() > 0)
        <div class="table-container">
            <div class="table-header">
                <h2>All Seats</h2>
            </div>
            
            <table class="seats-table">
                <thead>
                    <tr>
                        <th>STUDIO</th>
                        <th>SEAT CODE</th>
                        <th>TYPE</th>
                        <th style="text-align: right;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody id="seatsTableBody">
                    @foreach($seats as $seat)
                    <tr class="seat-row" data-search="{{ strtolower($seat->studio->name . ' ' . $seat->seat_code . ' ' . $seat->type) }}">
                        <td>
                            <div class="studio-info">
                                <div class="studio-avatar">
                                    {{ substr($seat->studio->name, 0, 1) }}
                                </div>
                                <span class="studio-name">{{ $seat->studio->name }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="seat-code">{{ $seat->seat_code }}</span>
                        </td>
                        <td>
                            <span class="badge badge-{{ strtolower($seat->type) }}">
                                {{ strtoupper($seat->type) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.seats.edit', $seat) }}" class="btn-action btn-edit" title="Edit">
                                    <i class="icofont icofont-edit"></i>
                                </a>
                                <button class="btn-action btn-delete" onclick="openDeleteModal({{ $seat->id }}, '{{ $seat->seat_code }}')" title="Delete">
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
                <i class="icofont icofont-seat"></i>
            </div>
            <h3>No Seats Yet</h3>
            <p>Start adding seats to your cinema studios</p>
            <a href="{{ route('admin.seats.create') }}" class="btn-add-seat">
                <i class="icofont icofont-plus"></i>
                Add First Seat
            </a>
        </div>
    @endif
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Delete Seat</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete seat <strong id="seatCode"></strong>? This action cannot be undone.</p>
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
const searchInput = document.getElementById('searchSeat');
const seatRows = document.querySelectorAll('.seat-row');

searchInput?.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    
    seatRows.forEach(row => {
        const searchData = row.dataset.search;
        if (searchData.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Delete modal functions
function openDeleteModal(seatId, seatCode) {
    const modal = document.getElementById('deleteModal');
    const codeElement = document.getElementById('seatCode');
    const form = document.getElementById('deleteForm');
    
    codeElement.textContent = seatCode;
    form.action = `/admin/seats/${seatId}`;
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