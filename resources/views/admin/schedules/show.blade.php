@extends('layouts.admin')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Override content area */
        .content-area {
            padding: 0 !important;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #1a0a0a 0%, #1b2d3a 50%, #1a0a0a 100%);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
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

        .page-header-content {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 42px;
            color: #fff;
            margin: 0 0 8px 0;
            letter-spacing: 3px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-title i {
            color: #60a5fa;
            font-size: 48px;
        }

        .page-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            margin: 0;
        }

        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
        }

        .breadcrumb-nav a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            color: #3b82f6;
        }

        .breadcrumb-nav span {
            color: rgba(255, 255, 255, 0.4);
        }

        /* Action Buttons in Header */
        .header-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-header {
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .btn-edit-header {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-edit-header:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(245, 158, 11, 0.5);
        }

        /* Detail Container */
        .detail-container {
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Detail Grid */
        .detail-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 25px;
        }

        /* Main Info Card */
        .info-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 35px;
            animation: fadeInUp 0.6s ease;
        }

        .info-card-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 24px;
            color: #fff;
            margin: 0 0 25px 0;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .info-card-title i {
            color: #3b82f6;
            font-size: 28px;
        }

        /* Info Items */
        .info-grid {
            display: grid;
            gap: 20px;
        }

        .info-item {
            background: rgba(255, 255, 255, 0.03);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(59, 130, 246, 0.2);
        }

        .info-label {
            font-family: 'Poppins', sans-serif;
            font-size: 11px;
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
            font-size: 14px;
        }

        .info-value {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 500;
        }

        .info-value.large {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 32px;
            letter-spacing: 1px;
        }

        .info-value.price {
            color: #10b981;
        }

        /* Movie Card */
        /* Movie Poster Image */
        .movie-poster-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .movie-poster-container {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Hover effect untuk poster */
        .movie-card:hover .movie-poster-image {
            transform: scale(1.05);
        }

        /* Overlay effect saat hover */
        .movie-poster-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .movie-card:hover .movie-poster-container::after {
            opacity: 1;
        }

        /* Icon placeholder styling */
        .movie-poster-container i {
            font-size: 80px;
            color: rgba(59, 130, 246, 0.5);
            position: relative;
            z-index: 1;
        }

        /* Status Cards */
        .status-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .status-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            animation: fadeInUp 0.6s ease;
            transition: all 0.3s ease;
        }

        .status-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .status-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .status-icon.blue {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
        }

        .status-icon.green {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
        }

        .status-icon.yellow {
            background: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
        }

        .status-icon.red {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .status-value {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 36px;
            color: #fff;
            margin: 0 0 5px 0;
            letter-spacing: 1px;
        }

        .status-label {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Danger Zone */
        .danger-zone {
            background: rgba(239, 68, 68, 0.05);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 16px;
            padding: 30px;
            margin-top: 25px;
            animation: fadeInUp 0.6s ease;
        }

        .danger-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 20px;
            color: #ef4444;
            margin: 0 0 10px 0;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .danger-title i {
            font-size: 24px;
        }

        .danger-description {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
            margin: 0 0 20px 0;
            line-height: 1.6;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
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
        @media (max-width: 968px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .status-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 30px 20px;
            }

            .page-title {
                font-size: 32px;
            }

            .detail-container {
                padding: 20px;
            }

            .info-card,
            .movie-card {
                padding: 25px;
            }

            .header-actions {
                flex-direction: column;
            }

            .btn-header {
                width: 100%;
                justify-content: center;
            }

            .status-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-content">
            <h1 class="page-title">
                <i class="icofont icofont-eye"></i>
                Schedule Details
            </h1>
            <p class="page-subtitle">Complete information about this screening schedule</p>
            <div class="breadcrumb-nav">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>/</span>
                <a href="{{ route('admin.schedules.index') }}">Schedules</a>
                <span>/</span>
                <span>Details</span>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.schedules.index') }}" class="btn-header btn-back">
                    <i class="icofont icofont-arrow-left"></i>
                    Back to List
                </a>
                <a href="{{ route('admin.schedules.edit', $schedule) }}" class="btn-header btn-edit-header">
                    <i class="icofont icofont-edit"></i>
                    Edit Schedule
                </a>
            </div>
        </div>
    </div>

    <!-- Detail Container -->
    <div class="detail-container">
        <!-- Detail Grid -->
        <div class="detail-grid">
            <!-- Main Info Card -->
            <div class="info-card">
                <h3 class="info-card-title">
                    <i class="icofont icofont-ui-calendar"></i>
                    Schedule Information
                </h3>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">
                            <i class="icofont icofont-building-alt"></i>
                            Studio
                        </div>
                        <div class="info-value large">{{ $schedule->studio->name }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="icofont icofont-calendar"></i>
                            Show Date
                        </div>
                        <div class="info-value">
                            {{ \Carbon\Carbon::parse($schedule->show_date)->format('l, d F Y') }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="icofont icofont-clock-time"></i>
                            Show Time
                        </div>
                        <div class="info-value">
                            {{ \Carbon\Carbon::parse($schedule->show_time)->format('H:i') }} WIB
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="icofont icofont-cur-rupee"></i>
                            Ticket Price
                        </div>
                        <div class="info-value large price">
                            Rp {{ number_format($schedule->price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Movie Card -->
            <div class="movie-card">
                <div class="movie-poster-container">
                    @if ($schedule->movie->poster)
                        <img src="{{ asset('storage/' . $schedule->movie->poster) }}" alt="{{ $schedule->movie->title }}"
                            class="movie-poster-image">
                    @else
                        <i class="icofont icofont-movie"></i>
                    @endif
                </div>
                <div class="movie-info-content">
                    <h3 class="movie-title">{{ $schedule->movie->title }}</h3>
                    <div class="movie-meta">
                        <div class="movie-meta-item">
                            <i class="icofont icofont-listing-box"></i>
                            <span>{{ $schedule->movie->genre ?? 'Drama' }}</span>
                        </div>
                        <div class="movie-meta-item">
                            <i class="icofont icofont-clock-time"></i>
                            <span>{{ $schedule->movie->duration ?? '120' }} minutes</span>
                        </div>
                        <div class="movie-meta-item">
                            <i class="icofont icofont-star"></i>
                            <span>{{ $schedule->movie->rating ?? 'PG-13' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Status Cards -->
        <div class="status-cards">
            <div class="status-card">
                <div class="status-icon blue">
                    <i class="icofont icofont-seat"></i>
                </div>
                <div class="status-value">{{ $schedule->studio->total_seat }}</div>
                <div class="status-label">Total Seats</div>
            </div>

            <div class="status-card">
                <div class="status-icon green">
                    <i class="icofont icofont-check-circled"></i>
                </div>
                <div class="status-value">{{ $schedule->bookings_count ?? 0 }}</div>
                <div class="status-label">Bookings</div>
            </div>

            <div class="status-card">
                <div class="status-icon yellow">
                    <i class="icofont icofont-ui-clock"></i>
                </div>
                <div class="status-value">
                    {{ $schedule->studio->total_seat - ($schedule->bookings_count ?? 0) }}
                </div>
                <div class="status-label">Available Seats</div>
            </div>

            <div class="status-card">
                <div class="status-icon red">
                    <i class="icofont icofont-cur-rupee"></i>
                </div>
                <div class="status-value">
                    {{ number_format((($schedule->bookings_count ?? 0) * $schedule->price) / 1000000, 1) }}M
                </div>
                <div class="status-label">Revenue</div>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="danger-zone">
            <h3 class="danger-title">
                <i class="icofont icofont-warning-alt"></i>
                Danger Zone
            </h3>
            <p class="danger-description">
                Deleting this schedule will permanently remove it from the system. This action cannot be undone and may
                affect existing bookings.
            </p>
            <button class="btn-danger" onclick="openDeleteModal()">
                <i class="icofont icofont-trash"></i>
                Delete Schedule
            </button>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete Schedule</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the schedule for <strong>{{ $schedule->movie->title }}</strong> on
                    {{ \Carbon\Carbon::parse($schedule->show_date)->format('d M Y') }} at
                    {{ \Carbon\Carbon::parse($schedule->show_time)->format('H:i') }}? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
                <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm-delete">Delete Schedule</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Delete modal functions
        function openDeleteModal() {
            const modal = document.getElementById('deleteModal');
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
